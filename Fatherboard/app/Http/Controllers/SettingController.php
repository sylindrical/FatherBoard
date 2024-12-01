<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;

class SettingController extends Controller
{
    
    public static function pageSettings()
    {

        if ($user = AuthController::loggedIn())
        {
            $addr = $user->first()->address;

            return view('settings', ["addr"=>$addr]);

        }
        else
        {
            return redirect("./login");
        }
    }

    public static function showAddress()
    {
        if ($user = AuthController::loggedIn())
        {
            $addr = $user->first()->address;

            return json_encode($addr);
        }
        return json_encode("");
    }

    public static function showPersonal()
    {
        if ($user = AuthController::loggedIn())
        {
            $addr = $user->first();

            return json_encode($addr);
        }
        return json_encode("");   
    }
}
