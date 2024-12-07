<?php

namespace App\Http\Controllers;

use App\Models\ContactForm;
use Illuminate\Http\Request;
use App\Utility\Utility;
class ContactFormController extends Controller
{
    public static function addMessage($firstName, $lastName, $email, $message)
    {
        $data = ["First Name"=> $firstName, "Last Name" => $lastName, "Email"=>$email,
        "Message"=>$message
    ];
        ContactForm::create($data);
    }


    public static function form_message()
    {
        $firstName = request("FirstName");
        $lastName = request("LastName");
        $email = request("Email");
        $message = request("Message");
        if ($email != null && Utility::checkEmail($email))
        {
            self::addMessage($firstName, $lastName, $email, $message);
            return json_encode(["conn"=>true]);
        }
        return json_encode(["conn"=>false]);

    }


    public static function giveContact()
    {
        return view("contact");
    }

    public static function index()
    {
        $messages = ContactForm::query()->get();
        return $messages;
    }

}
