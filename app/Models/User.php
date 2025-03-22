<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['firstName', 'lastName', 'email', 'phone', 'password'];

    protected $hidden = ['password', 'created_at', 'deleted_at'];

    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'user_id');
    }
}
