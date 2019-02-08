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
    <title>Faculty - Bay Dental Institute</title>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>

	<script>

        var faculty_info = [
            "Dr. Shravan Chawla has graduated from the University of Mauritius, followed by giving the licensing conducted by the DCI for Indian citizens studying abroad. After gaining a PG certification in aesthetics and implants for NYU(USA), Dr. Chawla went on to crack the ORE-UK licensing exams to be registered as a licensed Dental practitioner with the GDC-UK. Currently Dr. Chawla runs his practice Bay Dental Institute in South Mumbai.",
            "Dr. Akshari Anchan has graduated from the prestigious Nitte University, Mangalore and has post graduated into clinical aesthetics from the esteemed Indian Institute of Aesthetic Medicine, Pune. She has successfully cleared her licensing exams in the United States of America. In her multiple visits to the United States between 2013-2016, Dr. Anchan has observed various doctors and worked closely with University of Miami on a 3 year program for Facial Aesthetics, Botox, and Lip Fillers. Dr. Anchan has an experience of over 5 years in clinical practice and maintains a private practice and is an expert consultant to over 25 clinics all over Mumbai concentrating on Facial Aesthetics, Botox, Lip Fillers and Hair transplant. Her research articles have won her National and International laurel including recognition from the renowned Indian Council of Medical Research.",
            "Dr. Vishal Gupta did his gradutation in dentistry from Govt. Dental College, Shimla 2001 and then went on to do his M.D.S. from AIIMS in Orthodontics and Dentofacial Orthopaedics, 2004. He has a teaching experience of 12 years and his special fields of interest are Aesthetic dentistry, Orthodontics, Dental Photography, Direct and Indirect restorations and Implantology. He conducts Continuous Dental Education courses on various aspects of Esthetic dentistry with special emphasis on direct composite restorations under the aegis of \"Demystifying Dentistry\". He is a certified Style italiano level 1 trainer on Direct Restorative Procedure and has earned a green Badge from Restorative implant practice excellence, RIPE for continuous clinical excellence. He is a KOL for 3M and has various clinical publications to his credit and has also made a contribution in a book. Besides dentistry he is also active in sports and is a long distance runner having run various marathons and Ultra-marathons. He maintains a successful clinical practice in Panchkula (Haryana) India. He can be reached at vishalsdental.world@gmail.com and followed on Facebook page Vishal's Dental World and Demystifying Dentistry.",
            "Dr Manav Kalra is a Prosthodontist who works out of his private practice in New Delhi. The focus of his practice is primarily on Aesthetics, Full Mouth Rehabilitation & Implants having a strong ethos of minimally invasive and additive Dentistry. His work has seen his practice win many prestigious awards for excellence & aesthetics . Being Certified in DSD ( Digital Smile Design ) He is among the leading KOL ( Key Opinion leaders ) for various companies such as Ivoclar Vivadent ( Switzerland ) for key treatments with Emax including ( but not limited to ) veneers, smile designing , full mouth rehabilitation, inlays and onlays etc. His passion to teach sees him as a role of clinical mentor in many institutions across the country. Keeping in mind the reach of digital social media, Dr. Kalra has succesfully established a youtube channel to spread knowledge and help dentists learn from his work.",
            "Director of Membership at The British Academy of Cosmetic Dentistry, and an award-winning cosmetic dentist. Dr Sam Jethwa is based in London and lectures and provides hands on training to dentists in the UK and internationally, on the topic of smile design, occlusion, and the methods of creating natural, predictable smiles, with a strong focus on minimal and no preparation porcelain techniques. Dr Jethwa founded The Bespoke Smile Academy, which provides training for dentists in the UK and Germany and is a key opinion leader for DMG dental materials and a brand ambassador for Ordo Life, the oral health brand. Dr Jethwa is a qualified clinical teacher with a Postgraduate Diploma in clinical education, and is a member of the Royal College of Surgeons of Edinburgh,. He has published articles on smile design, functional success, and is passionate about imparting his knowledge to ensure more dentists have the skill set to treat the worn dentition and aesthetic case with total confidence. Dr Jethwa treats multiple complex cases every year and shares his knowledge on social media as one of the most prominent dentists in the UK on Instagram. “my vision is to equip dentists around the world with the skills to translate their version of a beautiful smile, into reality” Special interests:\n" + "Occlusion\n" + "Smile design \n" + "Hand designed trial smiles\n" + "Minimal Porcelain veneers \n" + "Worn dentition\n" + "Sam Jethwa BDS(Lon) MFDS RCS (Edin) PgDip ClinEd",
            "Dr. Mayur Davda is an alumnus of Dr. D Y Patil University School of Dentistry, Navi Mumbai and has his private practice at Mumbai. He has extensively lectured on dental photography and related topics to encourage dental photography. Some of the podiums where he has lectured include Indian academy of aesthetic dentistry, Famdent Conference, ICOI, FDI &IDA conference, many state conferences, Dental Colleges & Universities like Government Dental College – Mumbai, Nair Dental College, and Manipal University etc.\n" +
            "As an artist Dr. Mayur Davda has exhibited at some of the most prestigious art galleries of India like The Jehangir Art Gallery, Aura Art Gallery, Kalaghoda Art Festival, Taj Literature festival and so on. His passion for high speed macro photography has made him India’s first dentist to be featured in the best photography magazines of India like Better Photography and Smart Photography. His art work Liquid Canvas – high speed liquid droplet photography (www.liquidcanvas.in) is one of the most difficult art forms due to which he was interviewed on National Television 2 times over and was also invited by the Consulate General of Turkey in 2015 for contribution to the field of fine art photography. He is a keen observer of wildlife and conservation and has publications in international magazines like Lonely Planet and Sanctuary Asia. He has also received the highly commended Indian Dental Talent of the Year award at Famdent Awards – 2015. CANON India and GPS smile design (Las Vegas, USA) have recognized his contribution toward dental photography and have assigned him the responsibility of a Dental Photography mentor since May 2015. Dr. Davda has various publications to his credit and continues to pursue research as the CEO of Dental Photography School (www.dentalphotographyschool.in) in India’s one and only institute for dental photography training at Mumbai. Close to all the images in the book called Clinical Fixed Prosthodontics by Dr. Moez Khakiani were clicked by Dr. Davda himself. He also has a Chapter called Photography in Dentistry to his credit in the same book & has co-authored a chapter on shade selection & communication. He is the mentor for India’s most extensive course on dental photography at Manipal University called the integrated dental photography program that runs for 3 months every year.",
            "Dr. Fred is well known ORE 2 Manikin Tutor and has been conducting manikin courses here at MR. Dental since January 2007. Dr Fred is the lead Tutor for ORE 2 Manikin courses. He has vast experience and expertise in all areas of the ORE II Manikin. He is also well known in the field of dentistry and has been in clinical practice as a restorative specialist qualified from Eastman's UCL. He has taught at Londec and also has previously taught at Eastman’s UCL. He has assisted in the set-up of the ORE 2 Manikin Exam at Eastman's UCL and have examined ORE 2 manikin candidates. Dr Fred’s direct teaching, approach, expertise and guidance meets the examiner’s perspective.",
            "Since joining our Manikin Tutorial team Dr Anita has become extremely popular among ORE candidates. She is very sincere, caring and passionate in her guidance. Dr Anita believes in CORRECT guidance always to meet the expectations of the examiner. She has become our second lead course tutor for ORE Manikin. Dr Anita has established MR Dental's Facebook pages and works tirelessly to give you the correct feedback on our FB pages. Dr Anita's profound understanding of the GDC guidelines for the ORE 2 exam is the best around. Dr. Anita also demonstrates the dental techniques that are used in MR. Courses’ ‘How To’ video guides, featured on our Videos page and YouTube channel. These combined have attracted over 139,000 views so far. Dr. Anita has more than 9 years of clinical experience and has been involved in conducting and organising CPD courses in the past and has a great passion for teaching.",
            "Dr Zina is a vital member of MR. Dental’s OSCE/DTP/ME Tutorial Team. She has vast knowledge of the ORE exam. Dr Zina believes in providing the much care and exact precise details of the ORE Exam to all candidates. She loves teaching and enjoys guiding the ORE candidates. Dr Zina also commands excellent Manikin Skills, but her focus remains in guiding ORE candidates with the OSCE/DTP/ME topics. She is very caring, sympathetic and has amazing interaction with each candidate. Dr Zina loves passing her vast knowledge and her vast valuable experience to all candidates in attendance.",
            "Dr Jasmine is very patient and full of energy. Dr Jasmine is a very valuable member of the MR. Dental’s OSCE/DTP/ME Tutorial Team. She has a very caring attitude to every candidate and is very committed to provide the best ORE knowledge and guidance to every ORE candidate. Her guidance is direct and is exceptional. She is very well liked by the ORE candidates. Dr Jasmine continues to enhance her skills by actively attending the continuing dental education programmes. Dr Jasmine is currently completing her “Conscious Sedation in Dentistry” course at UCL along with teaching at MR. Dental. Dr Jasmine has an ORE focused approach to her teaching and her cheery bubbly personality is a great comfort to everyone around her. In her spare time she enjoys reading, baking and exploring new places around her.",
            "Shazia Afzal is an important member of MR Dental's OSCE/DTP/ME Tutorial Team. She is very passionate in her teaching and is very focus in her guidance. Dr Shazia is very knowledgeable and keeps herself updated regarding the guidelines of the ORE exams. She works diligently and make every effort to guide the candidates correctly for their ORE exams. Dr Shazia welcomes questions from candidates and interacts with every candidate. She believes in correct guidance and is very keen to help each candidate to achieve success in their exams."
        ];

        function view_faculty_info(id, name, image_name)  {
            Swal.fire({
                title: name,
                text: faculty_info[id],
                imageUrl: 'images/our-team/' + image_name + '.jpg',
                imageWidth: 250,
                imageHeight: 50,
                imageAlt: name,
                animation: true
            })
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
                    <h1 class="page_title">Faculty</h1>
                    <div class="breadcrumbs">
                        <a class="breadcrumbs_item home" href="index.php">Home</a>
                        <span class="breadcrumbs_delimiter"></span>
                        <span class="breadcrumbs_item current">Faculty</span>
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
                                        <div class="vc_column-inner ">
                                            <div class="wpb_wrapper">
                                                <div id="sc_team_296_wrap" class="sc_team_wrap type1">
                                                    <div id="sc_team_296" class="sc_team sc_team_style_team-1">
                                                        <h2 class="sc_team_title sc_item_title">Meet Our team</h2>
                                                        <br><br>
                                                        <div class="sc_columns columns_wrap">
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_1" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(0, 'Dr. Shravan Chawla', 'shravan-chawla')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t1" width="182" height="182" alt="Dr. Shravan Chawla" src="images/our-team/shravan-chawla.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Shravan Chawla
                                                                        </h5>
                                                                        <div class="sc_team_item_position">ORE - UK <br/>Director<br/>Bay Dental Institute</div>
                                                                        <div><br/>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_2" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(1, 'Dr. Akshari Anchan', 'akshari-anchan')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t2" width="182" height="182" alt="Dr. Akshari Anchan" src="images/our-team/akshari-anchan.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Akshari Anchan
                                                                        </h5>
                                                                        <div class="sc_team_item_position">NBDE / NDBE Director<br/>Botox and Facial Aesthetics Clinician</div>
                                                                        <br><br>
                                                                        <div>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_3" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(2, 'Dr. Vishal Gupta', 'vishal-gupta')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t3" width="182" height="182" alt="Dr. Vishal Gupta" src="images/our-team/vishal-gupta.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Vishal Gupta
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Advanced composite masterclass<br/>Style Italiano level1 trainer<br/>KOL for 3M ESPE</div>
                                                                        <br>
                                                                        <div>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_4" class="sc_team_item even">
                                                                    <div onclick="view_faculty_info(3, 'Dr. Manav Kalra', 'manav-kalra')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t4" width="182" height="182" alt="Dr. Manav Kalra" src="images/our-team/manav-kalra.jpg" style="height: 180px">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Manav Kalra
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Advanced veneers<br/>Emax specialist clinician<br/>KOL for Ivoclar Vivadent</div>
                                                                        <div><br/>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>

															<div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_1" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(4, 'Dr. Sam Jethwa', 'sam-jethwa')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t5" width="182" height="182" alt="Dr. Sam Jethwa" src="images/our-team/sam-jethwa.jpeg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Sam Jethwa
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Veneers & Occlusion<br/>Director<br/>British Academy of Cosmetic Dentistry</div>
                                                                        <div>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>
															<div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_1" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(5, 'Dr. Mayur Davda', 'mayur-davda')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t6" width="182" height="182" alt="Dr. Mayur Davda" src="images/our-team/mayur-davda.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Mayur Davda
                                                                        </h5>
                                                                        <div class="sc_team_item_position">Dental Photography<br/>Director<br/>Dental Photography School<br/></div>
                                                                        <div><br/>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
														<h4 class="sc_team_title sc_item_title">MR. Dental ORE Tutors</h4>
														<br><br/>
                                                        <div class="sc_columns columns_wrap">
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_1" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(6, 'Dr. Fred Mukwenda', 'fred-mukwenda')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t7" width="182" height="182" alt="Dr. Fred Mukwenda" src="images/our-team/fred-mukwenda.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Fred Mukwenda
                                                                        </h5>
                                                                        <div class="sc_team_item_position">BDS, MPH, MSC (CONS)</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_2" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(7, 'Dr. Anita Pradhan', 'anita-pradhan')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t8" width="182" height="182" alt="Dr. Anita Pradhan " src="images/our-team/anita-pradhan.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Anita Pradhan
                                                                        </h5>
                                                                        <div class="sc_team_item_position">BDS, FAGE</div>
                                                                        <div>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_3" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(8, 'Dr. Zina Saad', 'zina-saad')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t9" width="182" height="182" alt="Dr. Zina Saad" src="images/our-team/zina-saad.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Zina Saad
                                                                        </h5>
                                                                        <div class="sc_team_item_position">BDS</div>
                                                                        <div>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_4" class="sc_team_item even">
                                                                    <div onclick="view_faculty_info(9, 'Dr. Jasmine Singh', 'jasmine-singh')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t10" width="182" height="182" alt="Dr. Jasmine Singh" src="images/our-team/jasmine-singh.jpg" style="height: 180px">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Jasmine Singh
                                                                        </h5>
                                                                        <div class="sc_team_item_position">BDS, Dip. Sedation UCL</div>
                                                                        <div>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>

															<div class="column-1_4 column_padding_bottom">
                                                                <div id="sc_team_296_1" class="sc_team_item">
                                                                    <div onclick="view_faculty_info(10, 'Dr. Shazia Afzal', 'shazia-afzal')" class="sc_team_item_avatar" style="cursor: pointer">
                                                                        <img id="t11" width="182" height="182" alt="Dr. Shazia Afzal " src="images/our-team/shazia-afzal.jpg">
                                                                    </div>
                                                                    <div class="sc_team_item_info">
                                                                        <h5 class="sc_team_item_title">
                                                                            Dr. Shazia Afzal
                                                                        </h5>
                                                                        <div class="sc_team_item_position">BDS</div>
                                                                        <div>Click on the image for more content</div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="vc_empty_space space_70p">
                                                    <span class="vc_empty_space_inner"></span>
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
