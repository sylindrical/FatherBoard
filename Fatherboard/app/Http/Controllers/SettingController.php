<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Models\AddressInformation;
use App\Models\CustomerInformation;
use Faker\Provider\ar_EG\Address;

class SettingController extends Controller
{
    
    public static function pageSettings()
    {

        if ($user = AuthController::loggedIn())
        {
            $addr = $user->address;

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
            $addr = $user->address;

            return json_encode($addr);
        }
        return json_encode("");
    }

    public static function showPersonal()
    {
        if ($user = AuthController::loggedIn())
        {
            $addr = $user;

            return json_encode($addr);
        }
        return json_encode("");   
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
