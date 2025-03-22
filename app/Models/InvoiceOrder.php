<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InvoiceOrder extends Model
{
    protected $fillable = ['user_id', 'invoice_id', 'product_id', 'quantity', 'amount'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function invoice()
    {
        return $this->belongsTo(Invoice::class);
    }
}
