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
    <title>Gallery - Bay Dental Institute</title>
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
	<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
	<link href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
	<link rel='stylesheet' href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
	<style>
	
		.img-featured-container {
		  overflow: hidden;
		  position: relative;
		  
		}

		.img-featured-container img {
		  width: 100%;
		 padding: 10px; 
		}

		.img-featured-container .img-backdrop {
		  background: linear-gradient(135deg, rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5));
		  margin: 0;
		  padding: 0;
		  width: 100%;
		  height: 100%;
		  position: absolute;
		  z-index: 1;
		  opacity: 0;
		  transition: all 0.3s ease;
		}

		.img-featured-container:hover > .img-backdrop {
		  opacity: 1;
		}
		.img-featured-container .description-container {
		  color: #fff;
		  font-size: 16px;
		  line-height: 1.2;
		  padding: 0 30px;
		  text-align: center;
		  line-height: 20px;
		  width: 100%;
		  position: absolute;
		  top: 50%;
		  left: 50%;
		  transform: translate(-50%, -50%);
		  transform-style: preserve-3d;
		  z-index: 2;
		  opacity: 0;
		  transition: all .2s ease;
		}

		.img-featured-container .description-container .fa-instagram {
		  font-size: 40px;
		}

		.img-featured-container .description-container p {
		  font-weight: 300;
		  margin-bottom: 0;
		}

		.img-featured-container:hover .description-container {
		  opacity: 1;
		}

		.img-featured-container .description-container .caption {
		  display: none;
		  margin-bottom: 10px;
		}

		.img-featured-container .description-container .likes,
		.img-featured-container .description-container .comments {
		  margin: 0 5px;
		}
		@media screen and (min-width:768px) {
		  .img-featured-container .description-container .caption {
			display: block;
		  }
		}
	</style>
	
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
                    <h1 class="page_title">Gallery</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Gallery</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="vc_row wpb_row vc_row-fluid dark-background" style="padding-top: 20px">
            <div class="wpb_column vc_column_container vc_col-sm-12">
                <div class="vc_column-inner ">
                    <div class="wpb_wrapper">
                        <div class="column-1_1 sc_column_item aligncenter">
                            <a href="https://www.instagram.com/explore/locations/418996165156853/bay-dental-associates" target="_blank" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="padding: 1em 1.25em">Visit Our Instagram Page</a>
                            <a href="https://www.facebook.com/baydentalmumbai/" target="_blank" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="padding: 1em 1.25em">Visit Our Facebook Page</a>                                                    
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="page_content_wrap page_paddings_yes dark-background" style="padding-bottom: 0px; padding-top: 0px">
            <div class="content_wrap">
                <div class="content">
                    <article class="post_item post_item_single page hentry">
                        <section class="post_content">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <article class="myportfolio-container minimal-light" id="esg-grid-1-1-wrap">
                                                <div id="esg-grid-1-1" class="esg-grid">
                                                    <ul>
                                                        <li id="eg-1-post-id-857" class="filterall filter-gallery eg-dentrario-wrapper eg-post-id-857" data-date="1452598735">
                                                            <div class="esg-media-cover-wrapper">
                                                                <div class="esg-entry-media">
                                                                    <img src="images/gallery/gallery-1.jpg" alt="" width="910" height="676">
                                                                </div>
                                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                    <div class="esg-overlay esg-fade eg-dentrario-container" data-delay="0"></div>
                                                                    <div class="esg-center eg-post-857 eg-dentrario-element-0-a esg-falldown" data-delay="0.1">
                                                                        <a class="eg-dentrario-element-0 eg-post-857 esgbox" href="images/gallery/gallery-1.jpg">
                                                                            <i class="eg-icon-search gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-post-857 eg-dentrario-element-1-a esg-falldown" data-delay="0.2">
                                                                        <a class="eg-dentrario-element-1 eg-post-857" href="javascript:void()" target="_self">
                                                                            <i class="eg-icon-link gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-dentrario-element-8 esg-none esg-clear"></div>
                                                                    <div class="esg-center eg-dentrario-element-9 esg-none esg-clear"></div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                        <li id="eg-1-post-id-858" class="filterall filter-gallery eg-dentrario-wrapper eg-post-id-858" data-date="1452598741">
                                                            <div class="esg-media-cover-wrapper">
                                                                <div class="esg-entry-media">
                                                                    <img src="images/gallery/gallery-2.jpg" alt="" width="2340" height="1560">
                                                                </div>
                                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                    <div class="esg-overlay esg-fade eg-dentrario-container" data-delay="0"></div>
                                                                    <div class="esg-center eg-post-858 eg-dentrario-element-0-a esg-falldown" data-delay="0.1">
                                                                        <a class="eg-dentrario-element-0 eg-post-858 esgbox" href="images/gallery/gallery-2.jpg">
                                                                            <i class="eg-icon-search gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-post-858 eg-dentrario-element-1-a esg-falldown" data-delay="0.2">
                                                                        <a class="eg-dentrario-element-1 eg-post-858" href="javascript:void()" target="_self">
                                                                            <i class="eg-icon-link gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-dentrario-element-8 esg-none esg-clear"></div>
                                                                    <div class="esg-center eg-dentrario-element-9 esg-none esg-clear"></div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                        <li id="eg-1-post-id-859" class="filterall filter-gallery eg-dentrario-wrapper eg-post-id-859" data-date="1452598747">
                                                            <div class="esg-media-cover-wrapper">
                                                                <div class="esg-entry-media">
                                                                    <img src="images/gallery/gallery-3.jpg" alt="" width="2200" height="1304">
                                                                </div>
                                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                    <div class="esg-overlay esg-fade eg-dentrario-container" data-delay="0"></div>
                                                                    <div class="esg-center eg-post-859 eg-dentrario-element-0-a esg-falldown" data-delay="0.1">
                                                                        <a class="eg-dentrario-element-0 eg-post-859 esgbox" href="images/gallery/gallery-3.jpg">
                                                                            <i class="eg-icon-search gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-post-859 eg-dentrario-element-1-a esg-falldown" data-delay="0.2">
                                                                        <a class="eg-dentrario-element-1 eg-post-859" href="javascript:void()" target="_self">
                                                                            <i class="eg-icon-link gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-dentrario-element-8 esg-none esg-clear"></div>
                                                                    <div class="esg-center eg-dentrario-element-9 esg-none esg-clear"></div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                        <li id="eg-1-post-id-860" class="filterall filter-gallery eg-dentrario-wrapper eg-post-id-860" data-date="1452598753">
                                                            <div class="esg-media-cover-wrapper">
                                                                <div class="esg-entry-media">
                                                                    <img src="images/gallery/gallery-4.jpg" alt="" width="1470" height="1012">
                                                                </div>
                                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                    <div class="esg-overlay esg-fade eg-dentrario-container" data-delay="0"></div>
                                                                    <div class="esg-center eg-post-860 eg-dentrario-element-0-a esg-falldown" data-delay="0.1">
                                                                        <a class="eg-dentrario-element-0 eg-post-860 esgbox" href="images/gallery/gallery-4.jpg">
                                                                            <i class="eg-icon-search gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-post-860 eg-dentrario-element-1-a esg-falldown" data-delay="0.2">
                                                                        <a class="eg-dentrario-element-1 eg-post-860" href="javascript:void()" target="_self">
                                                                            <i class="eg-icon-link gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-dentrario-element-8 esg-none esg-clear"></div>
                                                                    <div class="esg-center eg-dentrario-element-9 esg-none esg-clear"></div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                        <li id="eg-1-post-id-861" class="filterall filter-gallery eg-dentrario-wrapper eg-post-id-861" data-date="1452598765">
                                                            <div class="esg-media-cover-wrapper">
                                                                <div class="esg-entry-media">
                                                                    <img src="images/gallery/gallery-5.jpg" alt="" width="1600" height="1216">
                                                                </div>
                                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                    <div class="esg-overlay esg-fade eg-dentrario-container" data-delay="0"></div>
                                                                    <div class="esg-center eg-post-861 eg-dentrario-element-0-a esg-falldown" data-delay="0.1">
                                                                        <a class="eg-dentrario-element-0 eg-post-861 esgbox" href="images/gallery/gallery-5.jpg">
                                                                            <i class="eg-icon-search gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-post-861 eg-dentrario-element-1-a esg-falldown" data-delay="0.2">
                                                                        <a class="eg-dentrario-element-1 eg-post-861" href="javascript:void()" target="_self">
                                                                            <i class="eg-icon-link gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-dentrario-element-8 esg-none esg-clear"></div>
                                                                    <div class="esg-center eg-dentrario-element-9 esg-none esg-clear"></div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                        <li id="eg-1-post-id-862" class="filterall filter-gallery eg-dentrario-wrapper eg-post-id-862" data-date="1452598772">
                                                            <div class="esg-media-cover-wrapper">
                                                                <div class="esg-entry-media">
                                                                    <img src="images/gallery/gallery-6.jpg" alt="" width="998" height="941">
                                                                </div>
                                                                <div class="esg-entry-cover esg-fade" data-delay="0">
                                                                    <div class="esg-overlay esg-fade eg-dentrario-container" data-delay="0"></div>
                                                                    <div class="esg-center eg-post-862 eg-dentrario-element-0-a esg-falldown" data-delay="0.1">
                                                                        <a class="eg-dentrario-element-0 eg-post-862 esgbox" href="images/gallery/gallery-6.jpg">
                                                                            <i class="eg-icon-search gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-post-862 eg-dentrario-element-1-a esg-falldown" data-delay="0.2">
                                                                        <a class="eg-dentrario-element-1 eg-post-862" href="javascript:void()" target="_self">
                                                                            <i class="eg-icon-link gold-text"></i>
                                                                        </a>
                                                                    </div>
                                                                    <div class="esg-center eg-dentrario-element-8 esg-none esg-clear"></div>
                                                                    <div class="esg-center eg-dentrario-element-9 esg-none esg-clear"></div>
                                                                </div>
                                                            </div>

                                                        </li>
                                                    </ul>
                                                </div>
                                            </article>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
						<section class="post_content">
                            <div class="vc_row wpb_row vc_row-fluid">
                                <div class="wpb_column vc_column_container vc_col-sm-12">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
											<div id="instafeed-gallery-feed" class="gallery row no-gutter">
												<div class="col-xs-12 col-sm-4">
													<a href="https://www.instagram.com/baydentalmumbai/"><img src="images/logo-fixed.png" style="margin:0;padding-left:50px;" class="img-responsive"></a>
													<a href="{{image}}" data-caption="{{model.user.username}}, {{likes}} likes">
														<div class="img-featured-container">
															<div class="img-backdrop"></div>
															<div class="description-container">
																
															</div>
														</div>
													</a>
												</div> 

											</div>

										<button id="btn-instafeed-load" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large aligncenter">Load more</button>

										</div>
									</div>
								</div>
							</div>
                        </section>
                    </article>
                    <section class="related_wrap related_wrap_empty"></section>
                </div>
            </div>
        </div>

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
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/instafeed.js/1.4.1/instafeed.min.js"></script>

<script type="text/javascript" src="js/custom/instafeed.min.js"></script>
<script type="text/javascript" src="js/custom/insta.js"></script>
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