<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Branches>
 */
class BranchesFactory extends Factory
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
            'manager'=>fake()->name(),
            'manager_phone'=>fake()->phoneNumber(),
            'manager_national_id'=>fake()->randomNumber(),
            'email'=>fake()->unique()->safeEmail(),
            'address'=>fake()->address(),
            'province'=>fake()->city(),
            'city'=>fake()->city(),
            'neighbourhood'=>fake()->streetName(),
            'ownership_type'=>fake()->word(),
            'property_area'=>random_int(30,300),
            'property_age'=>random_int(1,50),
            'business_license'=>fake()->boolean(),
            'parking_lot'=>fake()->boolean(),
            'warehouse'=>fake()->boolean(),
            'kitchen'=>fake()->boolean(),
            'cordinates'=>json_encode([fake()->localCoordinates()]),
            'phone1'=>fake()->phoneNumber(),
            'phone2'=>fake()->phoneNumber(),
            'open_hour'=>fake()->time('H:i', "20:00"),
            'close_hour'=>fake()->time('H:i', "24:00"),
            'open_days'=>json_encode(['Sat','Sun','Mon','Tue','Wed','Thu','Fri']),
            'pictures'=>json_encode([
                fake()->imageUrl(640,480,'restaurant'),
                fake()->imageUrl(640,480,'restaurant'),
                fake()->imageUrl(640,480,'restaurant'),
            ]),
            'description'=>fake()->text(),
            'fix_delivery'=>random_int(20,50)*1000,
            'delivery_per_km'=>random_int(5,10)*1000,
        ];
    }
}
