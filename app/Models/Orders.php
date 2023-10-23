<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected $fillable = [
        'address_id',
        'branch_id',
        'customer_id',
        'cart',
        'total_price',
        'foods_discount',
        'discount_code',
        'delivery_cost',
        'paid',
        'delivery_type',
        'delivery_time',
        'payment_method',
        'bill_code',
        'description',
        'code',
    ] ;
}
