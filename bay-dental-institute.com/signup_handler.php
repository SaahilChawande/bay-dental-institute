<?php

$servername="localhost";
$username="root";
$password="";
$dbname="baydentalinstitute";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)   {
    die("Connection error: " . mysqli_connect_error());
}

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
$password_1 = mysqli_real_escape_string($conn, $_POST["password1"]);
$password_2 = mysqli_real_escape_string($conn, $_POST["password2"]);
$email = mysqli_real_escape_string($conn, $_POST["email"]);
$address = mysqli_real_escape_string($conn, $_POST["address"]);
$mobile = mysqli_real_escape_string($conn, $_POST["mobile"]);

if($username == "" || $password_1 == "" || $password_1 == "" || $email == "" || $address == "" ) {
    send_error('Please enter the required fields');
}
if ($password_1 != "" && $password_2 != "" && $password_1 != $password_2)   {
    send_error('Passwords do not match');
}

// Check if username already exists
$query = "select * from `client` where `username` = '" . $username . "';";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)    {
    send_error('Username already exists. Please select a new username');
}

// Check if email already exists
$query = "select * from `client` where `email` = '" . $email . "';";
$result = mysqli_query($conn, $query);
if(mysqli_num_rows($result) > 0)    {
    send_error('Email already exists. Try forgot password instead.');
}

$query = "insert into `client` values ('". $username ."', '" . $password_1 . "', '" . $email . "', '" . $address . "', '" . $mobile . "');";
if(mysqli_query($conn, $query))    {
    send_success('Registration Successful');
}   else {
    send_error('There was an error while signing up.');
}

mysqli_close($conn);