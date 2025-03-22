<?php

namespace App\Http\Controllers\Profile;

use App\Helper\SSLCOMMERZ;
use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Models\InvoiceOrder;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class InvoiceController extends Controller
{
    public function invoiceInfo(Request $request)
    {
        $invoice = false;
        if ($request->header('role') === 'admin') {
            $invoice = Invoice::where('id', $request->invoiceID)->select('id', 'user_id')->first();
        } else {
            $invoice = Invoice::where('id', $request->invoiceID)->where('user_id', $request->header('id'))->select('id', 'user_id')->first();
        }

        if (!$invoice) {
            return false;
        }

        $invoiceOrders = InvoiceOrder::where('invoice_id', $invoice->id)
            ->select('product_id', 'quantity', 'amount')
            ->with('product:id,name,image')->get();
        $user = User::where('id', $invoice->user_id)->select('firstName', 'lastName', 'email', 'phone')->first();

        return response()->json(['user' => $user, 'invoiceOrders' => $invoiceOrders]);
    }

    public function createInvoice(Request $request)
    {
        $validatedRequest = $request->validate([
            'products' => 'required|array',
            'payment_method' => 'required|string',
        ]);

        $user_id = $request->header('id');
        $cartList = $validatedRequest['products'];
        $products = [];
        $totalAmmount = 0;

        foreach ($cartList as &$cart) { // Use reference to modify original array
            $product = Product::where('id', $cart['id'])->where('status', 1)->first();
            if ($product) {
                if ($product->sale_price > 0) {
                    $cart['price'] = $product->sale_price;
                } else {
                    $cart['price'] = $product->price;
                }
                $cart['totalAmount'] = $cart['price'] * $cart['quantity'];
                $totalAmmount += $cart['totalAmount'];

                // Store product name and category name
                $products[] = ['name' => $product->name, 'category' => $product->category->name];
            } else {
                return back()->withErrors(['message' => 'Sorry! Product is not available.']);
            }
        }
        // Unset the reference after the loop
        unset($cart);

        DB::beginTransaction();
        try {
            $transaction_id = uniqid();
            $profile = User::with('addresses')->where('id', $user_id)->first();
            // dd(vars: $profile->addresses->first()->city);

            $invoice = Invoice::create([
                'user_id' => $user_id,
                'total' => $totalAmmount,
                'transaction_id' => $transaction_id,
                'payment_status' => 'pending',
                'payment_method' => $request->payment_method,
                'order_status' => 'pending',
            ]);
            foreach ($cartList as $cart) {
                InvoiceOrder::create([
                    'invoice_id' => $invoice->id,
                    'product_id' => $cart['id'],
                    'user_id' => $user_id,
                    'quantity' => $cart['quantity'],
                    'amount' => $cart['totalAmount'],
                ]);

            };

            if ($request->payment_method != 'cod') {

                $paymentMethod = SSLCOMMERZ::InitiatePayment($profile, $totalAmmount, $transaction_id, $products);

                DB::commit();

                return Inertia::render("Frontend/Checkout", ['paymentOptions' => $paymentMethod]);

            } else {
                DB::commit();
                return back();
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Create Invoice Error:', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine()
            ]);

            dd($e);
            // return back()->withErrors(['message' => 'Something Wrong!']);
        }
    }

    public function paymentSuccess(Request $request)
    {
        SSLCommerz::InitiateSuccess(tran_id: $request->query('tran_id'));
        return redirect('/profile');
    }

    public function paymentCancel(Request $request)
    {
        SSLCommerz::InitiateCancel($request->query('tran_id'));
        // $this->updateStocksOnCancel($request->query('tran_id'));

        return redirect('/profile');
    }

    public function paymentFail(Request $request)
    {
        SSLCommerz::InitiateFail($request->query('tran_id'));

        return redirect('/profile');
    }
}
