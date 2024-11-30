<?php

namespace App\Models;

use Database\Factories\AddressFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressInformation extends Model
{
    use HasFactory;
    protected $fillable = ["Country", "Address Line", "City", "PostCode"];

    public function customers()
    {
        return $this->belongsToMany(CustomerInformation::class, "address_customer");
    }

    public static function newFactory()
    {
        return AddressFactory::new();
    }
}
