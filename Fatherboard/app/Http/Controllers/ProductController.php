<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    
    public function productPage()
    {

        return [["Gaming Headphone", "Best experience in the atmosphere", "5.5"],
    ];
    }
}
