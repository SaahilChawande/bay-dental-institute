<?php

include "conn.php";

session_start();

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

$username = $_SESSION['username'];
$course_id = $_POST['course_id'];

$query = "insert into `cart` values ('" . $username . "', '" . $course_id . "');";

if(mysqli_query($conn, $query)) {
    send_success("Insert Successful");
}   else{
    send_error("This item is already a part of the cart.");
}

mysqli_close($conn);