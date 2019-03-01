<?php

    include "conn.php";
    include "mail.php";

    @session_start();

    echo "<h1>Please wait...</h1>";

    // Calculate the total amount
    $total_amount = 0;
    date_default_timezone_set('Asia/Kolkata');

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

    // Insert the transaction into the database

    $query = "insert into `transactions_new` (`transaction_id`, `username`, `amount`, `invoice_number`, `date`) values ('" . $_POST['razorpay_payment_id'] . "', '" . $_SESSION['username'] . "', '" . $total_amount . "', '" . $final_invoice_number . "', '" . date('d/m/Y') . "');";
    mysqli_query($conn, $query);

    // Update the enrolled number
    $query = "select courses.course_id, courses.enrolled from `courses` inner join `cart` on courses.course_id = cart.course_id where username = '" . $_SESSION['username'] . "';";
    $result = mysqli_query($conn, $query);
    while($row = mysqli_fetch_assoc($result))   {
        $update_query = "update `courses` set enrolled = " . ($row['enrolled'] + 1) . " where course_id = " . $row['course_id'] . ";";
        mysqli_query($conn, $update_query);
    }

    // Delete entries from cart
    $query = "delete from `cart` where username = '" . $_SESSION['username'] . "';";
    mysqli_query($conn, $query);

    $query = "delete from `store_cart` where username = '" . $_SESSION['username'] . "';";
    mysqli_query($conn, $query);

    // Send the invoice on the mail

    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/SMTP.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    $mail = new PHPMailer(true);                                // Passing 'true' enables exceptions
    try {
        // Server Settings
        $mail->SMTPDebug = 2;                                           // Enable verbose debug output
        //$mail->isSMTP();                                                // Set mailer to use SMTP
        $mail->Host = 'localhost';                                 // Specify main and backup smtp servers
        //$mail->authentication  = false;
        //$mail->SMTPAuth = false;                                         // Enable SMTP Authentication
        //$mail->Username = 'info@baydental.in';                          // SMTP Username
        //$mail->Password = 'bda41016';                                   // SMTP Password
        //$mail->SMTPSecure = 'ssl';                                      // Enable 'ssl' encryption, 'tls' also accepted
        //$mail->Port = 465;                                              // Gmail : 465 for ssl and 587 for tls

        // Recipients
        $mail->setFrom('info@baydental.in', 'no-reply@baydental.in');
        $mail->addAddress($_SESSION['email'], $_SESSION['username']);       // Add a recipient
        $mail->addAddress('info@baydental.in', 'Bay Dental Institute');

        // Attachments
        $mail->addEmbeddedImage("images/logo-1x.png", "logo_2u");
        $mail->addEmbeddedImage("images/logo-1x.png", "logo_1a");
        $mail->addEmbeddedImage("images/bda_logo.jpg", "logo_1b");

        // Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'Invoice (' . $final_invoice_number . ') for your recent order at Bay Dental Institute';
        $mail->Body = $mail_body;
        $mail->AltBody = 'Please contact the vendor for your invoice with number ' . $final_invoice_number . ' and payment id : ' . $_POST['razorpay_payment_id'];

        $mail->send();
    } catch(\Exception $e)  {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

    header("Location: payment_success.php");