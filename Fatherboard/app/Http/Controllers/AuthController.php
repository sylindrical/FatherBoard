<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CustomerInformation;

class AuthController extends Controller
{
    
    public static function login($username, $password): bool
    {
        $customer = CustomerInformation::where("Username", $username)->where("Password", $password)->get();
        if ($customer->count() == 0)
        {
            return false;
    
        }
        else
        {
            return true;
    
        }
    }
    public function form_login()
    {
        $username = request("username");
        $password = request("password");
        
        if (self::login($username,$password)  )
        {
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            return redirect('home');
        }
        else
        {
            return redirect('login');
        }

    }

    public static function giveLogin()
    {
        return view('login');
    }

    public static function addUser($username, $password)
    {

    
        $conf = ["Username"=>$username,"Password"=>$password];
    
        
        CustomerInformation::create($conf);
    
        return redirect("/login");
    }


    public static function form_register()
    {
        $username = request("username");
        $password = request("password");

        self::addUser($username,$password);

        return self::giveLogin();
    }
    
    public static function giveRegister()
    {
        return view('register');
    }
    public static function loggedIn()
    {
        session_start();

        if (isset($_SESSION["username"]))
        {
            if (isset($_SESSION["password"]))
            {
                $username = $_SESSION["username"];
                $password = $_SESSION["password"];
                if (self::login($username, $password))
                {
                    return CustomerInformation::where("Username", $username)->where("Password", $password)->get();
                }; 
            }
        }

    }

    public static function logOut()
    {
        session_start();
        session_unset();
        session_destroy();
        return self::giveLogin();
    }

    
}
