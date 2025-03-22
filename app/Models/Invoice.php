<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'user_id',
        'transaction_id',
        'total',
        'paid',
        'due',
        'payment_status',
        'payment_method',
        'order_status',
    ];

    public function invoiceOrders()
    {
        return $this->hasMany(InvoiceOrder::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
