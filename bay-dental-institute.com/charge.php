<?php

    include "conn.php";

    session_start();

    $total_amount = 0;

    $get_cart_query = "select courses.course_cost from `courses` inner join `cart` on courses.course_id = cart.course_id where cart.username = '" . $_SESSION['username'] . "';";
    $result = mysqli_query($conn, $get_cart_query);
    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            $total_amount += (int)$row['course_cost'];
        }
    }

    $get_store_cart_query = "select store_products.product_price from `store_products` inner join `store_cart` on store_products.id = store_cart.product_id where store_cart.username = '" . $_SESSION['username'] . "';";
    $result =mysqli_query($conn, $get_store_cart_query);

    if (mysqli_num_rows($result) > 0)  {
        while($row = mysqli_fetch_assoc($result))   {
            $total_amount += (int)$row['product_price'];
        }
    }

    $query = "insert into `transactions` values ('" . $_POST['razorpay_payment_id'] . "', '" . $_SESSION['username'] . "', '" . $total_amount . "');";
    mysqli_query($conn, $query);
    echo "<pre>";
    print_r($_POST);
    die;