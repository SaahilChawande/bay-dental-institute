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


$username = mysqli_real_escape_string($conn, $_POST["username"]);
$password = mysqli_real_escape_string($conn, $_POST["password"]);

if($username == "" and $password == "") {
    send_error('Please enter the username and password');
}   else if ($username == "")   {
    send_error('Please enter the username');
}   else if ($password == "")    {
    send_error('Please enter the password');
}

$query = "select * from `client` where `username` = '" . $username . "' and `password` = '" . $password . "';";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)    {
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $address = $row['address'];
    $mobile_number = $row['mobileNo'];
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['email'] = $email;
    $_SESSION['address'] = $address;
    $_SESSION['mobile_number'] = $mobile_number;
    send_success('Login Successful');

    // Resume here
}   else {
    send_error('Please enter a valid username and password or click on Sign Up if new user');
}

mysqli_close($conn);