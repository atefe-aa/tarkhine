<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id',
        'foods',
        'total_price',
        'foods_discount',
        'discount_code',
        'delivery_cost',
        'paid',
        'delivery_type',
        'payment_method',
        'bill_code',
        'description',
        'code',
    ] ;
}
