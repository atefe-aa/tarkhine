<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Addresses;
use App\Models\Branches;
use App\Models\Customers;
use App\Models\Foods;
use App\Models\FoodsRating;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected $seeders = [
        // CategorySeeder::class,
        // SliderSeeder::class,
        // Add other seeders if needed
    ];

    public function run(): void
    {
        // Customers::factory(10)->create();
        // Addresses::factory(10)->create();
        // Branches::factory(3)->create();
        // Foods::factory(30)->create();
        // FoodsRating::factory(60)->create();
    }
}
