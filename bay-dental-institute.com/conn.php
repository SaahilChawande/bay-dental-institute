<?php

$is_server_set = 1;

if ($is_server_set == 0)    {
    $username="root";
    $password="";
}   elseif (is_server_set == 1) {
    $username = "baydentaluser";
    $password = "blank";
}

$servername="localhost";
$dbname="baydentalinstitute";
$conn=mysqli_connect($servername,$username,$password,$dbname);

if(!$conn)   {
    die("Connection error: " . mysqli_connect_error());
}