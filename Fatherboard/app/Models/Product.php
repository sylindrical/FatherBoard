<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $fillable = ["Title","Description", "Owner"];

public function reviews()
{
    return $this->hasMany(Review::class,'product_id');

}
}