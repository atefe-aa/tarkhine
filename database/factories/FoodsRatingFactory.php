<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\FoodsRating>
 */
class FoodsRatingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'customer_id'=>random_int(1,10),
            'food_id'=>random_int(2,61),
            'rating'=>random_int(1,5),
            'comment'=>fake()->text(),
            'status'=>true,
        ];
    }
}
