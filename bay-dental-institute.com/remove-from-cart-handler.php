<?php

include_once "conn.php";

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

$query = "DELETE FROM `cart` WHERE `username` = '" . $username . "' AND `course_id` = '" . $course_id . "';";

if(mysqli_query($conn, $query)) {
    send_success("Successfully removed from cart.");
}   else    {
    send_error("Remove from cart failed");
}