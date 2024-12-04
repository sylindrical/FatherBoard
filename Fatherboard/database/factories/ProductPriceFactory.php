<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductPrice>
 */
use App\Models\Product;
use App\Models\ProductPrice;

class ProductPriceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public $model = ProductPrice::class;
    public function definition(): array
    {
        return [
            "price"=>random_int(50,600),
            "product_id"=> Product::factory()->create()
        ];
    }
}
