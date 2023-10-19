<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customers extends Model
{
    use HasFactory;

    protected $fillable = [
        'cart',
        'phone',
        'first_name',
        'last_name',
        'show_name',
        'birth_date',
        'phone',
        'addresses',
        'orders',
        'favorites',
        'photo',
    ];
}

