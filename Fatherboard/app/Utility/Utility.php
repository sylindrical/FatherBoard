<?php
namespace App\Utility;
class Utility
{
    
    public static function checkEmail($test_email)
    {
        $email_regex = "/.+@.+/";

        return preg_match($email_regex, $test_email);

    }
}
?>