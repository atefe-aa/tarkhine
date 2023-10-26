<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model
{
    use HasFactory;

    protected $fillable = [
        "customer_id",
        "status",
        "title",
        "is_customer_receiver",
        "receiver_name",
        "receiver_phone",
        "address",
        "coordinates",
    ];
    public function customer()
    {
        return $this->belongsTo(Customers::class, 'customer_id');
    }
}
