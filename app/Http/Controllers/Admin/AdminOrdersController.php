<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use Illuminate\Http\Request;
use Inertia\Inertia;

class AdminOrdersController extends Controller
{
    public function ordersPage(Request $request)
    {
        $orders = Invoice::with(['invoiceOrders.product:id,name,image'])
            ->select('id', 'total', 'transaction_id', 'payment_status', 'payment_method', 'order_status', 'created_at')
            ->orderByDesc('id')
            ->paginate(10);

        return Inertia::render("Backend/Orders", ['orders' => $orders]);
    }

}
