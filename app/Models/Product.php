<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'weight',
        'image',
        'price',
        'sale_price',
        'tag',
        'status',
        'slug',
    ];

    protected $hidden = ['created_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }
    public function invoiceOrders()
    {
        return $this->hasMany(InvoiceOrder::class);
    }
}
