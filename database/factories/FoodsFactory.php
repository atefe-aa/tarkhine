<?php

namespace Database\Factories;

use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Foods>
 */
class FoodsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>fake()->word(),
            'branche_id'=>random_int(1,7),
            'categories'=>json_encode([
                random_int(1,4),
                random_int(5,6),
                random_int(7,10),
                ]),
            'ingredients'=>fake()->word().','. fake()->word().',' .fake()->word().',' .fake()->word().','.fake()->word(),
            'price'=>random_int(20,300) * 1000,
            'discount'=>random_int(1,50),
            'status'=>'available',
            'description'=>fake()->text(),
            'pictures'=>json_encode([
            'https://picsum.photos/seed/'.random_int(1000,5000).'/200',
            'https://picsum.photos/seed/'.random_int(1000,5000).'/200',
            'https://picsum.photos/seed/'.random_int(1000,5000).'/200',
        ]),
            'rating'=>random_int(10,50)/10,
        ];
    }
}
