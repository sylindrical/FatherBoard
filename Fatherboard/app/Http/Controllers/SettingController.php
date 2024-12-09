<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Models\AddressInformation;
use App\Models\ContactForm;
use App\Models\CustomerInformation;
use Faker\Provider\ar_EG\Address;
use Illuminate\Support\Facades\Hash;

class SettingController extends Controller
{
    
    public static function pageSettings()
    {

        if ($user = AuthController::loggedIn())
        {
            $addr = $user->address;
            
            if ($user["Admin"])
            {
                return view('settings', ["addr"=>$addr, "user"=>$user, "messages"=>ContactForm::all()]);

            }
            else
            {
                return view('settings', ["addr"=>$addr, "user"=>$user]);

            }

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
            $addr = $user->address;

            return json_encode($addr);
        }
        return json_encode("");
    }

    public static function showPersonal()
    {

        $form = AuthController::whichLog();
        $password = null;

        if ($form == "cookie")
        {
            $password = $_COOKIE["password"];
        }
        else if ($form == "session")
        {
            AuthController::enableSession();
            $password = $_SESSION["password"];

        }
        if ($user = AuthController::loggedIn())
        {
            $addr = $user->toArray();
            $addr["Password"] = $password;
            return json_encode($addr);
        }



        return json_encode("");   
    }

    public static function updatePersonal()
    {
        if ($user = AuthController::loggedIn())
        {
        $updated = request("personal_text");
        $version = request("version");

        $data = [$version=>$updated];
        
        $form = AuthController::whichLog();

        if ($version == "Password")
        {
            $data = [$version=>Hash::make($updated)];

        }
        CustomerInformation::where("id",$user["id"])->update($data);
        
        if ($version == "Password")
        {
        if ($form == "cookie")
        {
            $length = time() + 60*60*24*30;

            // setcookie("email", $updated, $length, path: "/");
            setcookie("password", $updated, $length, "/"); 

        }
        if ($form == "session")
        {
            AuthController::enableSession();
            $_SESSION["password"] = $updated;
        }
    }
    if ($version == "Email")
        {
        if ($form == "cookie")
        {
            $length = time() + 60*60*24*30;

            setcookie("email", $updated, $length, "/"); 

        }
        if ($form == "session")
        {
            AuthController::enableSession();
            $_SESSION["email"] = $updated;
        }
    }
    return json_encode(["conn"=>true]);

        }
    


    }
    public static function addAddress($id, $Country, $City, $AddrLine, $postCode)
{
    $cust = CustomerInformation::find($id);
    $addr = AddressInformation::create(["Country"=>$Country, "City"=>$City, "Address Line"=>$AddrLine, "PostCode"=>$postCode]);
    $cust->address()->attach($addr);
    return $addr;
}

public static function form_addAddress()
{
    if ($user = AuthController::loggedIn())
    {
        // Validation Work

        // $_POST = json_decode(json: file_get_contents('php://input'), true);

        $id = $user["id"];
        $country = $_POST["Country"];

        $city = $_POST["City"];

        $addrline = $_POST["AddressLine"];

        $postCode = $_POST["PostCode"];
        
         $addr =  self::addAddress($id,$country,$city,$addrline, $postCode);

         return json_encode($addr);
        
    }
    return json_encode("sk");
}

public static function form_removeAddress()
{
    if ($user = AuthController::loggedIn())
    {
        $_POST = json_decode(file_get_contents("php://input"),true);
        $user_id = $user["id"];   
        $address_id = $_POST["address_id"];
        
        self::removeAddress($user_id, $address_id);
        return json_encode("");

    }

}

public static function removeAddress($user_id, $address_id)
{
    // AddressInformation::where("customer_information_id",$user_id)::where("address_information_id",$address_id)->delete();
    
    CustomerInformation::where("id",$user_id)->first()->address->where("id",$address_id)->first()->delete();
}
}
