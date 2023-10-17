<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Foods extends Model
{
    use HasFactory;


    public function rating()
    {
        return $this->hasMany(FoodsRating::class, 'food_id');
    }
}
