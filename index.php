<?php
    include "../config/loa_config.php";
?>
<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Lost Ark</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="css/base.css">
    <link rel="stylesheet" href="css/main.css">

    <!-- script
    ================================================== -->
    <script src="js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="images/GameIcon.ico">
    <link rel="icon" type="image/png" sizes="32x32" href="images/GameIcon.ico">
    <link rel="icon" type="image/png" sizes="16x16" href="images/GameIcon.ico">
    <link rel="manifest" href="site.webmanifest">
    <style type="text/css">
        
        #user_info {padding-top:30px;}
        .island_zone, .heart_zone, .art_zone, .tour_zone, .seed_zone, .token_zone, .leaf_zone {font-size:15px; padding:0px 30px; height:30rem; overflow-y:auto;}
        .island_icon {background: url(<?=base_img?>/images/sprite.png) no-repeat 0 0;background-size: 1337px 1302px;}
        .island_icon {width: 23px;height: 22px;background-position: -1271px -1052px;}
        #property h4 {color:white;}
        .collect_menu li { list-style-type:none;float:left;border: 2px solid #5D5D5D;padding: 0rem 2rem;background-color:#3b0d11;color:white;width:25%;height:7rem;line-height:6.5rem;font-size:2rem; cursor:pointer; }
        .profile-ability-tooltip ul{display:none;position:absolute;background-color:white;}
        .collect_menu .on {background-color:#8d192b}
        .Adventure_island {left:33%;position:absolute;width:60rem;z-index:999;background-color:#3b0d11;padding:5rem}
        .Adventure_island li {color:white;}
        .s-series {padding:2rem 0;}
        .island_zone em {float:right;}
        .collect_menu {padding:0 12rem}
        .island_class {margin: 4rem auto;}
        .padding_top_15 {padding-top:15rem;}
        .collect_title {padding-top:7rem;color:white;}
        #collect_section{padding-top: 0px;background-image: url(<?=base_img?>/images/collect/bg_detail_exploitationPeriod5.jpg);background-repeat: no-repeat;background-size: 200rem 120rem;background-position: center;}
        #island_div{/*background-color: rgba( 255, 255, 255, 0.5 );*/}
        #island_div  h2, li {color:white;}
        @font-face {
            font-family:'Maplestory';
            /*src: url('./font/Maplestory Bold.ttf') format('truetype');*/
            src: url('./font/Maplestory Light.ttf') format('truetype');
        }
        body {font-family:Maplestory, cursive;}
        .h-remove-bottom {width:70%;}
        @media screen and (max-width:900px) {
            .h-remove-bottom {width:100%;}
            .btn--about{width:100%;}
            .collect_menu li {width:95%}
            .Adventure_island {left:15%;width:30rem;padding:3rem;}
            .collect_menu {padding:0}
            .island_class {margin:0}
            .padding_top_15 {padding-top:5rem;}
        }
        @media screen and (max-width:1200px) {
            .Adventure_island {left:40%;}
        }
        ::-webkit-scrollbar{width: 16px;}
        ::-webkit-scrollbar-track {background-color:#5D5D5D;}
        ::-webkit-scrollbar-thumb {background-color:#393939;border-radius: 10px;}
        ::-webkit-scrollbar-thumb:hover {background: black;}
        ::-webkit-scrollbar-button:start:decrement,::-webkit-scrollbar-button:end:increment {
        width:16px;height:16px;background:#393939;}

        .engrave { /*width:100rem;*/position:absolute;overflow-y: scroll;height: 35rem;background-color:black;}
        .item_img { position:absolute;height: 35rem;width:51rem;background-color:black;}
        .on {display:block;}
        .off {display:none;}
        #property li {float:left;width:50%;}
        .events-list__item ul{list-style:none;}
        .events-list__item span{margin-right:5px;}
        .star_zone span, .heart_zone span, .art_zone span {display:none;}
        .collect_div {clear:both;margin-top:5rem;background-color:rgba( 0, 0, 0, 0.5 ); padding: 0 35px;}
        #social_section {display:none;}
    </style>

</head>

<body id="top">

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-jump">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>


    <!-- header
    ================================================== -->
    <header class="s-header">

        <div class="header-logo">
            <a class="site-logo" href="index.html">
                <img src="images/GameIcon.ico" alt="Homepage" style="margin-top: 50px;width: 50%;height:auto;">
            </a>
        </div>

        <nav class="header-nav-wrap">
            <ul class="header-nav">
                <li class="current"><a href="index.html" title="Home">Home</a></li>
                <li><a href="about.html" title="About">About</a></li>
                <li><a href="events.html" title="Services">Events</a></li>
                <li><a href="contact.html" title="Contact us">Contact</a></li>	
            </ul>
        </nav>

        <a class="header-menu-toggle" href="#0"><span>Menu</span></a>

    </header> <!-- end s-header -->


    <!-- hero
    ================================================== -->
    <section class="s-hero" data-parallax="scroll" data-image-src="images/index.jpg" data-natural-width=3000 data-natural-height=2000 data-position-y=center>

        <div class="hero-left-bar"></div>

        <div class="row hero-content">

            <div class="column large-full hero-content__text">
                <h1>
                    Lost Ark
                </h1>
                <div class="column large-half medium-full">
                    <h3 class="subhead">Write Your Nickname</h3>
                    <div class="form-field">
                        <center>
                        <input name="cName" id="cName" class="h-full-width h-remove-bottom" placeholder="Your Nickname" value="" type="text" style="color:white;float: left;" onkeypress="if (window.event.keyCode == 13) {search_info(this.value)}">
                        </center>
                        <a href="javascript:search_info($('input[name=cName]').val());" class="btn btn--primary btn--about" style="float:right">Search</a>
                    </div>
                    
                </div>

                <div class="hero-content__buttons" style="margin-top: 155px;">
                    <a href="javascript:;" class="btn btn--stroke show_div" data-tooltip=".Adventure_island">Adventure Island</a>
                    <a href="https://lostark.game.onstove.com/Main" class="btn btn--stroke" target="_blank">Official Page</a>
                </div>
            </div> <!-- end hero-content__text -->
            <div class="Adventure_island" style="display:none;">
                <ul class="about-sched">
                    <li>
                        <h4>Today Adventure Island</h4>
                        <p>
                            <img src="images/island/island_00.jpg" style="width:50%">
                            <br>
                            기회의섬 - 9:00 PM <br>
                            인연의돌 / 경험치물약 / 골드
                        </p>
                    </li>
                    <li>
                        <p>
                            <img src="images/island/island_07.jpg" style="width:50%">
                            <br>
                            고요한 안식의 섬 - 9:00 PM <br>
                            인연의돌 / 경험치물약 / 재련재료 - 숨결
                        </p>
                    </li>
                </ul>
            </div>

        </div> <!-- end hero-content -->

        <ul class="hero-social">
            <li class="hero-social__title">Follow Us</li>
            <li>
                <a href="#0" title="">Facebook</a>
            </li>
            <li>
                <a href="#0" title="">YouTube</a>
            </li>
            <li>
                <a href="#0" title="">Instagram</a>
            </li>
        </ul> <!-- end hero-social -->

        <!--<div class="hero-scroll">
            <a href="#about" class="scroll-link smoothscroll">
                Scroll For More
            </a>
        </div> <!-- end hero-scroll -->

    </section> <!-- end s-hero -->


    <!-- connect
    ================================================== -->

    <!-- series
    ================================================== -->
    <section class="s-series" id="about" style="display:none;">

        <div class="series-img" id="user_info" style="background-image: url('images/character/img_index_v2.jpg');background-position:85%;"></div>

        <div class="row row-y-center series-content">

            <div class="column large-half medium-full">
                <h3 class="subhead" id="server">Current Series</h3>
                <h2 id="nickname">Shape Your Life with the Words of Life.</h2>
                <p id="property">
                Aut sed amet et quis aliquid laborum minus consequatur. Animi repellendus quas. 
                Est voluptates minima ut dolorum aliquid sint. Ratione et et molestias rerum 
                quibusdam. Deserunt suscipit ut expedita. Non numquam aut eum perferendis 
                molestiae praesentium aliquid voluptatum numquam dolorum aliquid sint minima.
                </p>
            </div> <!-- end column -->

            <div class="column large-half medium-full">
                <div class="series-content__buttons">
                    <div id="character_img"></div>
                    <a href="javascript:;" class="btn btn--large h-full-width engrave_div">각인 더보기 ▽</a>
                    <div class="engrave off" >

                    </div>
                    <a href="javascript:;" class="btn btn--large h-full-width item_div">장비 더보기 ▽</a>
                    <div class="item_img off" >

                    </div>
                </div>
                

                <div class="series-content__subscribe">
                    <p>
                    Never missed a message. Subscribe to our YouTube and Podcast channels.
                    </p>
                    
                    <ul class="series-content__subscribe-links">
                        <li class="ss-apple-podcast"><a href="#0">Apple Podcast</a></li>
                        <li class="ss-spotify"><a href="#0">Spotify</a></li>
                        <li class="ss-soundcloud"><a href="#0">SoundCloud</a></li>
                        <li class="ss-youtube"><a href="#0">Youtube</a></li>
                    </ul>
                </div>
            </div> <!-- end column -->
            
        </div> <!-- series-content -->

    </section> <!-- end s-series -->

    <section class="s-events" id="collect_section" style="display:none;padding-top:0;">
        <div id="user_info_sub"></div>

        <!--<div class="row events-header">
            <div class="column">
                <h2 class="subhead">Island</h2>
            </div>
        </div> <!-- end event-header -->
        <div class="padding_top_15" style=""></div>
        <center>
        <div class="row" style="display:contents;">
            <ul class="collect_menu" style="">
                <li class="island_div on">섬의 마음</li>
                <li class="star_div">오르페우스의 별</li>
                <li class="art_div">위대한 미술품</li>
                <li class="heart_div">거인의 심장</li>
                <li class="tour_div">항해 모험물</li>
                <li class="seed_div">모코코 씨앗</li>
                <li class="token_div">이그네아의 증표</li>
                <li class="leaf_div">세계수의 잎</li>
            </ul>
        </div>
        </center>

        <?php
            $coll_arr = array();
            $coll_arr[0]["name"] = "island";
            $coll_arr[0]["name_kr"] = "섬의 마음";
            $coll_arr[0]["num"] = 1;

            $coll_arr[1]["name"] = "star";
            $coll_arr[1]["name_kr"] = "오르페우스의 별";
            $coll_arr[1]["num"] = 2;

            $coll_arr[2]["name"] = "heart";
            $coll_arr[2]["name_kr"] = "거인의 심장";
            $coll_arr[2]["num"] = 3;

            $coll_arr[3]["name"] = "art";
            $coll_arr[3]["name_kr"] = "위대한 미술품";
            $coll_arr[3]["num"] = 4;

            $coll_arr[4]["name"] = "seed";
            $coll_arr[4]["name_kr"] = "모코코 씨앗";
            $coll_arr[4]["num"] = 5;

            $coll_arr[5]["name"] = "tour";
            $coll_arr[5]["name_kr"] = "항해 모험물";
            $coll_arr[5]["num"] = 6;

            $coll_arr[6]["name"] = "token";
            $coll_arr[6]["name_kr"] = "이그네아의 증표";
            $coll_arr[6]["num"] = 7;

            $coll_arr[7]["name"] = "leaf";
            $coll_arr[7]["name_kr"] = "세계수의 잎";
            $coll_arr[7]["num"] = 8;

            for($coll_cnt=0; $coll_cnt<count($coll_arr); $coll_cnt++) {
        ?>
        <div class="row block-large-1-2 block-900-full events-list collect_div" id="<?=$coll_arr[$coll_cnt]["name"]?>_div" style="">
            <h2 class="display-1 events-list__item-title collect_title">
                <?=$coll_arr[$coll_cnt]["name_kr"]?>
            </h2>
            <ul class="events-list__meta" style="width:100%">
                <li class=""><?=$coll_arr[$coll_cnt]["name_kr"]?> 획득 현황 : <b class="<?=$coll_arr[$coll_cnt]["name"]?>_collect"></b></li>
            </ul>
            <div class="column events-list__item">
                <p class="<?=$coll_arr[$coll_cnt]["name"]?>_img">
                    <img src="<?=base_img?>/images/<?=$coll_arr[$coll_cnt]["name"]?>.png" style="margin:0 auto;display:flex;width:40rem" alt="<?=$coll_arr[$coll_cnt]["name_kr"]?>">
                </p>
              
            </div> <!-- end events-list__item -->
            <div class="column events-list__item <?=$coll_arr[$coll_cnt]["name"]?>_class" style="">
                <p class="<?=$coll_arr[$coll_cnt]["name"]?>_zone">
                    <a href="javascript:;" class="btn btn--primary h-full-width">+ 자세히보기</a>
                </p>
                
            </div> <!-- end events-list__item -->
        </div>
        <?php
            }
        ?>

        
        </div> <!-- end events-list -->
    </section> <!-- end s-events -->

    <!-- events
    ================================================== -->




    <!-- Social
    ================================================== -->
    <section class="s-social" style="display:none;" id="social_section">
            
        <div class="row social-content">
            <div class="column">
                <ul class="social-list">
                    <li class="social-list__item">
                        <a href="#0" title="">
                            <span class="social-list__icon social-list__icon--facebook"></span>
                            <span class="social-list__text">Facebook</span>
                        </a>
                    </li>
                    <li class="social-list__item">
                        <a href="#0" title="">
                            <span class="social-list__icon social-list__icon--twitter"></span>
                            <span class="social-list__text">Twitter</span>
                        </a>
                    </li>
                    <li class="social-list__item">
                        <a href="#0" title="">
                            <span class="social-list__icon social-list__icon--instagram"></span>
                            <span class="social-list__text">Instagram</span>
                        </a>
                    </li>
                    <li class="social-list__item">
                        <a href="#0" title="">
                            <span class="social-list__icon social-list__icon--email"></span>
                            <span class="social-list__text">Email</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div> <!-- end social-content -->

    </section> <!-- end s-social -->


    <!-- footer
    ================================================== -->
    <footer class="s-footer">

        <div class="row footer-top">
            <div class="column large-4 medium-5 tab-full">
                <div class="footer-logo">
                    <a class="site-footer-logo" href="index.html">
                        <img src="images/logo.svg" alt="Homepage">
                    </a>
                </div>  <!-- footer-logo -->
                <p>
                Laborum ad explicabo. Molestiae voluptates est. Quisquam labore tenetur 
                et assumenda voluptatibus a beatae. Rerum odio ducimus reprehenderit 
                sit animi laborum nostrum dolorum animi voluptates est voluptatibus a beatae. 
                </p>
            </div>
            <div class="column large-half tab-full">
                <div class="row">
                    <div class="column large-7 medium-full">
                        <h4 class="h6">Our Location</h4>
                        <p>
                        1600 Amphitheatre Parkway <br>
                        Mountain View, California <br>
                        94043 US
                        </p>
        
                        <p>
                        <a href="https://goo.gl/maps/bc7C7eYtSmnNs6216" target="_blank" class="btn btn--footer">Get Direction</a>
                        </p>
                    </div>
                    <div class="column large-5 medium-full">
                        <h4 class="h6">Quick Links</h4>
                        <ul class="footer-list">
                            <li><a href="index.html">Home</a></li>
                            <li><a href="about.html">About</a></li>
                            <li><a href="volunteer.html">Volunteer</a></li>
                            <li><a href="connect-group.html">Connect Groups</a></li>
                            <li><a href="events.html">Upcoming Events</a></li>
                            <li><a href="contact.html">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> <!-- end footer-top -->

        <div class="row footer-bottom">
            <div class="column ss-copyright">
                <span>© Copyright Hesed 2019</span> 
                <span>Design by <a href="https://www.styleshout.com/">StyleShout</a></span>
            </div>
        </div> <!-- footer-bottom -->

        <div class="ss-go-top">
            <a class="smoothscroll" title="Back to Top" href="#top">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0l8 9h-6v15h-4v-15h-6z"/></svg>
            </a>
        </div> <!-- ss-go-top -->

    </footer> <!-- end s-footer -->


    <!-- Java Script
    ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
    <script src="js/total.js"></script>

    <script type="text/javascript">
        $(".show_div").hover(function(e) {
            $($(this).data("tooltip")).stop().show(200);
        }, function() {
            $($(this).data("tooltip")).hide();
        });
        /*$(document).ready(function (){
            $("#property > div").hover(function (){
                //alert("aa");
                $(".profile-ability-tooltip ul").show();
            }, function() {
                $(".profile-ability-tooltip ul").hide();
            });
        })*/
        $(document).ready(function (){
            $(".block-large-1-2").hide();
            $("#island_div").show();
            $(".collect_menu li").click( function(){
                if(!$(this).hasClass("on")) {
                    $(".block-large-1-2").hide();
                    var div_class = $(this).attr("class");
                    $("#"+div_class).show();
                    $(".collect_menu li").removeClass("on");
                    $(this).addClass("on");
                }
            })
        })
        $(".engrave_div").click( function(){
            if($(".engrave").hasClass("on")) {
                $(".engrave_div").html("각인 더보기 ▽");
                $(".engrave").addClass("off");
                $(".engrave").removeClass("on");
            } else {
                $(".engrave_div").html("각인 더보기 △");
                $(".engrave").addClass("on");
                $(".engrave").removeClass("off");
            }
        })
        $(".item_div").click( function(){
            if($(".item_img").hasClass("on")) {
                $(".item_div").html("장비 더보기 ▽");
                $(".item_img").addClass("off");
                $(".item_img").removeClass("on");
            } else {
                $(".item_div").html("장비 더보기 △");
                $(".item_img").addClass("on");
                $(".item_img").removeClass("off");
            }
        })

    </script>

</body> 