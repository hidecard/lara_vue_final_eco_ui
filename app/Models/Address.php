<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'country',
        'city',
        'district',
        'address',
        'address_type',
        'is_default',
    ];
    public function user()
    {
        $this->belongsTo(User::class);
    }
}
