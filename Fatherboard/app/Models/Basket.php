<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
use HasFactory;
    protected $fillable = [
    'user_id',
    'product_id',
    'quantity',];

public function product(){
    return $this->belongsTo(Product::class,'product_id');

}
public function productPrice(){
    return $this->hasOne(ProductPrice::class,'product_id','product_id');
}


}