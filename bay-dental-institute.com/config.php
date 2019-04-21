<?php
    $is_test = false;
    if ($is_test) {
        $razor_pay_api_key = "rzp_test_OXnWOtyaXflPKm";
        $razor_pay_secret_key = "gfSrMTNfkr8B0g3hh7sadTet";
    }   else    {
        $razor_pay_api_key = "rzp_live_Zxv4CvLXCocOLN";
        $razor_pay_secret_key = "x3FGFUEeSQbKbN9FtnmiqG9n";
    }
    $display_currency = 'INR';

    // These should be commented out in production
    // This is for error reporting
    // Add it to config.php to report any errors

    //error_reporting(E_ALL);
    //ini_set('display_errors', 1);