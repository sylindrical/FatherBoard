<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public static function giveHome()
    {
        if (AuthController::loggedIn())
        {
            $product = Product::all();
            return view("home",["data"=>$product]);
        }
        else
        {
            return redirect("./login");
        }
    }
}
