<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerInformation;

class AuthController extends Controller
{
    
    public static function login($username, $password): bool
    {
        $customer = CustomerInformation::where("Username", $username)->first();
        if (!$customer) {
            return false; // User not found
        }
        /*else
        {
            return true;
    
        }*/

        if (Hash::check($password, $customer->Password)) {
            return true; //correct password & username exists in the database, therefore true
        }
        
        
        return false;  
        
        

    }
    public function form_login()
    {
        $username = request("username");
        $password = request("password");
        $permanent = request('permanent');

        if (self::login($username,$password)  )
        {
            // "permanent" style login will be 1 hour in duration
            $length = time() + 60*60*24*30;
            if ($permanent == false)
            {
                session_start();
                $_SESSION["username"] = $username;
                $_SESSION["password"] = $password;
                return redirect('home');
            }
            else
            {
                setcookie("username", $username, $length, "/");
                setcookie("password", $password, $length, "/"); 
                return redirect('home');

            }

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

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        return self::giveLogin();
    }
    
    public static function giveRegister()
    {
        return view('register');
    }

 

        public static function isCookieLogin()
        {
            if (isset($_COOKIE["username"]) && isset($_COOKIE["password"])) {
                $username = $_COOKIE["username"];
                $password = $_COOKIE["password"];

                return self::login($username,$password);
            }
        
            return false;
        }
        


    // Checks if the hashed value of "password" matches the assumed hash password in the database
    // If it matches, the model instance, representing the class, will be returned

    public static function hash_check_login($username, $password)
    {

        $account = CustomerInformation::where("Username",$username)->first();
        if ($account != null)
        {
            if (password_verify($password, $account['Password']))
            {
                return $account;
            };
        }

    }
    
    public static function check_login($username, $password)
    {

    }
    public static function enableSession()
    {
        if (!(isset($_SESSION)))
        {
            session_start();
        }
    }
    public static function isSessionLogin()
{
    self::enableSession();

    if (isset($_SESSION["username"]) && isset($_SESSION["password"])) {
        $username = $_SESSION["username"];
        $password = $_SESSION["password"];
        $customer = CustomerInformation::where("Username", $username)->first(); // Fetch customer username from database

        return self::login($username, $password);
    }

    return false;
}




    public static function loggedIn()
    {
        $cl = self::isCookieLogin();
        $sl = self::isSessionLogin();
    
        if ($cl || $sl) {
            return $cl ?: $sl;
        }
    
        return false;
    }
    


    public static function cookieLogout()
    {
        setcookie("username", "", time()-3600);
        setcookie("password", "", time()-3600);
    }

    public static function sessionLogOut()
    {
        session_start();
        session_unset();
        session_destroy();
    }
    public static function logOut()
    {
        self::cookieLogout();
        self::sessionLogOut();

        return self::giveLogin();
    }

    
}
