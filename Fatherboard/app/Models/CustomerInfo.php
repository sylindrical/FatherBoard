<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInfo extends Model
{

    protected $fillable = ["Username","Password"];


    protected $casts = [

        'email_verified_at' => 'datetime',
        'Username' => 'encrypted',
        'Password' => 'hashed',


    ];

}
