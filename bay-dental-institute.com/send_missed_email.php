<?php

include "send_missed_email_body.php";
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
    $mail->addAddress('nehavpednekar@gmail.com', 'Neha Pednekar');       // Add a recipient
    $mail->addAddress('info@baydental.in', 'Bay Dental Institute');

    // Attachments
    $mail->addEmbeddedImage("images/logo-1x.png", "logo_2u");
    $mail->addEmbeddedImage("images/logo-1x.png", "logo_1a");
    $mail->addEmbeddedImage("images/bda_logo.jpg", "logo_1b");

    // Content
    $mail->isHTML(true);                                    // Set email format to HTML
    $mail->Subject = 'Invoice (017/2019-20) for your recent order at Bay Dental Institute';
    $mail->Body = $mail_body;
    $mail->AltBody = 'Please contact the vendor for your invoice with number 017/2019-20 and payment id : pay_CsiPlRYKBT2Kse';

    $mail->send();
} catch(\Exception $e)  {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}