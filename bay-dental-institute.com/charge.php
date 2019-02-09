<?php

    include "conn.php";
    include "mail.php";

    @session_start();

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

    // Capture the payment

    require('razorpay-php/Razorpay.php');

    use Razorpay\Api\Api;

    $api = new Api($razor_pay_api_key, $razor_pay_secret_key);

    $payment = $api->payment->fetch($_POST['razorpay_payment_id']);
    $payment->capture(array('amount' => $payment->amount));

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
        $mail->addAddress($_SESSION['email']);       // Add a recipient

        // Attachments

        // Content
        $mail->isHTML(true);                                    // Set email format to HTML
        $mail->Subject = 'Invoice (' . $final_invoice_number . ') for your recent order at Bay Dental Institute';
        $mail->Body = $mail_body;
        $mail->AltBody = 'Please contact the vendor for your invoice with number ' . $final_invoice_number . ' and payment id : ' . $_POST['razorpay_payment_id'];

        $mail->send();
    } catch(\Exception $e)  {
        echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
    }

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
?>
<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<?php
    $is_subfolder = false;
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <title>Payment Success - Bay Dental Institute</title>
    <link rel='stylesheet' href='css/animations.css' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Lora:400,400i,700,700i|Merriweather:300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Poppins:300,400,500,600,700|Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext' type='text/css' media='all'>
    <link rel='stylesheet' href='css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/plugin.tribe-events.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/skin.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/custom-style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/skin.responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/mediaelement/mediaelementplayer.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/mediaelement/mediaelement.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/comp/comp.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.messages.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/swiper/swiper.min.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://printjs-4de6.kxcdn.com/print.min.css">

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

<body id="home" class="indexp home page body_style_wide body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">
<a id="toc_home" class="sc_anchor" title="Home" data-description="&lt;i&gt;Return to Home&lt;/i&gt; - &lt;br&gt;navigate to home page of the site" data-icon="icon-home" data-url="index.html" data-separator="yes"></a>
<a id="toc_top" class="sc_anchor" title="To Top" data-description="&lt;i&gt;Back to top&lt;/i&gt; - &lt;br&gt;scroll to top of the page" data-icon="icon-double-up" data-url="" data-separator="yes"></a>
<div class="body_wrap">
    <div class="page_wrap">
        <div class="top_panel_fixed_wrap"></div>
        <header class="top_panel_wrap top_panel_style_2 scheme_original">
            <div class="top_panel_wrap_inner top_panel_inner_style_2 top_panel_position_above">
                <div class="top_panel_bottom">
                    <div class="logo alignleft" style="margin: 0" >
                        <img src="images/logo-1x.png" class="logo_main" alt="">
                    </div>
                    <?php include "desktop-header.php"; ?>
                </div>
            </div>
        </header>

        <div class="header_mobile dark-background">
            <div class="content_wrap">
                <div class="menu_button icon-menu"></div>
                <div class="logo">
                    <a href="#">
                        <img src="images/logo-1x.png" class="logo_main" alt="" width="202" height="49">
                    </a>
                </div>
            </div>
            <?php include "mobile-header.php"; ?>
            <div class="mask"></div>
        </div>

        <div class="top_panel_title top_panel_style_2 title_present breadcrumbs_present scheme_original dark-background">
            <div class="top_panel_title_inner top_panel_inner_style_2 title_present_inner breadcrumbs_present_inner">
                <div class="content_wrap">
                    <h1 class="page_title">Payment Success</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Payment Success</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="wpb_column vc_column_container vc_col-sm-12 dark-background">
            <div class="vc_column-inner ">
                <div class="wpb_wrapper">
                    <div class="sc_content content_wrap margin_top_huge margin_bottom_huge">
                        <h2 class="aligncenter">Payment Successful. Please check your inbox for invoice.</h2>
                    </div>
                    <div class="aligncenter">
                        <a href="index.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="color: white; margin-top: 23px">Back To Home</a>
                    </div>
                    <div class="vc_empty_space space_10p" style="height: 37em">
                        <span class="vc_empty_space_inner"></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright_wrap copyright_style_socials scheme_light">
            <div class="copyright_wrap_inner">
                <div class="content_wrap_outer">
                    <div class="content_wrap">
                        <div class="copyright_text">Bay Dental Institute 2018 © All Rights Reserved. Developed by <a href="www.incepiomdigitech.in">Incepiom Digitech</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="popup_login" class="popup_wrap popup_login bg_tint_light">
    <a href="#" class="popup_close"></a>
    <div class="form_wrap">
        <div class="form_left">
            <form action="#" method="post" name="login_form" class="popup_form login_form">
                <input type="hidden" name="redirect_to" value="index.html">
                <div class="popup_form_field login_field iconed_field icon-user">
                    <input type="text" id="log" name="log" value="" placeholder="Login or Email">
                </div>
                <div class="popup_form_field password_field iconed_field icon-lock">
                    <input type="password" id="password" name="pwd" value="" placeholder="Password">
                </div>
                <div class="popup_form_field remember_field">
                    <input type="checkbox" value="forever" id="rememberme" name="rememberme">
                    <label for="rememberme">Remember me</label>
                    <a href="#" class="forgot_password">Forgot password?</a>
                </div>
                <div class="popup_form_field submit_field">
                    <input type="submit" class="submit_button" value="Login">
                </div>
            </form>
        </div>
        <div class="form_right">
            <div class="login_socials_title">You can login using your social profile</div>
            <div class="loginSoc login_plugin">
                <div class="wp-social-login-widget">
                    <div class="wp-social-login-connect-with">Connect with:</div>
                    <div class="wp-social-login-provider-list">
                        <a rel="nofollow" href="#" title="Connect with Facebook" class="wp-social-login-provider wp-social-login-provider-facebook" data-provider="Facebook">
                            <img alt="" title="Connect with Facebook" src="images/facebook.png" />
                        </a>
                        <a rel="nofollow" href="#" title="Connect with Google" class="wp-social-login-provider wp-social-login-provider-google" data-provider="Google">
                            <img alt="" title="Connect with Google" src="images/google.png" />
                        </a>
                        <a rel="nofollow" href="#" title="Connect with Twitter" class="wp-social-login-provider wp-social-login-provider-twitter" data-provider="Twitter">
                            <img alt="" title="Connect with Twitter" src="images/twitter.png" />
                        </a>
                    </div>
                    <div class="wp-social-login-widget-clearing"></div>
                </div>
            </div>
            <div class="result message_block"></div>
        </div>
    </div>
