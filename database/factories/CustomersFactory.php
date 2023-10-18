<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CustomersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'=>fake()->name(),
            'last_name'=>fake()->lastName(),
            'show_name'=>fake()->name(),
            'birth_date'=>fake()->date(),
            'phone'=>fake()->unique()->phoneNumber(),
            'addresses'=>json_encode([random_int(0,10),random_int(0,10),random_int(0,10)]),
            'cart'=>json_encode([random_int(2,62)=>random_int(1,10),random_int(2,62)=>random_int(1,10),random_int(2,62)=>random_int(1,10)]),
            'orders'=>json_encode([random_int(0,10),random_int(0,10),random_int(0,10)]),
            'favorites'=>json_encode([random_int(0,10),random_int(0,10),random_int(0,10)]),
            'status'=>'active',
            'photo'=>"https://i.pravatar.cc/48?u=" . random_int(3000,15000),
            'verified'=>true,
            'otp'=>random_int(10000,99999),
        ];
    }
}
