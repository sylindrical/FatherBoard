<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $fillable = ["First Name", "Last Name", "Email", "Message"];

    public static function showInformation()
    {
    }
}
