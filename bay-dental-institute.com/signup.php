<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<?php 
    $is_subfolder = false;
?>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <title>SignUp - Bay Dental Institute</title>
    <link rel='stylesheet' href='css/animations.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/esg/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700|Lora:400,400i,700,700i|Merriweather:300,300i,400,400i,700,700i,900,900i|Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i|Poppins:300,400,500,600,700|Raleway:100,200,300,400,500,600,700,800,900&amp;subset=latin-ext' type='text/css' media='all'>
    <link rel='stylesheet' href='css/fontello/css/fontello.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.animation.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/shortcodes.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/skin.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/custom-style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/skin.responsive.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/comp/comp.min.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/custom.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/core.messages.css' type='text/css' media='all' />
    <link rel='stylesheet' href='js/vendor/esg/lightbox.css' type='text/css' media='all' />

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="application/javascript">
        function onLoginClicked()   {
            window.location.href = "login.php";
        }

        function onSignUpFormSubmit()   {
            var my_data = $('#sign_up_form').serializeArray();
            $.ajax({
                type: "POST",
                url: "signup_handler.php",
                data: my_data,
                dataType: "json"
            }).done(function(data)  {
                if(data.status == "ok") {
                    swal({
                        title: "Registered Successfully!",
                        text: data.message,
                        type: "success"
                    }).then(function()  {
                        window.location.href = "login.php";
                    });
                }
                else if(data.status == "error") {
                    swal("Error", data.message, "error");
                }
            }).fail(function(xhr, status, error)    {
                swal("Unable to connect. Please try again.");
            });
            return false;
        }
    </script>

	
</head>


<body class="page body_style_wide body_filled article_style_stretch scheme_original top_panel_show top_panel_above sidebar_hide sidebar_outer_hide vc_responsive">
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
                    <h1 class="page_title">SignUp</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">SignUp</span>
                    </div>
                </div>
            </div>
        </div>

            <div class="wpb_column vc_column_container vc_col-sm-12 dark-background">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="sc_content content_wrap margin_top_huge margin_bottom_huge">
                            <div id="sc_form_070_wrap" class="sc_form_wrap">
                                <div id="sc_form_070" class="sc_form sc_form_style_form_2 margin_top_null margin_bottom_null">
									
                                    <form id="sign_up_form" method="post" onsubmit="return onSignUpFormSubmit();">
                                        <div class="sc_form_info">
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_2 sc_column_item sc_column_item_1">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <div class="sc_form_item sc_form_field label_over">
                                                                <label class="required" for="sc_form_username" >Username</label>
                                                                <input type="text" style="padding-left:0;" name="username" placeholder="Username" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_2 sc_column_item sc_column_item_1">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <div class="sc_form_item sc_form_field label_over">
                                                                <label class="required" for="query_from" required>Password</label>
                                                                <input type="password" required pattern="(?=.*\d)(?=.*[a-z]).{8,}" title="Password must contain atleast 8 characters using numbers" name="password1" placeholder="Password">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_2 sc_column_item sc_column_item_1">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <div class="sc_form_item sc_form_field label_over">
                                                                <label class="required" for="query_from"> Confirm Password</label>
                                                                <input  type="password" name="password2" placeholder="Confirm Password" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_2 sc_column_item sc_column_item_1">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <div class="sc_form_item sc_form_field label_over">
                                                                <label class="required" for="query_from">Email Id</label>
                                                                <input  type="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" name="email" placeholder="Email Id" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_2 sc_column_item sc_column_item_1">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <div class="sc_form_item sc_form_field label_over">
                                                                <label class="required" for="query_from">Address</label>
                                                                <input type="text" style="padding-left:0;" required name="address" placeholder="Address">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
											
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_2 sc_column_item sc_column_item_1">
                                                    <div class="wpb_text_column wpb_content_element ">
                                                        <div class="wpb_wrapper">
                                                            <div class="sc_form_item sc_form_field label_over">
                                                                <label class="required" for="query_from">Mobile</label>
                                                                <input type="tel"  name="mobile" minlength="10" maxlength="10" placeholder="Mobile No.">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sc_form_item sc_form_button">
                                            <button type="submit" name="submit" id="submit">Sign Up</button>
											&nbsp;&nbsp;
                                            <button onclick = "onLoginClicked()">Login</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="vc_empty_space space_10p" style="height: 8em">
                            <span class="vc_empty_space_inner"></span>
                        </div>
                    </div>
                </div>
            </div>
        
    

        <div class="vc_row-full-width dark-background" style="color: #30383B">abc</div>

            <?php include 'footer.php'?>
    </div>
</div>

<div id="popup_login" class="popup_wrap popup_login bg_tint_light">
    <a href="#" class="popup_close"></a>
    <div class="form_wrap">
        <div class="form_left">
            <form action="#" method="post" name="login_form" class="popup_form login_form">
                <input type="hidden" name="redirect_to" value="index-2.html">
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
<script type='text/javascript' src='js/vendor/esg/lightbox.js'></script>
<script type='text/javascript' src='js/vendor/esg/jquery.themepunch.tools.min.js'></script>
<script type='text/javascript' src='js/vendor/modernizr.min.js'></script>
<script type='text/javascript' src='js/vendor/jquery/core.min.js'></script>
<script type='text/javascript' src='js/vendor/superfish.js'></script>
<script type='text/javascript' src='js/custom/jquery.slidemenu.js'></script>
<script type='text/javascript' src='js/custom/core.utils.js'></script>
<script type='text/javascript' src='js/custom/core.init.js'></script>
<script type='text/javascript' src='js/custom/init.js'></script>
<script type='text/javascript' src='js/custom/social-share.js'></script>
<script type='text/javascript' src='js/custom/embed.min.js'></script>
<script type='text/javascript' src='js/custom/shortcodes.js'></script>
<script type='text/javascript' src='js/custom/core.messages.js'></script>
<script type='text/javascript' src='js/vendor/comp/comp_front.min.js'></script>
<script type='text/javascript' src='js/vendor/esg/jquery.themepunch.essential.min.js'></script>
</body>


<!-- Mirrored from dentario-html.themerex.net/grid.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Nov 2018 12:20:19 GMT -->
</html>