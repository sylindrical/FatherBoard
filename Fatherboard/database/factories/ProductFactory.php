<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Console\View\Components\Choice;
use Nette\Utils\Random;

use App\Models\CustomerInformation;

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
            "Type" => $types[random_int(0,sizeof($types)-1)]
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function ($product)
        {
            // $price = ProductPrice::create(attributes: ["Price"=>300]);
            // $price->product()->associate(["Price"=>300]);
            // $price->save();

            $product->price()->create(["price"=>random_int(100,800)]);
            $product->reviews()->create(["customer_id"=>CustomerInformation::factory()->create()->id,"review"=>fake()->sentence(), "rating"=>random_int(1,5)]);
            $product->save();
        });
    }
}
