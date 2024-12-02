<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    /** @use HasFactory<\Database\Factories\OrdersFactory> */
    use HasFactory;
    protected $fillable = ['order_id','order_status','customer_id','product_id','quantity'];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'order_details', 'order_id', 'products_id')->withPivot('number_ordered');
    }
    
}
