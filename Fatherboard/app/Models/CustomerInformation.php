<?php

namespace App\Models;

use Database\Factories\CustomerFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerInformation extends Model
{
    use HasFactory;

    protected $fillable = ["Username","Password"];


    public function address()
    {
        return $this->belongsToMany(AddressInformation::class, "address_customer");
    }

    public static function newFactory()
    {
        return CustomerFactory::new();
    }
}
