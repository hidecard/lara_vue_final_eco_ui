<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administrator extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'email', 'password', 'role'];

    protected $hidden = ['password', 'creted_at', 'updated_at'];

}
