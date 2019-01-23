<?php
    session_start();
    unset($_SESSION['username']);
    session_unset();
    header("Location: book-a-course.php");
?>