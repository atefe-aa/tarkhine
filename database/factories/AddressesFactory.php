<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Addresses>
 */
class AddressesFactory extends Factory
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
            'title'=>fake()->title(),
            'is_customer_receiver'=>true,
            'address'=>fake()->address(),
            'cordinates'=>json_encode([fake()->localCoordinates()]),
            'status'=>true,
        ];
    }
}
