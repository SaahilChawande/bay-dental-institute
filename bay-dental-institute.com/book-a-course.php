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

        $(document).ready(function(){
            $("#flip1").click(function(){
                $("#panel1").slideToggle();
            });

            $("#flip2").click(function(){
                $("#panel2").slideToggle();
            });

            $("#flip3").click(function(){
                $("#panel3").slideToggle();
            });

            $("#flip4").click(function(){
                $("#panel4").slideToggle();
            });

            $("#flip5").click(function(){
                $("#panel5").slideToggle();
            });

            $("#flip6").click(function(){
                $("#panel6").slideToggle();
            });

            $("#flip7").click(function(){
                $("#panel7").slideToggle();
            });

            $("#flip8").click(function(){
                $("#panel8").slideToggle();
            });

            $("#flip9").click(function(){
                $("#panel9").slideToggle();
            });

            $("#flip10").click(function(){
                $("#panel10").slideToggle();
            });

            $("#flip11").click(function(){
                $("#panel11").slideToggle();
            });
            $("#flip12").click(function(){
                $("#panel12").slideToggle();
            });
            $("#flip13").click(function(){
                $("#panel13").slideToggle();
            });

            $("#flip14").click(function(){
                $("#panel14").slideToggle();
            });

            $("#flip15").click(function()	{
                $("#panel15").slideToggle();
            });

            $("#flip16").click(function()	{
                $("#panel16").slideToggle();
            });

            $("#flip17").click(function()	{
                $("#panel17").slideToggle();
            });

            $("#flip18").click(function()	{
                $("#panel18").slideToggle();
            });

            $("#flip19").click(function()	{
                $("#panel19").slideToggle();
            });

            $("#flip20").click(function()	{
                $("#panel20").slideToggle();
            });

            $("#flip21").click(function()	{
                $("#panel21").slideToggle();
            });

            $("#ore-lds-toggle-view").click(function()	{
                $("#ore-lds-wrapper").slideToggle();
            });

            $("#nbde-toggle-view").click(function()	{
                $("#ndbe-wrapper").slideToggle();
            });

            $("#toggle-composites-view").click(function()	{
                $("#composites-wrapper").slideToggle();
            });

            $("#toggle-veneers-view").click(function()	{
                $("#veneers-wrapper").slideToggle();
            });

            $("#toggle-photography-view").click(function()	{
                $("#photography-wrapper").slideToggle();
            });

            $("#toggle-mr-dental-view").click(function()	{
                $("#mr-dental-wrapper").slideToggle();
            });
        });
        function viewPolicy()   {
            swal("1. Courses once booked cannot be changed, transferred , refunded.\n\n" +
                "2. Any Courses changed , modified by Bay Dental Institute will be informed to the candidate and option of full refund or transfer to another course will be given. \n\n" +
                "3. Bay Dental Institute has the right to cancel, reschedule any course due to unforseen circumstances, In that case entire course amount will be refunded 100%. \n\n" +
                "4. Bay Dental Institute is not liable to pay any charges towards travel, accomodation in case of any course date changes, speaker unavailability, unavoidable circumstances. \n\n" +
                "5. Goods once sold through the online store can not be returned. Incase of any defect, can be returned and replaced once goods received. \n\n" +
                "6. All disputes to be settled under Mumbai Jurisdiction. \n\n");
        }

        $(document).ready(function()    {
            var session_isset = check_session();

            if(session_isset === '1')   {
                // Get all the courses from cart
                var username = get_current_user();
                var data_array = {"username": username};
                var data = JSON.parse(JSON.stringify(data_array));
                $.ajax({
                    type: "POST",
                    url: "get-cart.php",
                    data: data,
                    dataType: "json"
                }).done(function(data)  {
                    if(data.status == "ok") {
                        for(var i = 0; i < data.message.length; i++)    {
                            $('#' + data.message[i].course_id + '_1').hide();
                            $('#' + data.message[i].course_id + '_2').show();
                        }
                    }
                    else if(data.status == "error" && data.message != "No items found in cart") {
                        swal("Error", data.message, "error");
                    }
                }).fail(function(xhr, status, error)    {
                    swal("Unable to connect. Please try again.");
                });

                //Check courses with full batch size
                $.ajax({
                    type: "POST",
                    url: "get-all-courses.php",
                    data: data,
                    dataType: "json"
                }).done(function(data)  {
                    if(data.status == "ok") {
                        for(var i = 0; i < data.message.length; i++)    {
                            if (data.message[i].enrolled === data.message[i].maximum)   {
                                $('#' + data.message[i].course_id + '_1').hide();
                                $('#' + data.message[i].course_id + '_2').hide();
                                $('#' + data.message[i].course_id + '_3').show();
                            }
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
                var data_array = {"username": username, "course_id": id.toString() };
                var data = JSON.parse(JSON.stringify(data_array));
                $.ajax({
                    type: "POST",
                    url: "add-to-cart-handler.php",
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
                var data_array = {"username": username, "course_id": id.toString() };
                var data = JSON.parse(JSON.stringify(data_array));
                $.ajax({
                    type: "POST",
                    url: "remove-from-cart-handler.php",
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

        function onMaximumCapacityClicked() {
            swal("Cannot Enroll", "This course capacity is to its limit", "info");
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
                    <h1 class="page_title">Book A Course</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Book A Course</span>
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
                                            <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                <div class="column-1_1 sc_column_item">
                                                    <a href="javascript:void(0)" onclick="onBookNowClick();" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large alignright" style="padding: 1em 1.25em">Check Out</a>

                                                    <?php
                                                    if(isset($_SESSION['username']))    {
                                                        echo '<a href="checkout.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large alignright" style="padding: 1em 1.25em"><img width="20px" src="images/social-media/shopping-cart.svg"></a>';
                                                        echo '<a href="logout.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large alignright" style="padding: 1em 1.25em">Logout</a>';
                                                    }
                                                    else    {
                                                        echo '<a href="login.php" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large alignright" style="padding: 1em 1.25em">Login</a>';
                                                    }
                                                    ?>

                                                </div>
                                                <div class="aligncenter" id="ore-lds-toggle-view" style="cursor: pointer;">
                                                    <h3>
                                                        <span style="float: left">&#8659;</span>
                                                        ORE/LDS-UK
                                                        <span style="float: right">&#8659;</span>
                                                    </h3>
                                                </div>
                                                <br/>
                                                <br/>
                                                <div id="ore-lds-wrapper" style="display:none;" class="margin_bottom_huge">
                                                    <div class="row">
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline; ">ORE / LDS Orientation and Introduction</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline;">1 day/3 hour program</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 1,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline; ">Dr. Shravan Chawla</p>
                                                                <h5 class="more-details"><a id="flip1">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel1" class="hide_display">
                                                                    Over view of the exam <br/>
                                                                    How to book and cost of the exam <br/>
                                                                    How to prepare <br/>
                                                                    Subjects you are tested on <br/>
                                                                    What happens once you pass the ORE<br/>
                                                                    Registration with the GDC UK <br/>
                                                                    Job / Visa Status in the UK <br/>
                                                                    What you need to crack the ORE <br/>
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="1_1" onclick="onAddCartClicked('1');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 23px">Add to Cart</a>
                                                                        <a id="1_2" onclick="onRemoveCartClicked('1');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="display: none; color: white; margin-top: 23px">Remove from Cart</a>
                                                                        <a id="1_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white; margin-top: 23px">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline;">Part I - Theory Exam Coaching</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline;">2 days coaching/ 9am to 6pm</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline;"> &#x20b9; 30,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline;">Dr. Shravan Chawla</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip2">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel2" class="hide_display">
                                                                    We will cover all the Topics you need to cover to prepare for part I <br/>
                                                                    Basic Sciences <br/>
                                                                    Clinical Sciences<br/>
                                                                    MCQ’s <br/>
                                                                    EMQ’s <br/>
                                                                    Question bank <br/>
                                                                    And images <br/>
                                                                    Candidates are required to get pink + blue book for this session <br/>
                                                                    Notes and Question bank  to prepare hard copy will be provided
                                                                </div>
                                                                <br>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="2_1" onclick="onAddCartClicked('2');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="2_2" onclick="onRemoveCartClicked('2');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="2_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Part II - Comprehensive Coaching</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">5 days / 9 am to 6 pm </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 50,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Shravan Chawla</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip3">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel3" class="hide_display">
                                                                    All Part II Modules Covered in Depth <br/>
                                                                    All Actor, Written, skilled OSCE’s with practice <br/>
                                                                    All Manikin Exercises Shown personally with practice on Frasaco Manikins  <br/>
                                                                    ME all scenarios covered with Viva and CPR manikin Training and Practice on PractiMan
                                                                    <br> ( UK ) CPR manikin   <br/>
                                                                    DTP covered in Depth with history taking, <br> form filling and presentation.  <br/>
                                                                    In Depth training on how to score maximum with the examiner and what they are looking
                                                                    <br> for while marking you in each module.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="3_1" onclick="onAddCartClicked('3');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 23px">Add to Cart</a>
                                                                        <a id="3_2" onclick="onRemoveCartClicked('3');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; margin-top: 23px; display: none">Remove from Cart</a>
                                                                        <a id="3_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white; margin-top: 23px">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <div class="row">
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Part II - 2 Day Revision Course</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">2 days / 9 am to 6 pm </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 25,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Shravan Chawla</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip4">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel4" class="hide_display">
                                                                    Brief Over View of all Modules OSCE , DTP, MANIKIN, ME <br/>
                                                                    Ideal Delivery for all modules <br/>
                                                                    How to score “ Exceeds Standard “ in each exercise / Module <br/>
                                                                    What the examiner is expecting while scoring
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="4_1" onclick="onAddCartClicked('4');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 20px">Add to Cart</a>
                                                                        <a id="4_2" onclick="onRemoveCartClicked('4');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; margin-top: 20px; display: none">Remove from Cart</a>
                                                                        <a id="4_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white; margin-top: 20px">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">1 Day OSCE Mock Exam</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">3 hours mock exam </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 6,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Shravan Chawla</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip5">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel5" class="hide_display">
                                                                    2 hour exam<br/>
                                                                    18 stations with 2 rest stations with timer <br/>
                                                                    5 minutes per station with buzzer <br/>
                                                                    Actor, written and skilled OSCE’s <br/>
                                                                    Conducted as exam
                                                                    Feedback after exam on where to improve
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="5_1" onclick="onAddCartClicked('5');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 20px">Add to Cart</a>
                                                                        <a id="5_2" onclick="onRemoveCartClicked('5');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; margin-top: 20px; display: none">Remove from Cart</a>
                                                                        <a id="5_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white; margin-top: 20px">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">1 Day Manikin Mock Exam</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">3 hour mock exam</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 5,500/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Shravan Chawla</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip6">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel6" class="hide_display">
                                                                    3 hour exam scenario like mock <br/>
                                                                    2 major and 2 minor exercise as per consortium <br/>
                                                                    All materials and instruments provided with frasaco manikin + teeth <br/>
                                                                    Feedback after exam on where to improve
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="6_1" onclick="onAddCartClicked('6');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 20px">Add to Cart</a>
                                                                        <a id="6_2" onclick="onRemoveCartClicked('6');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; margin-top: 20px; display: none">Remove from Cart</a>
                                                                        <a id="6_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white; margin-top: 20px">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">1 Day ME + DTP MOCK Exam </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">20 mins ME Mock exam Followed by 1 hour DTP Mock exam </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 12,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Shravan Chawla</p>
                                                                <h5 class="more-details"><a id="flip7">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel7" class="hide_display">
                                                                    First ME followed by DTP help exactly like on Exam Day <br/>
                                                                    ME Viva followed by Mandatory CPR <br/>
                                                                    10 mins break Followed by Actor DTP<br/>
                                                                    DTP forms and clock provided <br/>
                                                                    Feedback provided after exam on where to improve
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="7_1" onclick="onAddCartClicked('7');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 12px">Add to Cart</a>
                                                                        <a id="7_2" onclick="onRemoveCartClicked('7');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; margin-top: 12px; display: none">Remove from Cart</a>
                                                                        <a id="7_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white; margin-top: 12px">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">ORE / LDS PART II Complete Mock </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">4 Modules conducted over 3 days just like exam </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 20,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Shravan Chawla</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip8">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel8" class="hide_display">
                                                                    Day 1 :- OSCE <br/>
                                                                    Day 2 :- Manikin <br/>
                                                                    Day 3 :- ME + DTP <br/>
                                                                    Exact exam like mock
                                                                    Feedback and PASS / FAIL Verdict after all modules over <br/>
                                                                    Detailed Feedback on where to improve.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="8_1" onclick="onAddCartClicked('8');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="8_2" onclick="onRemoveCartClicked('8');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="8_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">1 Day Manikin Revision</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">1 day / 9 am to 6 pm </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 6,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Shravan Chawla</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip9">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel9" class="hide_display">
                                                                    You come in and we revise all preps<br/>
                                                                    We show you each exercise with tricks and time management <br/>
                                                                    Frasaco manikins and teeth <br/>
                                                                    All Materials Provided <br/>
                                                                    Practice Preps at our center and we provide feedback on how to improve <br/>
                                                                </div>
                                                                <br>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="9_1" onclick="onAddCartClicked('9');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white;">Add to Cart</a>
                                                                        <a id="9_2" onclick="onRemoveCartClicked('9');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none;">Remove from Cart</a>
                                                                        <a id="9_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="aligncenter" id="toggle-mr-dental-view" style="cursor:pointer;">
                                        <h3>
                                            <span style="float: left; margin-left: 40px">&#8659;</span>
                                            MR. DENTAL - ORE
                                            <span style="float: right; margin-right: 40px">&#8659;</span>
                                        </h3>
                                    </div>

                                    <br/><br/>

                                    <div id="mr-dental-wrapper" style="display:none;">
                                        <div class="vc_column-inner" style="padding-right: 40px; padding-left: 40px">
                                            <div class="wpb_wrapper">
                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 margin_bottom_huge">
                                                    <div class="row">
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">5 Day OSCE, DTP &amp; ME</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">June 8 th - 12 th, 2019 - 9 am to 5 pm</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline">GBP 990</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Anita Pradhan (MR. Dental) &amp; Dr. Jasmine Singh (MR. Dental)</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip19">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel19" class="hide_display">
                                                                    Day 1 :- Skilled OSCE's <br>
                                                                    Day 2 :- Actor &amp; Written OSCE's <br>
                                                                    Day 3 :- Dental Treatment Planning <br>
                                                                    Day 4 :- Medical Emergency <br>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Medical Emergency Mock <br>
                                                                    Day 5 :- OSCE &amp; DTP Mock <br>
                                                                    All Tutors from MR. Dental UK. All training materials, manuals, etc. provided by MR. Dental UK. <br>
                                                                    Only 10 spots.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a href="https://www.mrdental.co.uk/Mumbai-India-ORE-Course/ORE-II-COURSE-MUMBAI-INDIA-June-19.Html?cPath=15"  target="_blank" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Book Now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">5 day MANIKIN Course</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">June 14th - 19th, 2019</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline">GBP 990</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Fred Mukwenda (MR. Dental) &amp; Dr. Anita Pradhan (MR. Dental)</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip20">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel20" class="hide_display">
                                                                    Day 1 :- Amalgam Class I &amp; II Cavities <br>
                                                                    Day 2 :- Composite :- Class III, IV, V and Cusp Build-up <br>
                                                                    Day 3 :- Crown Preps <br>
                                                                    Day 4 :- Impression Taking, <br>
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temporary Crown, Lab Card,
                                                                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Rest Seat, RCT <br>
                                                                    Day 5 :- Supervised Practice and Feedback <br>
                                                                    All tutors from MR. Dental UK. All training material, manuals, stc. provided by MR. Dental UK. <br>
                                                                    Only 10 spots.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a href="https://www.mrdental.co.uk/Mumbai-India-ORE-Course/ORE-II-COURSE-MUMBAI-INDIA-June-19.Html?cPath=15" target="_blank" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Book Now</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/><br/><br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="aligncenter" id="nbde-toggle-view" style="cursor: pointer;">
                                        <h3>
                                            <span style="float: left; margin-left: 40px">&#8659;</span>
                                            NBDE (USA) / NDEB (CANADA)
                                            <span style="float: right; margin-right: 40px">&#8659;</span>
                                        </h3>
                                    </div>

                                    <br/><br/>
                                    <div id="ndbe-wrapper" style="display:none;" class="margin_bottom_huge">
                                        <div class="vc_column-inner" style="padding-right: 40px; padding-left: 40px">
                                            <div class="wpb_wrapper">
                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2">
                                                    <div class="row">
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Orentation &amp; Introduction </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">6 hours</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 1,500/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Akshari Anchan</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip10">Click for more details&nbsp;&#8659;</a></h5>
                                                                <br><br>
                                                                <div id="panel10" class="hide_display">
                                                                    Detailed Explanation of NBDE / NDEB <br/>
                                                                    About NBDE <br/>
                                                                    Different University / Colleges Background <br/>
                                                                    Deemed Vs Private Universities in USA <br/>
                                                                    CAAPID Appllication <br/>
                                                                    Dates &amp; Deadlines <br/>
                                                                    Application Process <br/>
                                                                    Subjects to Study <br/>
                                                                    Examination Schedule <br/>
                                                                    Outline of Preparation <br/>
                                                                    Exam Contents
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="10_1" onclick="onAddCartClicked('10');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="10_2" onclick="onRemoveCartClicked('10');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="10_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">NBDE / NDEB– IMPULSE PART I</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">8 days ( 4 + 4 ) / 9 am to 11 am ( 15 Hours total ) </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 16,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Akshari Anchan</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip11">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel11" class="hide_display">
                                                                    All basic sciences covered in brief overview for exam <br/>
                                                                    2 days Anatomy <br/>
                                                                    1 day Physio <br/>
                                                                    1 day Biochemistry<br/>
                                                                    1 day Microbiology <br/>
                                                                    1 day Dental Anatomy <br/>
                                                                    1 day Pathology <br/>
                                                                    1 day Revision <br/>
                                                                </div>
                                                                <br>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="11_1" onclick="onAddCartClicked('11');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="11_2" onclick="onRemoveCartClicked('11');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="11_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_3 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">NBDE / NDEB– IMPULSE <br> PART II </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">10 days ( 5 + 5 ) / 9 am to 11am
                                                                    <br> ( 20 Hours Total )</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 20,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Akshari Anchan</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip12">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel12" class="hide_display">
                                                                    All Clinical Science topics covered in brief overview for exam <br/>
                                                                    1 Day Pharmacology <br/>
                                                                    1 Day Conservative Dentistry &amp; Endodontics <br/>

                                                                    1 Day Oral Pathology <br/>
                                                                    1 Day Periodontics <br/>
                                                                    1 Day Orthodontics <br/>
                                                                    1 Day Oral Surgery <br/>
                                                                    1 Day Public Health <br/>
                                                                    1 Day Oral Medicine + Radiology <br/>
                                                                    1 Day Ethics <br/>
                                                                    1 Day Revision
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="12_1" onclick="onAddCartClicked('12');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white; margin-top: 10px">Add to Cart</a>
                                                                        <a id="12_2" onclick="onRemoveCartClicked('12');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; margin-top: 10px; display: none">Remove from Cart</a>
                                                                        <a id="12_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white; margin-top: 10px">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">NBDE / NDEB – INTENSE PART I  </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">24 days total ( 6 days/ week  X 4 weeks / 9 am to 11 am / total 48 hours coaching ) </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 30,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Akshari Anchan</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip13">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel13" class="hide_display">
                                                                    Detailed and In depth Coaching of Basic Sciences <br/>
                                                                    4 Days Anatomy <br/>
                                                                    4 Days Physiology <br/>
                                                                    4 Days Biochemistry <br/>
                                                                    4 Days Microbiology <br/>
                                                                    4 Days Dental Anatomy <br/>
                                                                    4 Days Pathology <br/>
                                                                    Revision
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="13_1" onclick="onAddCartClicked('13');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="13_2" onclick="onRemoveCartClicked('13');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="13_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">NBDE / NDEB – INTENSE PART II  </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">24 days total ( 6 days/ week  X 4 weeks / 9 am to 11 am
                                                                    <br> / total 48 hours coaching )</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 40,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Akshari Anchan</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip14">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel14" class="hide_display">
                                                                    2 Days Pharmacology<br/>
                                                                    2 Days Conservative Dentistry &amp; Endodontics <br/>
                                                                    2 Days Prosthodontics <br/>
                                                                    2 Days Oral Pathology <br/>
                                                                    2 Days Periodontics <br/>
                                                                    2 Days Orthodontics <br/>
                                                                    2 Days Oral Surgery <br/>
                                                                    2 Days Public Health <br/>
                                                                    2 Days Oral Medicine &amp; Radiology<br/>
                                                                    2 Days Ethics <br/>
                                                                    4 Days Revision
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="14_1" onclick="onAddCartClicked('14');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="14_2" onclick="onRemoveCartClicked('14');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="14_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/><br/><br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="aligncenter" id="toggle-composites-view" style="cursor: pointer;">
                                        <h3>
                                            <span style="float: left; margin-left: 40px">&#8659;</span>
                                            Composites
                                            <span style="float: right; margin-right: 40px">&#8659;</span>
                                        </h3>
                                    </div>

                                    <div id="composites-wrapper" style="display:none;">
                                        <div class="vc_column-inner" style="padding-right: 40px; padding-left: 40px">
                                            <div class="wpb_wrapper">
                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 margin_bottom_huge">
                                                    <div class="row">
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Demistifying Dentistry - Advanced Composite Clinical Masterclass</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">April 13th / 14th 2019 - 9 am to 5 pm</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 25,000/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Vishal Gupta</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip15">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel15" class="hide_display">
                                                                    2 day course each candidate gets private workstation <br>
                                                                    All exercises with rubber dam, Clinical Simulation Manikin <br>
                                                                    All anterior and Posterior Composites covered <br>
                                                                    Air Rotor Preps <br>
                                                                    Live video feed for step by step layering with tutor <br>
                                                                    10 seats only for quality learning experience <br>
                                                                    All materials and instruments provided by 3M-ESPE <br>
                                                                    Part of Bay Dental Clinical Mentorship Program <br>
                                                                    Lunch and Refreshments Provided.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="15_1" onclick="onAddCartClicked('15');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="15_2" onclick="onRemoveCartClicked('15');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="15_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Composite Titans</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">July 20-21, 2019 / 9 am to 5 pm</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 32,500/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Griya Raharja &amp; Dr. Rizal Akbar</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip21">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel21" class="hide_display">
                                                                    Lectures / Demo and Practice , Course in English.
                                                                    First time ever in INDIA.<br>
                                                                    The biggest names in Asia & Middle East for Bonded Composites Together<br>
                                                                    2 day extensive clinical workshop with the most followed dentists for composites<br>
                                                                    Course will be for 2 days 9 am to 5 pm.<br>
                                                                    Participants will get to observe and practice.<br>
                                                                    Anterior Class III, ClassIV , Direct Veneers,<br>
                                                                    Diastema Closure , and Posterior Class I & Class II<br>
                                                                    Finishing and Polishing Protocol in Detail <br>
                                                                    Rubber Dam Demo and exercises.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="19_1" onclick="onAddCartClicked('19');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="19_2" onclick="onRemoveCartClicked('19');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="19_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/><br/><br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br><br>

                                    <div class="aligncenter" id="toggle-veneers-view" style="cursor:pointer;">
                                        <h3>
                                            <span style="float: left; margin-left: 40px">&#8659;</span>
                                            Veneers
                                            <span style="float: right; margin-right: 40px">&#8659;</span>
                                        </h3>
                                    </div>

                                    <div id="veneers-wrapper" style="display:none;">
                                        <div class="vc_column-inner" style="padding-right: 40px; padding-left: 40px">
                                            <div class="wpb_wrapper">
                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 margin_bottom_huge">
                                                    <div class="row">
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Bespoke Veeners - Advanced Clinical Veener Simulation Workshop</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">July 6th / 7th 2019 - 9 am to 5 pm</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 16,500/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Manav Kalra</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip16">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel16" class="hide_display">
                                                                    2 day course each candidate gets private workstation <br>
                                                                    All exercises with Clinical Simulation Manikin <br>
                                                                    All clinical aspects of veneers covered <br>
                                                                    Air Rotor Preps <br>
                                                                    Live video feed for step by step with tutor <br>
                                                                    10 seats only for quality learning experience <br>
                                                                    All materials and instruments provided by Ivoclar Vivadent <br>
                                                                    Part of Bay Dental Clinical Mentorship Program.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="16_1" onclick="onAddCartClicked('16');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="16_2" onclick="onRemoveCartClicked('16');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="16_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="column-1_2 sc_column_item">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Veneers &amp; Occlusion - Bespoke Smile Academy UK</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">Nov 16 - 17, 2019</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 26,500/-</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Sam Jethwa <br> (British Academy of Cosmetic Dentistry)</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip17">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel17" class="hide_display">
                                                                    Learn from the Director of Young Dentists learning - British Academy of Cosmetic Dentistry<br>
                                                                    Best Young Dentist - UK 2016/17 <br>
                                                                    All about Veneers <br>
                                                                    Complete Clinical Protocol <br>
                                                                    Case discussions and selection <br>
                                                                    Clinical Steps <br>
                                                                    Smile Design <br>
                                                                    Occlusion <br>
                                                                    Failures and Management.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="17_1" onclick="onAddCartClicked('17');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="17_2" onclick="onRemoveCartClicked('17');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="17_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/><br/><br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br><br>

                                    <div class="aligncenter" id="toggle-photography-view" style="cursor:pointer;">
                                        <h3>
                                            <span style="float: left; margin-left: 40px">&#8659;</span>
                                            Photography
                                            <span style="float: right; margin-right: 40px">&#8659;</span>
                                        </h3>
                                    </div>

                                    <div id="photography-wrapper" style="display:none;">
                                        <div class="vc_column-inner" style="padding-right: 40px; padding-left: 40px">
                                            <div class="wpb_wrapper">
                                                <div class="columns_wrap sc_columns columns_nofluid sc_columns_count_2 margin_bottom_huge">
                                                    <div class="row">
                                                        <div class="column-1_2 sc_column_item aligncenter">
                                                            <div class="aligncenter course-border">
                                                                <h5 style="display: inline">Course Name : </h5>
                                                                <p style="display: inline">Grey Scale - Advanced Dental Photography Course</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Duration : </h5>
                                                                <p style="display: inline">29 - 30th June 2019</p>
                                                                <br><br>
                                                                <h5 style="display: inline">Cost : </h5>
                                                                <p style="display: inline"> &#x20b9; 15,000/- </p>
                                                                <br><br>
                                                                <h5 style="display: inline">Tutor : </h5>
                                                                <p style="display: inline">Dr. Mayur Davda</p>
                                                                <br>
                                                                <h5 class="more-details"><a id="flip18">Click for more details&nbsp;&#8659;</a></h5>
                                                                <div id="panel18" class="hide_display">
                                                                    Leading Dental Photography mentor by Dr. Mayur Davda <br>
                                                                    Cannon Photo Mentor <br>
                                                                    Each candidate to play with DSLR and Advanced Lenses <br>
                                                                    Soft Box Flashes <br>
                                                                    Twin + Ring Flashes <br>
                                                                    Get Artistic Images <br>
                                                                    Each candidate will get to take Full Clinical series <br>
                                                                    Photos on their Manikin. <br>
                                                                    Only 15 seats.
                                                                </div>
                                                                <div class="row aligncenter">
                                                                    <div class="column-1_2">
                                                                        <a id="18_1" onclick="onAddCartClicked('18');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_style_filled sc_button_size_large" style="width: 100%; color: white">Add to Cart</a>
                                                                        <a id="18_2" onclick="onRemoveCartClicked('18');" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large remove-cart-button" style="color: white; display: none">Remove from Cart</a>
                                                                        <a id="18_3" onclick="onMaximumCapacityClicked();" href="javascript:void(0)" class="sc_button sc_button_square sc_button_size_large batch-full-button" style="display: none; width: 100%; color: white">Batch Full</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br/><br/><br/>
                                                </div>
                                            </div>
                                        </div>
                                    </div><br><br>
                                </div>
                            </div>
                            <div class="vc_row-full-width"></div>
                            <div class="aligncenter">
                                <h3><a href="javascript:void(0)" onclick="viewPolicy();">Cancellation and Refund Policy</a></h3>
                            </div>
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
                        <div class="copyright_text">Bay Dental Institute 2018 © All Rights Reserved. Developed by <a target="_blank" href="http://www.incepiomdigitech.in">Incepiom Digitech</a></div>
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
<script type='text/javascript' src='js/vendor/chart.min.js'></script>
</body>

</html>

<?php
ob_end_flush();
?>
