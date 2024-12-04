<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Review extends Model
{
    use HasFactory;
    protected $table = 'reviews' ;
    protected $fillable = ['customer_id','product_id','review','rating'];

// Need to add one to many relationship  one product has many reviews 

public function customer()
{
    return $this->belongsTo(User::class,'customer_id');
}

public function product(){
    return $this->belongsTo(Product::class,'product_id');
    
}
}