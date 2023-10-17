<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data=[
            [
                'sort_num'=>1,
                'picture'=>'https://img.freepik.com/free-photo/mexican-food-composition_23-2147740702.jpg?t=st=1697532314~exp=1697532914~hmac=501d5378fb65688f9f0744dbdd6bf4511849252d17ad26a3fdfcfc9057bd13ea',
                'text'=>'Free photo girlfriend want share dessert holding two macarons and smiling suggest bite with lovely grin tilt he',
            ], [
                'sort_num'=>2,
                'picture'=>'https://img.freepik.com/free-photo/mexican-dishes-pepper_23-2147740824.jpg?w=900&t=st=1697532272~exp=1697532872~hmac=647ff6e4e0c4e83fe0f1317662cf95897f8bd7899fbbe39fabd10dcdc55660da',
                'text'=>'Free photo mexican dishes and pepper',
            ], [
                'sort_num'=>3,
                'picture'=>'https://img.freepik.com/free-photo/hand-pointing-blackboard-amidst-mexican-food_23-2147740701.jpg',
                'text'=>'Hand pointing at blackboard amidst mexican food',
            ], [
                'sort_num'=>4,
                'picture'=>'https://img.freepik.com/premium-photo/top-view-sliced-pumpkin-with-chickpeas_147376-1170.jpg',
                'text'=>'Top view sliced pumpkin with chickpeas',
            ], [
                'sort_num'=>5,
                'picture'=>'https://img.freepik.com/premium-photo/vegetarian-food-hokkaido-pumpkin-pumpkin-with-chickpeas-cooking-process_147376-364.jpg',
                'text'=>'Vegetarian food. hokkaido pumpkin. pumpkin with chickpeas. cooking process',
            ],
        ];

         // Insert the data into the 'categories' table
         DB::table('sliders')->insert($data);
    }
}
