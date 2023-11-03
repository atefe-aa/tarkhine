<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Branches extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'status',
        'name',
        'manager',
        'manager_phone',
        'manager_national_id',
        'email',
        'address',
        'province',
        'city',
        'neighbourhood',
        'ownership_type',
        'property_area',
        'property_age',
        'business_license',
        'parking_lot',
        'warehouse',
        'kitchen',
        'coordinates',
        'phone1',
        'phone2',
        'open_hour',
        'close_hour',
        'open_days',
        'pictures',
        'discount',
        'description',
        'fix_delivery',
        'delivery_per_km',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'status',
        'manager',
        'manager_phone',
        'manager_national_id',
        'email',
        'province',
        'city',
        'neighbourhood',
        'ownership_type',
        'property_area',
        'property_age',
        'business_license',
        'parking_lot',
        'warehouse',
        'kitchen',
    ];

    public function menu()
    {
        return $this->hasMany(Foods::class, 'branch_id');
    }
}
