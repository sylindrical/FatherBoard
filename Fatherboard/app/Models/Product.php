<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Database\Factories\ProductFactory;

class Product extends Model
{
    use HasFactory;
    public $fillable = ["Title","Description", "Owner"];


    public static function newFactory()
    {
        return new ProductFactory;
    }

    public function Orders()
    {
        return $this->belongsToMany(Orders::class, 'order_details', 'products_id', 'order_id')->withPivot('number_ordered');
    }
}
