<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'mainDish',
                'parent' => null, // No parent
                'status' => true,
            ],
            [
                'name' => 'appetizer',
                'parent' => null, // No parent
                'status' => true,
            ],   
            [
                'name' => 'dessert',
                'parent' => null, // No parent
                'status' => true,
            ],  
            [
                'name' => 'beverages',
                'parent' => null, // No parent
                'status' => true,
            ], 
            [
                'name' => 'fastFood',
                'parent' => 0, 
                'status' => true,
            ], 
            [
                'name' => 'traditional',
                'parent' => 0, 
                'status' => true,
            ],  
            [
                'name' => 'pizza',
                'parent' => 4, 
                'status' => true,
            ],  
            [
                'name' => 'sandwich',
                'parent' => 4, 
                'status' => true,
            ],   
            [
                'name' => 'kebab',
                'parent' => 5, 
                'status' => true,
            ],   
            [
                'name' => 'khoresh',
                'parent' => 5, 
                'status' => true,
            ],   
          
           
        ];

        // Insert the data into the 'categories' table
        DB::table('categories')->insert($data);
    }
}
