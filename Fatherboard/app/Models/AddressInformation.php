<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AddressInformation extends Model
{
    protected $fillable = ["Country", "Address Line", "City", "PostCode"];
}
