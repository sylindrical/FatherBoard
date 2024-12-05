<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;

use App\Models\ProductPrice;
class Product extends Model
{
    use HasFactory;
    public $fillable = ["Title","Description", "Manufacturer", "Type"];


    public static function newFactory()
    {
        return ProductFactory::new();
    }

    public function price()
    {
        return $this->hasOne(ProductPrice::class);
    }
}