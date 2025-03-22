<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Invoice;
use App\Models\User;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminCustomerManageController extends Controller
{
    public function customerspage(Request $request)
    {
        //$customers = User::orderByDesc('id')->paginate(10);
        $customers = User::with(['invoices:id,user_id,created_at'])
            ->withSum('invoices', 'total')
            ->orderByDesc('id')
            ->paginate(10);

        foreach ($customers as $customer) {
            $customer->lastPurchase = $customer->invoices->max('created_at'); // Fetch latest inv date
        }
        $customers->makeVisible('created_at');
        return Inertia::render("Backend/Customers", ['customers' => $customers->toArray()]);
    }

    public function editCustomerPage($id)
    {
        $customer = User::findOrFail($id)->makeVisible('created_at');
        return Inertia::render("Backend/EditCustomer", ["customer" => $customer]);
    }

    public function customerInvoiceInfo()
    {
        $invoices = Invoice::with(['invoiceOrders:invoice_id,product_id,quantity,amount',
            'invoiceOrders.product:id,name,image'])
            ->where('user_id', request()->userID)
            ->whereNotIn('order_status', ['failed', 'canceled'])
            ->select('id', 'total', 'created_at')
            ->get();
        $totalPurchase = $invoices->sum('total');

        return response()->json(['invoices' => $invoices, 'totalPurchase' => $totalPurchase]);
    }

    public function customerAddresses()
    {
        $addresses = Address::where('user_id', request()->userID)->get();
        return response()->json(['addresses' => $addresses]);
    }
}
