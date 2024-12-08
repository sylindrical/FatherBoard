<?php
namespace App\Utility;
class Utility
{
    
    public static function checkEmail($test_email)
    {
        $email_regex = "/.+@.+/";

        return preg_match($email_regex, $test_email);

    }

    public static function numberClosest($num, $arr)
    {
        $diff = [];
        foreach ($arr as $ind => $x)
        {
            $diff[$ind] = abs($num - $x);
        }
        asort($diff); // Sort the array while maintaining index association
    
        $smallestDiff = reset($diff); // Get the smallest difference
        $closestIndex = key($diff); // Get the index of the smallest difference
    
        return $arr[$closestIndex]; // Return the closest number
    }

    

}
?>