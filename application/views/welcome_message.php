<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">

        <title>SD Ar-Rafi'</title>
        <meta name="description" content="Proyek Akhir Hani">
        <meta name="author" content="Hani Fildzah Ghassani">
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--meta responsive-->

        <!--START CSS--> 
        <link rel="stylesheet" href="<?php echo base_url('assets/homepage/css/nicdark_style.css');?>"> <!--style-->
        <link rel="stylesheet" href="<?php echo base_url('assets/homepage/css/nicdark_responsive.css');?>"> <!--nicdark_responsive-->

        <!--revslider-->
        <link rel="stylesheet" href="<?php echo base_url('assets/homepage/css/revslider/settings.css');?>"> <!--revslider-->
        <!--END CSS-->
    
        <!--google fonts-->
        <link href='http://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'> <!-- font-family: 'Montserrat', sans-serif; -->
        <link href='http://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'> <!-- font-family: 'Raleway', sans-serif; -->
        <link href='http://fonts.googleapis.com/css?family=Montez' rel='stylesheet' type='text/css'> <!-- font-family: 'Montez', cursive; -->

        <!--[if lt IE 9]>  
        <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>  
        <![endif]-->  
    
        <!--FAVICONS-->
        <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.ico');?>">
        <!--END FAVICONS-->
    </head>
    <body id="start_nicdark_framework">
        <div class="nicdark_site">
            <div class="nicdark_site_fullwidth nicdark_clearfix">
                <div class="nicdark_overlay"></div>
                <div class="nicdark_section nicdark_navigation">
                <div class="nicdark_menu_boxed">
                    <div class="nicdark_section nicdark_bg_greydark nicdark_displaynone_responsive">
                        <div class="nicdark_container nicdark_clearfix">
                            <div class="grid grid_6">
                                <div class="nicdark_focus">
                                    <h6 class="white">
                                        <i class="icon-home"></i>&nbsp;&nbsp;<a class="white" target="blank" href="https://www.google.co.id/maps/place/SD+Ar-Rafi/@-6.9415148,107.6430295,17z/data=!4m12!1m6!3m5!1s0x2e68e8134d2afc41:0x5a2046c2a9ac9588!2sSD+Ar-Rafi!8m2!3d-6.9415201!4d107.6452182!3m4!1s0x2e68e8134d2afc41:0x5a2046c2a9ac9588!8m2!3d-6.9415201!4d107.6452182">Jalan Sekejati III No.20, Kiara Condong, Kota Bandung</a>
                                        &nbsp;&nbsp;&nbsp;&nbsp;<span class="grey">·</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="icon-phone-outline"></i>&nbsp;&nbsp;<a class="white" href="tel:0227311009">(022) 7311009</a>
                                    </h6>
                                </div>
                            </div>
                            <div class="grid grid_6 right">
                                <div class="nicdark_focus right">
                                    <h6 class="white">
                                        <i class="icon-plus-outline"></i>&nbsp;&nbsp;
                                        <?php echo anchor('welcome/buku_tamu','Buku Tamu',array('class'=>'white'));?>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <span class="grey">·</span>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <i class="icon-lock-1"></i>&nbsp;&nbsp;
                                        <?php echo anchor('welcome/login','Masuk',array('class'=>'white'));?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nicdark_space3 nicdark_bg_gradient"></div>
                    <div class="nicdark_section nicdark_bg_grey nicdark_shadow nicdark_radius_bottom fade-down">
                        <div class="nicdark_container nicdark_clearfix">
                            <div class="grid grid_12 percentage">
                                <div class="nicdark_space20"></div>
                                <div class="nicdark_logo nicdark_marginleft10">
                                    <a href="http://localhost/pa">
                                        <img alt="" src="<?php echo base_url('assets/homepage/img/logo.png');?>">
                                    </a>
                                </div>

                                <nav>
                                    <ul class="nicdark_menu nicdark_margin010 nicdark_padding50">
                                        <li class="green">
                                            <?php echo anchor('http://localhost/pa/','Beranda');?>
                                        </li>
                                        <li class="red">
                                            <?php echo anchor('welcome/berita','Berita');?>
                                        </li>
                                        <li class="">
                                            <?php echo anchor('welcome/jadwal_seleksi','Jadwal Seleksi');?>
                                        </li>
                                    </ul>
                                </nav>
                                <div class="nicdark_space20"></div>
                            </div>
                        </div>
                        <!--end container-->
                    </div>
                    <!--end header-->
                </div>
            </div>

            <?php $this->load->view($section);?>

            <div class="nicdark_space3 nicdark_bg_gradient"></div>

            <!--start section-->
            <div class="nicdark_section nicdark_bg_greydark2 nicdark_copyrightlogo">
                <!--start nicdark_container-->
                <div class="nicdark_container nicdark_clearfix">
                    <div class="grid grid_6 nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
                        <div class="nicdark_space20"></div>
                        <p class="white">© Copyright <?php echo date('Y');?> by Hani Fildzah Ghassani
                            <span class="grey"> Telkom University </span>
                             <i class="icon-heart-filled red nicdark_zoom"></i>
                        Bandung</p>
                    </div>

                    <div class="grid grid_6">
                        <div class="nicdark_focus right nicdark_aligncenter_iphoneland nicdark_aligncenter_iphonepotr">
                            <div class="nicdark_margin10">
                                <a href="#" class="nicdark_bg_orange nicdark_press right nicdark_btn_icon nicdark_shadow small nicdark_radius white">
                                    <i class="icon-mail-1"></i>
                                </a>
                            </div>
                            <div class="nicdark_margin10">
                                <a href="#" class="nicdark_bg_yellow right nicdark_btn_icon nicdark_bg_red nicdark_shadow small nicdark_radius white">
                                    <i class="icon-home"></i>
                                </a>
                            </div>
                            <div class="nicdark_margin10">
                                <a href="tel:0227311009" class="nicdark_bg_red right nicdark_btn_icon nicdark_bg_blue nicdark_shadow small nicdark_radius white">
                                    <i class="icon-phone-outline"></i>
                                </a>
                            </div>
                            <div class="nicdark_margin10">
                                <a href="#start_nicdark_framework" class="nicdark_zoom nicdark_internal_link right nicdark_btn_icon nicdark_bg_greydark2 small nicdark_radius white">
                                    <i class="icon-up-outline"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end nicdark_container-->
            </div>
            <!--end section-->
        </div>
    </div>

    <!--main-->
    <script src="<?php echo base_url('assets/homepage/js/main/jquery.min.js');?>"></script> <!--Jquery-->
    <script src="<?php echo base_url('assets/homepage/js/main/jquery-ui.js');?>"></script> <!--Jquery UI-->
    <script src="<?php echo base_url('assets/homepage/js/main/excanvas.js')?>"></script> <!--canvas need for ie-->

    <!--plugins-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/revslider/jquery.themepunch.tools.min.js');?>"></script> <!--revslider-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/revslider/jquery.themepunch.revolution.min.js');?>"></script> <!--revslider-->

    <!--menu-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/menu/superfish.min.js');?>"></script> <!--superfish-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/menu/tinynav.min.js');?>"></script> <!--tinynav-->

    <!--other-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/isotope/isotope.pkgd.min.js');?>"></script> <!--isotope-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/mpopup/jquery.magnific-popup.min.js');?>"></script> <!--mpopup-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/scroolto/scroolto.js');?>"></script> <!--Scrool To-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/nicescrool/jquery.nicescroll.min.js');?>"></script> <!--Nice Scroll-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/inview/jquery.inview.min.js');?>"></script> <!--inview-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/parallax/jquery.parallax-1.1.3.js');?>"></script> <!--parallax-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/countto/jquery.countTo.js');?>"></script> <!--jquery.countTo-->
    <script src="<?php echo base_url('assets/homepage/js/plugins/countdown/jquery.countdown.js');?>"></script> <!--countdown-->
    
    <!--settings-->
    <script src="<?php echo base_url('assets/homepage/js/settings.js');?>"></script> <!--settings-->
