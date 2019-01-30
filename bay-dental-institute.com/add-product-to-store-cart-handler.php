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
$product_id = $_POST['product_id'];

$query = "insert into `store_cart` values ('" . $username . "', '" . $product_id . "');";

if(mysqli_query($conn, $query)) {
    send_success("Insert Successful");
}   else{
    send_error("This item is already a part of the cart.");
}

mysqli_close($conn);
