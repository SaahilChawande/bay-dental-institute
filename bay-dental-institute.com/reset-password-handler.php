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
$password_1 = mysqli_real_escape_string($conn, $_POST['password1']);
$password_2 = mysqli_real_escape_string($conn, $_POST['password2']);

if ($password_1 != $password_2) {
    send_error("Passwords do not match");
}   else    {
    $query = "update `client` set `password` = '" . $password_1 . "' where `email`='" . $email . "';";
    if (!mysqli_query($conn, $query))   {
        send_error(mysqli_error($conn));
    }   else    {
        send_success("Password Update Successful");
    }
}