<!--custom js-->
<script type="text/javascript">
    jQuery(document).ready(function() {


        //START SLIDE
        jQuery('.nicdark_slide1').show().revolution(
        {
            dottedOverlay:"none",
            delay:16000,
            startwidth:1170,
            startheight:650,
            hideThumbs:200,
            
            thumbWidth:100,
            thumbHeight:50,
            thumbAmount:5,
            
            navigationType:"none",
            navigationArrows:"solo",
            navigationStyle:"preview2",
            
            touchenabled:"on",
            onHoverStop:"on",
            
            swipe_velocity: 0.7,
            swipe_min_touches: 1,
            swipe_max_touches: 1,
            drag_block_vertical: false,
                                    
            parallax:"mouse",
            parallaxBgFreeze:"on",
            parallaxLevels:[7,4,3,2,5,4,3,2,1,0],
                                    
            keyboardNavigation:"off",
            
            navigationHAlign:"center",
            navigationVAlign:"bottom",
            navigationHOffset:0,
            navigationVOffset:20,

            soloArrowLeftHalign:"left",
            soloArrowLeftValign:"center",
            soloArrowLeftHOffset:20,
            soloArrowLeftVOffset:0,

            soloArrowRightHalign:"right",
            soloArrowRightValign:"center",
            soloArrowRightHOffset:20,
            soloArrowRightVOffset:0,
                    
            shadow:0,
            fullWidth:"on",
            fullScreen:"off",

            spinner:"spinner4",
            
            stopLoop:"off",
            stopAfterLoops:-1,
            stopAtSlide:-1,

            shuffle:"off",
            
            autoHeight:"off",                       
            forceFullWidth:"off",                       
                                    
            hideTimerBar: "on",                 
                                    
            hideThumbsOnMobile:"off",
            hideNavDelayOnMobile:1500,                      
            hideBulletsOnMobile:"off",
            hideArrowsOnMobile:"off",
            hideThumbsUnderResolution:0,
            
            hideSliderAtLimit:0,
            hideCaptionAtLimit:0,
            hideAllCaptionAtLilmit:0,
            startWithSlide:0,
            videoJsPath:"rs-plugin/videojs/",
            fullScreenOffsetContainer: ""   
        });
        //END SLIDE
        
        

        //START PARALLAX SECTIONS
        $('#nicdark_parallax_big_image').parallax("50%", 0.3);
        $('#nicdark_parallax_2_btns').parallax("50%", 0.3);
        $('#nicdark_parallax_countdown').parallax("50%", 0.3);
        $('#nicdark_parallax_counter').parallax("50%", 0.3);
        //END PARALLAX SECTIONS

        

        //START COUNTDOWN GRID SECTION
        //variables
        var endDate = "July 25, 2016 07:30:00";
        var grid = "grid_3";
        //insert the class nicdark_displaynone in the var if you wnat to hide the visualization
        var display_years = "nicdark_displaynone";
        var display_days = "";
        var display_hours = "";
        var display_minutes = "";
        var display_seconds = "";
        //call
        $(".nicdark_countdown").countdown({
          date: endDate,
          render: function(data) {
            $(this.el).html("<div class=\"grid "+ grid +" "+ display_years +" \"><div class=\"nicdark_textevidence center\"><h1 class=\"subtitle white extrasize\">"+ this.leadingZeros(data.years, 4) +"</h1><div class=\"nicdark_space20\"></div><a class=\"nicdark_btn nicdark_bg_blue small nicdark_shadow nicdark_radius white\">YEARS</a><div class=\"nicdark_space5\"></div></div></div><div class=\"grid "+ grid +" "+ display_days +"  \"><div class=\"nicdark_textevidence center\"><h1 class=\"subtitle white extrasize\">"+ this.leadingZeros(data.days, 3) +"</h1><div class=\"nicdark_space20\"></div><a class=\"nicdark_btn nicdark_bg_blue small nicdark_shadow nicdark_radius white\">DAYS</a><div class=\"nicdark_space5\"></div></div></div><div class=\"grid "+ grid +" "+ display_hours +"  \"><div class=\"nicdark_textevidence center\"><h1 class=\"subtitle white extrasize\">"+ this.leadingZeros(data.hours, 2) +"</h1><div class=\"nicdark_space20\"></div><a class=\"nicdark_btn nicdark_bg_yellow small nicdark_shadow nicdark_radius white\">HOURS</a><div class=\"nicdark_space5\"></div></div></div><div class=\"grid "+ grid +" "+ display_minutes +"  \"><div class=\"nicdark_textevidence center\"><h1 class=\"subtitle white extrasize\">"+ this.leadingZeros(data.min, 2) +"</h1><div class=\"nicdark_space20\"></div><a class=\"nicdark_btn nicdark_bg_green small nicdark_shadow nicdark_radius white\">MINUTES</a><div class=\"nicdark_space5\"></div></div></div><div class=\"grid "+ grid +" "+ display_seconds +"  \"><div class=\"nicdark_textevidence center\"><h1 class=\"subtitle white extrasize\">"+ this.leadingZeros(data.sec, 2) +"</h1><div class=\"nicdark_space20\"></div><a class=\"nicdark_btn nicdark_bg_violet small nicdark_shadow nicdark_radius white\">SECONDS</a><div class=\"nicdark_space5\"></div></div></div>");
          }
        });
        //END COUNTDOWN GRID SECTION

    });
</script>


</body>  
</html>