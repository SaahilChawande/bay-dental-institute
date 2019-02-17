<?php
include "conn.php";
include "config.php";

// Capture the payment

require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;

$api = new Api($razor_pay_api_key, $razor_pay_secret_key);

$query = "select `transaction_id` from `transactions_new`;";
$result = mysqli_query($conn, $query);

while($row = mysqli_fetch_assoc($result))   {
    $payment = $api->payment->fetch($row['transaction_id']);
    if ($payment->status != 'captured')   {
        $payment->capture(array('amount' => $payment->amount));
    }
}