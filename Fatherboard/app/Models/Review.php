<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use hasFactory;
    protected $table = 'reviews' ;
    protected $fillable = ['customer_id','products_id','review','rating'];

// Need to add one to many relationship  one product has many reviews 

public function customer()
{
    return $this->belongsTo(User::class,'customer_id');
}
}