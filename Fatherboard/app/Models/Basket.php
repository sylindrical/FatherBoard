<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Basket extends Model
{
use HasFactory;


protected $table = 'basket';
protected $fillable = [
    'customer_information_id',
'items'
    ,];

public function items(){
    return $this->hasMany(BasketItem::class, 'basket_id');
}


public function customerInformation(){
    return $this->belongsTo(CustomerInformation::class,'customer_information_id');
}

}