</div>

<a href="#" class="scroll_to_top icon-up" title="Scroll to top"></a>
<div class="custom_html_section"></div>

<script type='text/javascript' src='js/vendor/jquery/jquery.js'></script>
<script type='text/javascript' src='js/vendor/jquery/jquery-migrate.min.js'></script>
<script type='text/javascript' src='js/custom/custom.js'></script>
<script type='text/javascript' src='js/vendor/jquery/fcc8474e79.js'></script>
<script type='text/javascript' src='js/vendor/modernizr.min.js'></script>
<script type='text/javascript' src='js/vendor/jquery/core.min.js'></script>
<script type='text/javascript' src='js/vendor/jquery/datepicker.min.js'></script>
<script type='text/javascript' src='js/vendor/superfish.js'></script>
<script type='text/javascript' src='js/custom/jquery.slidemenu.js'></script>
<script type='text/javascript' src='js/custom/core.utils.js'></script>
<script type='text/javascript' src='js/custom/core.init.js'></script>
<script type='text/javascript' src='js/custom/init.js'></script>
<script type='text/javascript' src='js/vendor/mediaelement/mediaelement-and-player.min.js'></script>
<script type='text/javascript' src='js/vendor/mediaelement/mediaelement.min.js'></script>
<script type='text/javascript' src='js/custom/social-share.js'></script>
<script type='text/javascript' src='js/custom/embed.min.js'></script>
<script type='text/javascript' src='js/custom/shortcodes.js'></script>
<script type='text/javascript' src='js/custom/core.messages.js'></script>
<script type='text/javascript' src='js/vendor/comp/comp_front.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/widget.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/accordion.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/tabs.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/effect.min.js'></script>
<script type='text/javascript' src='js/vendor/ui/effect-fade.min.js'></script>
<script type='text/javascript' src='js/vendor/swiper/swiper.min.js'></script>
<script type='text/javascript' src='js/vendor/core.googlemap.js'></script>
<script type='text/javascript' src='js/vendor/chart.min.js'></script>
</body>
