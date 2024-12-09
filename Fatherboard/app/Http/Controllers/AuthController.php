<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\CustomerInformation;

class AuthController extends Controller
{
    
    public static function login($email, $password): bool
    {
        
        $customer = CustomerInformation::where("Email", $email)->first();
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
    public static function loginView()
    {
        return view(view: '/login');
    }

    public static function registerView()
    {
        return view(view: '/register');

    }
    public function form_login()
    {
        $username = request("email");
        $password = request("password");
        $permanent = request('permanent');

        if (self::login($username,$password)  )
        {
            // "permanent" style login will be 1 hour in duration
            $length = time() + 60*60*24*30;
            if ($permanent == false)
            {
                session_start();
                $_SESSION["email"] = $username;
                $_SESSION["password"] = $password;
                return redirect('home');
            }
            else
            {
                setcookie("email", $username, $length, "/");
                setcookie("password", $password, $length, "/"); 
                return redirect('home');

            }

        }
        else
        {
            return redirect('login');
        }

    }

    // This form of login returns a json output of whether the user has logged in successfully
    public static function explicit_login()
    {
        $email = request("email");
        $password = request("password");
        $firstName = request("firstName");
        $lastName = request("lastName");

        $permanent = request('permanent');

        if (self::login($email,$password)  )
        {
            // "permanent" style login will be 1 hour in duration
            $length = time() + 60*60*24*30;
            if ($permanent == false)
            {
                session_start();
                $_SESSION["email"] = $email;
                $_SESSION["password"] = $password;
                return json_encode(["conn" =>true]);
            }
            else
            {
                setcookie("email", $email, $length, "/");
                setcookie("password", $password, $length, "/"); 
                return json_encode(["conn" =>true]);

            }

        }
        else
        {
            return json_encode(["conn" =>false]);
        }
    }


    // This form of login returns a json output of whether the user has registered in successfully

    public static function explicit_register()
    {
        $email = request("email");
        $password = request("password");
        $firstName = request("firstName");
        $lastName = request("lastName");

        $min_length_pass = 5;
        $email_regex = "/.+@.+/";

        // check if the user exists already
        
        if (CustomerInformation::where("Email",$email)->get()->count())
        {
            return json_encode(["conn"=>false, "reason"=>"The user already exists"]);
        }
        // checks if given username and password matches certain crtieria.

        if (!(preg_match($email_regex, $email) || (strlen($password) > $min_length_pass)))
        {
            return json_encode(["conn"=>false, "reason"=>sprintf("The email is not in correct format and the password is not atleast %d character length", $min_length_pass)]);
        }
        if (!preg_match($email_regex, $email))
        {
            return json_encode(["conn"=>false, "reason"=>"The email is not in correct format"]);

        }
        if (!(strlen($password) >= $min_length_pass))
        {
            return json_encode(["conn"=>false, "reason"=>sprintf("The password is not atleast %d character length", $min_length_pass)]);

        }



        self::addUser($email,$firstName, $lastName, $password);

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        return json_encode(["conn"=>true]);

    }

    public static function giveLogin()
    {
        if ($x = self::loggedIn())
        {
            return redirect('/home');
        }
        return view('login');
    }




    public static function addUser($email, $firstName, $lastName, $password)
    {

    
        $conf = ["Email"=>$email,"First Name"=>$firstName, "Last Name"=>$lastName, "Password"=>$password];
    
        
        CustomerInformation::create($conf);
    
        return redirect("/login");
    }


    public static function form_register()
    {
        $email = request("email");
        $password = request("password");
        $firstName = request("firstName");
        $lastName = request("lastName");

        self::addUser($email,$firstName, $lastName, $password);

        $hash_password = password_hash($password, PASSWORD_DEFAULT);

        return redirect("/login");
    }
    
    public static function giveRegister()
    {
        if ($x = self::loggedIn())
        {
            return redirect('/home');
        }
        return view('register');    }

 

        public static function isCookieLogin()
        {
            if (isset($_COOKIE["email"]) && isset($_COOKIE["password"])) {
                $email = $_COOKIE["email"];
                $password = $_COOKIE["password"];

                $customer = CustomerInformation::where("Email", $email)->first();
                if ($customer && Hash::check($password, $customer->Password)) {
                    return $customer;
                }
            }
        
            return false;
        }
        


    // Checks if the hashed value of "password" matches the assumed hash password in the database
    // If it matches, the model instance, representing the class, will be returned

    public static function hash_check_login($email, $password)
    {

        $account = CustomerInformation::where("Email",$email)->first();
        if ($account != null)
        {
            if (password_verify($password, $account['Password']))
            {
                return $account;
            };
        }

    }
    
    // public static function check_login($username, $password)
    // {

    // }
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

    if (isset($_SESSION["email"]) && isset($_SESSION["password"])) {
        $username = $_SESSION["email"];
        $password = $_SESSION["password"];
        $customer = CustomerInformation::where("Email", $username)->first(); // Fetch customer username from database

        if ($customer && Hash::check($password, $customer->Password)) {
            return $customer; // returns customer if username and password matches
        }
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

    public static function whichLog()
    {
        $cl = self::isCookieLogin();
        $sl = self::isSessionLogin();

        if ($cl && $sl)
        {
            return "both";
        }
        if ($cl)
        {
            return "cookie";
        }
        if ($sl)
        {
            return "session";
        };

        return false;
    }
    


    public static function cookieLogout()
    {
        setcookie("email", "", time()-3600);
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

        return redirect("/login");
    }

    
}
