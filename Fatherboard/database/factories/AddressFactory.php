<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
use App\Models\AddressInformation;
class AddressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = AddressInformation::class;


    public function definition(): array
    {
        return [
            "Country" => fake()->country(),
            "City"=>fake()->city(),
            "Address Line"=>fake()->address(),
            "PostCode"=>fake()->postcode()
        ];
    }
}
