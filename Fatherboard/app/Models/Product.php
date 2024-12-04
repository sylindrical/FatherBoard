<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;


class Product extends Model
{
    public $fillable = ["Title","Description", "Owner"];

public function reviews()
{
    return $this->hasMany(Review::class,'product_id');
}

    public static function newFactory()
    {
        return new ProductFactory;
    }

    public function order_details() //Establishes many to many relationship with Orders model through order details pivot
    {
        return $this->hasMany(order_details::class);
    }
}