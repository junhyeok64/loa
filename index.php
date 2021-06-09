<?php
    $dbconn = mysqli_connect("localhost", "root", "password1", "lostark");
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

        }
        #user_info {padding-top:30px;}
        .island_zone {font-size:15px; padding:0px 30px;}
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
                    <a href="javascript:;" class="btn btn--stroke hover_div" data-tooltip="#about">Adventure Island</a>
                    <a href="https://lostark.game.onstove.com/Main" class="btn btn--stroke" target="_blank">Official Page</a>
                </div>
            </div> <!-- end hero-content__text -->

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

        <div class="hero-scroll">
            <a href="#about" class="scroll-link smoothscroll">
                Scroll For More
            </a>
        </div> <!-- end hero-scroll -->

    </section> <!-- end s-hero -->


    <!-- about
    ================================================== -->
    <section id="about" class="s-about" style="position:fixed;width:500rem;z-index:999">
        <div class="row row-y-center about-content">
            <div class="column large-half medium-full">
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
                </ul>
            </div>
            <div class="column large-half medium-full">
                <ul class="about-sched">
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
        </div> <!-- end about-content -->
    </section> <!-- end s-about -->


    <!-- connect
    ================================================== -->

    <!-- series
    ================================================== -->
    <section class="s-series">

        <div class="series-img" style="background-image: url('images/character/img_index_v4.jpg');background-position:85%;"></div>

        <div class="row row-y-center series-content">

            <div class="column large-half medium-full">
                <h3 class="subhead">Current Series</h3>
                <h2>Shape Your Life with the Words of Life.</h2>
                <p>
                Aut sed amet et quis aliquid laborum minus consequatur. Animi repellendus quas. 
                Est voluptates minima ut dolorum aliquid sint. Ratione et et molestias rerum 
                quibusdam. Deserunt suscipit ut expedita. Non numquam aut eum perferendis 
                molestiae praesentium aliquid voluptatum numquam dolorum aliquid sint minima.
                </p>
            </div> <!-- end column -->

            <div class="column large-half medium-full">
                <div class="series-content__buttons">
                    <a href="" class="btn btn--large h-full-width">Watch the Video</a>
                    <a href="" class="btn btn--large h-full-width">Listen To the Message</a>
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

    <section class="s-events" id="user_info">

        <!--<div class="row events-header">
            <div class="column">
                <h2 class="subhead">Island</h2>
            </div>
        </div> <!-- end event-header -->
        <div style="padding-top:15rem;"></div>

        <div class="row block-large-1-2 block-900-full events-list">

            <div class="column events-list__item">
                <h3 class="display-1 events-list__item-title">
                    <a href="#0" title="">섬의 마음</a>
                </h3>
                <ul class="events-list__meta">
                    <li class="">Total : <div class="island_total"></div></li>
                    <li class="">Collect : <div class="island_collect"></div></li>
                </ul>
                <?php
                    $island_qry = "select * from `gather` where 1=1 ";
                    $island_res = mysqli_query($dbconn, $island_qry);
                    $island_view = "";
                    $island_preview = "";
                    $island_cnt = 0;
                    while($island_row = mysqli_fetch_array($island_res)) {
                        if($island_cnt < 9) {
                            $island_preview .= $island_row["name"]."</br>";
                        }
                        $island_view .= $island_row["name"]."</br>";
                        $island_cnt++;
                    }
                ?>
                <p class="island_zone">
                    <?php
                       /* echo $island_preview;
                        echo "...";*/
                    ?>
                    <a href="javascript:;" class="btn btn--primary h-full-width">+ 자세히보기</a>
                </p>
                
            </div> <!-- end events-list__item -->

            <div class="column events-list__item">
                <h3 class="display-1 events-list__item-title">
                    <a href="#0" title="">오르페우스의 별</a>
                </h3>
                <ul class="events-list__meta">
                    <li class="">Total : <div class="island_total"></div></li>
                    <li class="">Collect : <div class="island_collect"></div></li>
                </ul>
                <p class="island_zone">
                    <?php
                       /* echo $island_preview;
                        echo "...";*/
                    ?>
                    <a href="javascript:;" class="btn btn--primary h-full-width">+ 자세히보기</a>
                </p>
            </div> <!-- end events-list__item -->

            <div class="column events-list__item">
                <h3 class="display-1 events-list__item-title">
                    <a href="#0" title="">위대한 미술품</a>
                </h3>
                <ul class="events-list__meta">
                    <li class="">Total : <div class="island_total"></div></li>
                    <li class="">Collect : <div class="island_collect"></div></li>
                </ul>
                <p class="island_zone">
                    <?php
                       /* echo $island_preview;
                        echo "...";*/
                    ?>
                    <a href="javascript:;" class="btn btn--primary h-full-width">+ 자세히보기</a>
                </p>
            </div> <!-- end events-list__item -->

            <div class="column events-list__item">
                <h3 class="display-1 events-list__item-title">
                    <a href="#0" title="">거인의 심장</a>
                </h3>
                <ul class="events-list__meta">
                    <li class="">Total : <div class="island_total"></div></li>
                    <li class="">Collect : <div class="island_collect"></div></li>
                </ul>
                <p class="island_zone">
                    <?php
                       /* echo $island_preview;
                        echo "...";*/
                    ?>
                    <a href="javascript:;" class="btn btn--primary h-full-width">+ 자세히보기</a>
                </p>
            </div> <!-- end events-list__item -->

            <div class="column events-list__item">
                <h3 class="display-1 events-list__item-title">
                    <a href="#0" title="">항해 모험물</a>
                </h3>
                <ul class="events-list__meta">
                    <li class="">Total : <div class="island_total"></div></li>
                    <li class="">Collect : <div class="island_collect"></div></li>
                </ul>
                <p class="island_zone">
                    <?php
                       /* echo $island_preview;
                        echo "...";*/
                    ?>
                    <a href="javascript:;" class="btn btn--primary h-full-width">+ 자세히보기</a>
                </p>
            </div> <!-- end events-list__item -->
        </div> <!-- end events-list -->
    </section> <!-- end s-events -->

    <!-- events
    ================================================== -->




    <!-- Social
    ================================================== -->
    <section class="s-social">
            
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

</body>