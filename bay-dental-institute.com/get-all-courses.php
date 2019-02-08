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

$query = "SELECT * FROM `courses`;";
$result = mysqli_query($conn, $query);
$result_array = [];

if(mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result))   {
        $result_array[] = $row;
    }
    send_success($result_array);
}   else {
    send_error("No courses listed");
}

mysqli_close($conn);



