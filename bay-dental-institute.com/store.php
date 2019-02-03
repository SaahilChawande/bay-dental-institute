<!DOCTYPE html>
<html lang="en-US" class="scheme_original">
<?php
    $is_subfolder = false;
    ob_start();
    session_start();
?>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="icon" type="image/x-icon" href="images/favicon.png" />
    <title>Store - Bay Dental Institute</title>
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
    <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>

    <!-- jquery -->
    <script src="https://code.jquery.com/jquery-2.1.3.min.js"></script>

    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script type="text/javascript">

       $(document).ready(function()    {
           var session_isset = check_session();

           if(session_isset === '1')   {
               var username = get_current_user();
               var data_array = {"username": username};
               var data = JSON.parse(JSON.stringify(data_array));
               $.ajax({
                   type: "POST",
                   url: "get-store-cart.php",
                   data: data,
                   dataType: "json"
               }).done(function(data)  {
                   if(data.status == "ok") {
                       for(var i = 0; i < data.message.length; i++)    {
                           $('#' + data.message[i].product_id + '_1').hide();
                           $('#' + data.message[i].product_id + '_2').show();
                       }
                   }
                   else if(data.status == "error" && data.message != "No items found in cart") {
                       swal("Error", data.message, "error");
                   }
               }).fail(function(xhr, status, error)    {
                   swal("Unable to connect. Please try again.");
               });
           }
       });

      function check_session()    {
          return '<?php
              if(isset($_SESSION['username']))
                  echo '1';
              else
                  echo '0';
          ?>';
      }

      function get_current_user() {
          return "<?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
      }

      function onAddCartClicked(id)   {
          var session_isset = check_session();

          if(session_isset === '1')   {
              var username = get_current_user();
              var data_array = {"username": username, "product_id": id.toString() };
              var data = JSON.parse(JSON.stringify(data_array));
              $.ajax({
                  type: "POST",
                  url: "add-product-to-store-cart-handler.php",
                  data: data,
                  dataType: "json"
              }).done(function(data)  {
                  if(data.status == "ok") {
                      $('#' + id + '_1').hide();
                      $('#' + id + '_2').show();
                  }
                  else if(data.status == "error") {
                      swal("Error", data.message, "error");
                  }
              }).fail(function(xhr, status, error)    {
                  swal("Unable to connect. Please try again.");
              });
          }
          else    {
              swal({
                  title: "Please login / signup to continue",
                  type: "error"
              }).then(function()  {
                  window.location.href = "login.php";
              });
          }
      }

      function onRemoveCartClicked(id)    {
          var session_isset = check_session();

          if(session_isset === '1')   {
              var username = get_current_user();
              var data_array = {"username": username, "product_id": id.toString() };
              var data = JSON.parse(JSON.stringify(data_array));
              $.ajax({
                  type: "POST",
                  url: "remove-product-from-store-cart-handler.php",
                  data: data,
                  dataType: "json"
              }).done(function(data)  {
                  if(data.status == "ok") {
                      $('#' + id + '_2').hide();
                      $('#' + id + '_1').show();
                  }
                  else if(data.status == "error") {
                      swal("Error", data.message, "error");
                  }
              }).fail(function(xhr, status, error)    {
                  swal("Unable to connect. Please try again.");
              });
          }
          else    {
              swal({
                  title: "Please login / signup to continue",
                  type: "error"
              }).then(function()  {
                  window.location.href = "login.php";
              });
          }
      }

      function onBookNowClick()   {
          var session_isset = check_session();
          var username = get_current_user();
          var data_array = {"username": username };
          var data = JSON.parse(JSON.stringify(data_array));

          if(session_isset === '1')   {
              window.location.href = "checkout.php";
          }   else    {
              swal("Please login / signup to continue", {
                  buttons: {
                      cancel: "Cancel",
                      login: "Login",
                      signup: "Signup"
                  },
              }).then((value) => {
                  switch (value)  {
                      case "cancel":
                          break;
                      case "login":
                          window.location.href = "login.php";
                          break;
                      case "signup":
                          window.location.href = "signup.php";
                          break;
                      default:
                          break;
                  }
              });
          }
      }
    </script>

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
                    <h1 class="page_title">Store</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Store</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="page_content_wrap page_paddings_yes dark-background">
            <div class="content_wrap">
                <div class="content">
                    <article class="post_item post_item_single page hentry">
                        <section class="post_content">
                            <div data-vc-full-width="true" data-vc-full-width-init="false" class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12" style="border: 1px solid #F9A825">
                                    <div class="vc_column-inner" style="padding-left: 40px; padding-right: 40px">
                                        <div class="wpb_wrapper">
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 margin_bottom_huge">
                                                <div class="column-1_1 sc_column_item">
                                                    <a href="javascript:void(0)" onclick="onBookNowClick();" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large alignright" style="padding: 1em 1.25em">Book Now</a>

                                                    <?php
                                                        if(isset($_SESSION['username']))    {
                                                            echo '<a href="logout.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large alignright" style="padding: 1em 1.25em">Logout</a>';
                                                        }
                                                        else    {
                                                            echo '<a href="login.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large alignright" style="padding: 1em 1.25em">Login</a>';
                                                        }
                                                    ?>

                                                </div>
                      												              <div class="aligncenter">
        												                              <h3>Materials We Provide</h3>
                     												              </div>
                      												             <br/>
                      												             <br/>
                                               <div class="row">
                                                    <div class="column-1_3 sc_column_item">
                                                        <div class="aligncenter course-border">
                                                            <h5 style="display: inline">Name : </h5>
                                                            <p style="display: inline; ">Bur Number 330</p>
                                                            <br><br>
                                                            <h5 style="display: inline">Cost : </h5>
                                                            <p style="display: inline"> &#x20b9; 175/-</p>
                                                            <div class="row aligncenter">
                                                                <div class="column-1_2">
                                                                    <a id="1_1" onclick="onAddCartClicked('1');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 23px">Add to Cart</a>
                                                                    <a id="1_2" onclick="onRemoveCartClicked('1');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="display: none; color: white; margin-top: 23px">Remove from Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column-1_3 sc_column_item">
                                                        <div class="aligncenter course-border">
                                                            <h5 style="display: inline">Name : </h5>
                                                            <p style="display: inline; ">Bur Number 170</p>
                                                            <br><br>
                                                            <h5 style="display: inline">Cost : </h5>
                                                            <p style="display: inline"> &#x20b9; 175/-</p>
                                                            <div class="row aligncenter">
                                                                <div class="column-1_2">
                                                                    <a id="2_1" onclick="onAddCartClicked('2');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 23px">Add to Cart</a>
                                                                    <a id="2_2" onclick="onRemoveCartClicked('2');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="display: none; color: white; margin-top: 23px">Remove from Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column-1_3 sc_column_item">
                                                        <div class="aligncenter course-border">
                                                            <h5 style="display: inline">Name : </h5>
                                                            <p style="display: inline; ">Dental Mannequin</p>
                                                            <br><br>
                                                            <h5 style="display: inline">Cost : </h5>
                                                            <p style="display: inline"> &#x20b9; 25,000/-</p>
                                                            <div class="row aligncenter">
                                                                <div class="column-1_2">
                                                                    <a id="3_1" onclick="onAddCartClicked('3');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 23px">Add to Cart</a>
                                                                    <a id="3_2" onclick="onRemoveCartClicked('3');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="display: none; color: white; margin-top: 23px">Remove from Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
						                                    <div class="row">
                                                    <div class="column-1_2 sc_column_item">
                                                    <div class="aligncenter course-border">
                                                            <h5 style="display: inline">Name : </h5>
                                                            <p style="display: inline; ">Notes for ORE - Part 1</p>
                                                            <br><br>
                                                            <h5 style="display: inline">Cost : </h5>
                                                            <p style="display: inline"> &#x20b9; 15,000/-</p>
                                                            <div class="row aligncenter">
                                                                <div class="column-1_2">
                                                                    <a id="4_1" onclick="onAddCartClicked('4');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 23px">Add to Cart</a>
                                                                    <a id="4_2" onclick="onRemoveCartClicked('4');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="display: none; color: white; margin-top: 23px">Remove from Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="column-1_2 sc_column_item">
                                                    <div class="aligncenter course-border">
                                                            <h5 style="display: inline">Name : </h5>
                                                            <p style="display: inline; ">Notes for ORE - Part 2</p>
                                                            <br><br>
                                                            <h5 style="display: inline">Cost : </h5>
                                                            <p style="display: inline"> &#x20b9; 20,000/-</p>
                                                            <div class="row aligncenter">
                                                                <div class="column-1_2">
                                                                    <a id="5_1" onclick="onAddCartClicked('5');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 23px">Add to Cart</a>
                                                                    <a id="5_2" onclick="onRemoveCartClicked('5');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="display: none; color: white; margin-top: 23px">Remove from Cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="vc_row-full-width"></div>

                        </section>
                        <section class="related_wrap related_wrap_empty"></section>
                    </article>
                </div>
            </div>
        </div>
        <div class="copyright_wrap copyright_style_socials scheme_light">
            <div class="copyright_wrap_inner">
                <div class="content_wrap_outer">
                    <div class="content_wrap">
                        <div class="copyright_text">Incepiom © 2018 All Rights Reserved.</div>
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
<script type='text/javascript' src='http://maps.google.com/maps/api/js?key='></script>
<script type='text/javascript' src='js/vendor/core.googlemap.js'></script>
<script type='text/javascript' src='js/vendor/chart.min.js'></script>
</body>


<!-- Mirrored from dentario-html.themerex.net/shortcodes.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Nov 2018 12:17:29 GMT -->
</html>

<?php
    ob_end_flush();
?>