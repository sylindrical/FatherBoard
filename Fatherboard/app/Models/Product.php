<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;
class Product extends Model
{
  use HasFactory;
    public $fillable = ["Title","Description", "Manufacturer", "Type"];

public function reviews()
{
    return $this->hasMany(Review::class,'product_id');
}

    public static function newFactory()
    {
        return new ProductFactory;
    }
}