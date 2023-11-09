<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FoodsRating extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'food_id',
        'rating',
        'comment',
        'status',
    ] ;
}
