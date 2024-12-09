<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
use HasFactory;


protected $table = 'Basket';
protected $fillable = [
    'customer_information_id',
    'items'
    ,];

protected $casts = [ 'items'=>'array',];

public function product(){
    return $this->belongsTo(Product::class,'product_id');

}
public function productPrice(){
    return $this->hasOne(ProductPrice::class,'product_id','product_id');
}
public function customerInformation(){
    return $this->belongsTo(CustomerInformation::class,'customer_information_id');
}
public function getProductsAttribute()
{
    $productIds = collect($this->items)->pluck('product_id')->toArray();
    return Product::whereIn('id', $productIds)->get();
}
}
