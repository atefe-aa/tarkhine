<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Addresses;
use App\Models\Branches;
use App\Models\Customers;
use App\Models\Foods;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    protected $seeders = [
        CategorySeeder::class,
        // Add other seeders if needed
    ];

    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        // Customers::factory(10)->create();
        // Addresses::factory(10)->create();
        // Branches::factory(3)->create();
        // Foods::factory(30)->create();
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
