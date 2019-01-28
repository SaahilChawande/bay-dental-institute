<?php

$is_server_set = true;

if (!$is_server_set)    {
    $username="root";
    $password="";
}   else if ($is_server_set) {
    $username = "baydentaluser";
    $password = "blank";
}

$servername="localhost";
$dbname="baydentalinstitute";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)   {
    die("Connection error: " . mysqli_connect_error());
}