<?php

include_once "conn.php";

// Create functions

function send_error($message)   {
    echo json_encode(array(
        "status" => "error",
        "message" => $message
    ));
    exit();
}

function send_success($message) {
    echo json_encode(array(
        "status" => "ok",
        "message" => $message
    ));
    exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);

$query = "select * from `client` where `email` = '" . $email . "';";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0)   {
    send_success('Email Verified');
}   else    {
    send_error('Please enter a valid email or click on Sign Up');
}