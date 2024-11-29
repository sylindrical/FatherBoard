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
            $addr = $user->first()->address->first();
            return view('settings', ["address"=>$addr]);

        }
    }
}
