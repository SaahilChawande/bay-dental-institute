<?php
    ob_start();
    session_start();

    if(!isset($_SESSION['username']))    {
        header("Location: book-a-course.php");
    }

    include "conn.php";
    require_once "config.php";

    $query = "SELECT courses.course_id, courses.course_name, courses.course_duration, courses.course_cost, courses.tutor FROM courses INNER JOIN cart ON courses.course_id = cart.course_id WHERE cart.username = '" . $_SESSION['username'] . "';";

    $result = mysqli_query($conn, $query);

	$grand_total = 0;

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
    <title>Book a course - Bay Dental Institute</title>
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

	<script>

	function get_current_user() {
		return "<?= isset($_SESSION['username']) ? $_SESSION['username'] : ''; ?>";
	}

	function onDeleteClicked(id, cost)	{
		var result = id.split("_");
		var is_course_set = false;
		if (result[0] === "1")	{
			is_course_set = true;
		}
		var priceToDelete = parseInt(cost, 10, is_course_set);

		swal("Are you sure you want to remove this item from cart?", {
			buttons: {
				no: "No.",
				yes: "Yes, remove it."
			},
		}).then((value) => {
			switch(value)	{
				case "no":
					break;
				case "yes":
					removeFromCart(result, priceToDelete, is_course_set);
					location.reload();
					break;
				default:
					break;
			}
		});

	}

	function removeFromCart(result, priceToDelete, is_course_set)	{
		if(result[0] === "1")	{
			var username = get_current_user();
            var data_array = {"username": username, "course_id": result[1] };
            var data = JSON.parse(JSON.stringify(data_array));
            $.ajax({
                type: "POST",
                url: "remove-from-cart-handler.php",
                data: data,
                dataType: "json"
            }).done(function(data)  {
                if(data.status == "ok") {
					if (is_course_set) {
						var originalPrice = parseInt($("#total_cost_1").html().substring(2));
						var updatedPrice = originalPrice - priceToDelete;
						$("#total_cost_1").html("&#x20b9; " + updatedPrice);
					}	else {
						var originalPrice = parseInt($("#total_cost_2").html().substring(2));
						var updatedPrice = originalPrice - priceToDelete;
						$("#total_cost_2").html("&#x20b9; " + updatedPrice);
					}
					var originalPrice = parseInt($("#grand_total_cost").html().substring(2));
					var updatedPrice = originalPrice - priceToDelete;
					$("#grand_total_cost").html("&#x20b9; " + updatedPrice);
                    $("#" + result[0] + "_" + result[1]).hide();
                }
                else if(data.status == "error") {
                    swal("Error", data.message, "error");
                }
            }).fail(function(xhr, status, error)    {
                swal("Unable to connect. Please try again.");
            });
        } else if (result[0] === "2")	{
			var username = get_current_user();
			var data_array = {"username": username, "product_id": result[1] };
			var data = JSON.parse(JSON.stringify(data_array));
			$.ajax({
				type: "POST",
				url: "remove-product-from-store-cart-handler.php",
				data: data,
				dataType: "json"
			}).done(function(data)  {
				if(data.status == "ok") {
					if (is_course_set) {
						var originalPrice = parseInt($("#total_cost_1").html().substring(2));
						var updatedPrice = originalPrice - priceToDelete;
						$("#total_cost_1").html("&#x20b9; " + updatedPrice);
					}	else {
						var originalPrice = parseInt($("#total_cost_2").html().substring(2));
						var updatedPrice = originalPrice - priceToDelete;
						$("#total_cost_2").html("&#x20b9; " + updatedPrice);
					}
					var originalPrice = parseInt($("#grand_total_cost").html().substring(2));
					var updatedPrice = originalPrice - priceToDelete;
					$("#grand_total_cost").html("&#x20b9; " + updatedPrice);
                    $("#" + result[0] + "_" + result[1]).hide();
					$("#" + result[0] + "_" + result[1]).hide();
				}
				else if(data.status == "error") {
					swal("Error", data.message, "error");
				}
			}).fail(function(xhr, status, error)    {
				swal("Unable to connect. Please try again.");
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
                    <h1 class="page_title">Checkout</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="book-a-course.php">Book A Course</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Checkout</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="page_content_wrap page_paddings_yes dark-background">
            <div class="content_wrap">
                <div class="content">
                    <article class="post_item post_item_single page hentry">
                        <section class="post_content">
                        <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner scroll-bar">
                                        <div class="wpb_wrapper">
                                            <h4 class="sc_title sc_title_regular margin_top_null margin_bottom_small aligncenter">Your Courses</h4>
                                            <div class="sc_table">
                                            <?php
                                                if(mysqli_num_rows($result) > 0)    {
                                                    echo '<table>
                                                            <tbody>
                                                                <tr>
                                                                    <th>Name</th>
                                                                    <th>Duration</th>
                                                                    <th>Cost</th>
                                                                    <th>Tutor</th>
																	<th>Action</th>
                                                                </tr>';
                                                    $i = 1;
                                                    $total_cost = 0;
                                                    while($row = mysqli_fetch_assoc($result))   {
                                                        echo '<tr id="1_' . $row['course_id'] . '" align="center">
                                                                <td>' . $row['course_name'] . '</td>
                                                                <td>' . $row['course_duration'] . '</td>
                                                                <td> &#x20b9; ' . $row['course_cost'] . '</td>
                                                                <td>' . $row['tutor'] . '</td>
																<td onclick="onDeleteClicked(\'1_' . $row['course_id'] . '\', ' . $row['course_cost'] . ')"><img height="35px" width="35px" src="images/delete.svg"/></td>
                                                            </tr>';
                                                        $total_cost += (int)$row['course_cost'];
                                                    }
													$grand_total += $total_cost;
                                                    echo '<tr align="center">
                                                            <td colspan="2">Total Cost</td>
                                                            <td colspan="3" id="total_cost_1">&#x20b9; ' . $total_cost . '</td>
                                                        </tr>
                                                        </tbody></table>';
                                                }
                                                else    {
                                                    echo '<h3 class="aligncenter">No items found in the cart.</h3>';
                                                }
                                                    ?>
                                                    <p>
                                                </div>
                                                <div class="vc_empty_space space_76p">
                                                    <span class="vc_empty_space_inner"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
								<?php
									$query = "SELECT store_products.id , store_products.product_name, store_products.product_price FROM store_products INNER JOIN store_cart ON store_products.id = store_cart.product_id WHERE store_cart.username = '" . $_SESSION['username'] . "';";
									$result = mysqli_query($conn, $query);
								?>
                                <div class="vc_row wpb_row vc_row-fluid">
                              		<div class="wpb_column vc_column_container vc_col-sm-12">
                              			<div class="vc_column-inner scroll-bar">
                              				<div class="wpb_wrapper">
                              					<h4 class="sc_title sc_title_regular margin_top_null margin_bottom_small aligncenter">Your Products</h4>
												<div class="sc_table">
													<?php
		                                                if(mysqli_num_rows($result) > 0)    {
		                                                    echo '<table>
		                                                            <tbody>
		                                                                <tr>
		                                                                    <th>Name</th>
		                                                                    <th>Cost</th>
																			<th>Action</th>
		                                                                </tr>';
		                                                    $i = 1;
		                                                    $total_cost = 0;
		                                                    while($row = mysqli_fetch_assoc($result))   {
		                                                        echo '<tr id="2_' . $row['id'] . '" align="center">
		                                                                <td>' . $row['product_name'] . '</td>
		                                                                <td> &#x20b9; ' . $row['product_price'] . '</td>
																		<td onclick="onDeleteClicked(\'2_' . $row['id'] . '\', ' . $row['product_price'] . ')"><img height="35px" width="35px" src="images/delete.svg"/></td>
		                                                            </tr>';
		                                                        $total_cost += (int)$row['product_price'];
		                                                    }
															$grand_total += $total_cost;
		                                                    echo '<tr align="center">
		                                                            <td colspan="2">Total Cost</td>
		                                                            <td colspan="2" id="total_cost_2">&#x20b9; ' . $total_cost . '</td>
		                                                        </tr>
		                                                        </tbody></table>';
		                                                }
		                                                else    {
		                                                    echo '<h3 class="aligncenter">No items found in the cart.</h3>';
		                                                }
		                                                    ?>
												</div>
                              				</div>
                              			</div>
                              		</div>
                                </div>
								<h3 class="aligncenter">Grand Total : <span style="color: white" id="grand_total_cost">&#x20b9; <?= $grand_total ?></span></h3>
                            <div class="aligncenter">
                                <form action="charge.php" method="POST">
                                    <!-- Note that the amount is in paise = 50 INR -->
                                    <script
                                            src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="<?php echo $razor_pay_api_key; ?>"
                                            data-amount= "<?php echo $grand_total * 100; ?>"
                                            data-buttontext="Pay with Razorpay"
                                            data-name="<?php echo $_SESSION['username']; ?>"
                                            data-description="Test Transaction with Razor Pay"
                                            data-image="https://baydentalinstitute.org/images/logo-fixed.png"
                                            data-prefill.name=""
                                            data-prefill.contact="<?php echo $_SESSION['mobile_number']; ?>"
                                            data-prefill.email="<?php echo $_SESSION['email']; ?>"
                                            data-theme.color="#30383B"
                                            data-modal.backdropclose="true"
                                    ></script>
                                    <input type="hidden" value="Hidden Element" name="hidden">
                                </form>
                            </div>
                        </section>
                        <section class="related_wrap related_wrap_empty"></section>
                    </article>
                </div>
            </div>
            <div class="vc_empty_space space_10p" style="height: 10em">
                <span class="vc_empty_space_inner"></span>
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


<!-- Mirrored from dentario-html.themerex.net/shortcodes.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 Nov 2018 12:17:29 GMT -->
</html>

<?php
    ob_end_flush();
?>
