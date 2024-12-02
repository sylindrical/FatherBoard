<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
use App\Models\Product;
use Illuminate\Console\View\Components\Choice;
use Nette\Utils\Random;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Product::class;

    public function definition(): array
    {
        $types = ['CPU','Memory','GPU','PSU','Prebuilt'];
        return [
            "Title" => fake()->name(),
            "Description" => fake()->text(),
            "Manufacturer" => fake()->name(),
            "Type" => $types[random_int(0,sizeof($types))]
        ];
    }
}
