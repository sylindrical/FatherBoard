<?php

namespace Database\Factories;

use App\Models\CustomerInformation;
use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\AddressInformation;
/**
 */
class CustomerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = CustomerInformation::class;
    public function definition(): array
    {
        return [
            "Username"=>fake()->userName(),
            "Password"=>fake()->password()
        ];
    }

    public function hasAddr(int $num)
    {
        return $this->has(AddressInformation::factory($num), 'address');
    }
}
