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
    send_success('Login Successful');

    // Resume here
}   else {
    send_error('Please enter a valid username and password or click on Sign Up if new user');
}

mysqli_close($conn);