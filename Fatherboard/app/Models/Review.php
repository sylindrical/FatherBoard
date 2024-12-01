<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Review extends Model
{
    use hasFactory;
    protected $table = 'reviews' ;
    protected $fillable = ['review','rating','u_id','p_id'];
}
// Need to add one to many relationship  one product has many reviews 
