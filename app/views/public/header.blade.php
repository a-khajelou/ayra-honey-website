<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=UTF-8"/>

<head>
    <title>AyRa Honey House - Bee Healthy</title>
    <meta charset="utf-8">
    <meta name="format-detection" content="telephone=no"/>

    <link type="text/css" rel="stylesheet" href="http://localhost:8080/static/ckeditor/contents.css?t=E4KA">
    <link rel="icon" href="/static/images/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/static/images/favicon.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="/static/css/style.css">

    <script src="/static/js/jquery.js"></script>
    <script src="/static/js/jquery-migrate-1.1.1.js"></script>
    <script src="/static/js/jquery.easing.1.3.js"></script>
    <script src="/static/js/scroll_to_top.js"></script>
    <script src="/static/js/script.js"></script>
    <script src="/static/js/sForm.js"></script>
    <script src="/static/js/forms.js"></script>
    <script src="/static/js/jquery.equalheights.js"></script>
    <script src="/static/js/superfish.js"></script>
    <script src="/static/js/jquery.mobilemenu.js"></script>
    <script src="/static/js/touchTouch.jquery.js"></script>
    <script src="/static/js/jquery.fancybox.pack.js"></script>

    <!-- font-awesome font -->
    <link rel="stylesheet" href="/static/font/font-awesome.css" type="text/css" media="screen">
    <!-- fontello font -->

    <script src="/static/js/camera.js"></script>
    <!--[if (gt IE 9)|!(IE)]><!-->
    <script src="/static/js/jquery.mobile.customized.min.js"></script>
    <!--<![endif]-->

    <script src="/static/js/jquery.carouFredSel-6.1.0.js"></script>
    <script src="/static/js/jquery.touchSwipe.min.js"></script>

    <!--[if lt IE 8]>
    <div style=' clear: both; text-align:center; position: relative;'>
        <a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
            <img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0"
                 height="42" width="820"
                 alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
        </a>
    </div>
    <![endif]-->
    <!--[if lt IE 9]>
    <script src="/static/js/html5shiv.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="/static/css/ie.css">
    <![endif]-->
</head>
<body>
<!--button back top-->
<div id="back-top"></div>
<div class="main">
    <div class="div-content">
        <!--
                <div class="container_12" style="width: 100%">
                    <div class="grid_12" style="margin: 0; width: 100%">
                        <div class="top_section">
                            <h1><a href="index-2.html"></a></h1>



                            <div class="clear"></div>
                        </div>
                    </div>
                </div>-->
        <img src="/static/img/header.png" alt="Mellis" style="width: 100%">

        <div class="flags">
            <a href="/set-locale?dest=en"> <img src="/static/img/United Kingdom(Great Britain).png" title="English"
                                                style="width:inherit;outline: none;"></a>
            &nbsp;
            <a href="/set-locale?dest=ru"> <img src="/static/img/Russian Federation.png" title="Russian"
                                                style="width:inherit;outline: none;"> </a>

        </div>

        <!--==============================header=================================-->
        <header>

            <div class="container_12">
                <div class="grid_12">
                    <nav>
                        <ul class="sf-menu header_menu">
                            <li
                            @if(Request::is('about-us'))class="current"@endif><a href="/about-us">{{trans('general.about_us')}}<strong></strong></a></li>
                            <li
                            @if(Request::is('honey-products'))class="current"@endif><a
                                href="/honey-products"><span></span>{{trans('general.honey_products')}}<strong></strong></a>
                            <!--                                <ul class='submenu'>
                                                                <li><a href="#">Vestibulum iaculis</a></li>
                                                                <li class='sub-menu'><a href="#">Fusce euismod conuat</a>
                                                                    <ul class='submenu2'>
                                                                        <li><a href="#">Pellentesque sed</a></li>
                                                                        <li><a href="#">Aliquam congue ferm</a></li>
                                                                        <li><a href="#">Mauris accum</a></li>
                                                                    </ul>
                                                                </li>
                                                                <li><a href="#">Pellentesque</a></li>
                                                            </ul>-->
                            </li>

                            <li
                            @if(Request::is('bees'))class="current"@endif><a
                                href="/blog">{{trans('general.blog')}}<strong></strong></a></li>
                            <li
                            @if(Request::is('ordering'))class="current"@endif><a href="/ordering">{{trans('general.ordering')}}<strong></strong></a></li>
                            <li
                            @if(Request::is('contact-us'))class="current"@endif><a href="/contact-us">{{trans('general.contact_us')}}<strong></strong></a></li>
                        </ul>
                    </nav>

                    <form id="search" action="http://www.google.com/search" method="GET"
                          accept-charset="utf-8">
                        <input type="text" name="q" value="" placeholder="{{trans('general.search_here')}}"
                               style=""/>
                        <input type="hidden" name="domains" value="ayra.error-swg.ir"/>
                        <input type="hidden" name="sitesearch" value="ayra.error-swg.ir"/>
                        <a onClick="document.getElementById('search').submit()"></a>
                    </form>

                </div>
            </div>
        </header>

        <div class="container_12">
            <div class="grid_12">
                <p class="under_header_txt1">{{trans('general.welcome_note')}}</p>
                <ul class="soc_icons">
                    <li><a href="#"><i class="icon-google-plus"></i></a></li>
                    <li><a href="#"><i class="icon-twitter"></i></a></li>
                    <li><a href="#"><i class="icon-facebook"></i></a></li>
                    <li><a href="#"><i class="icon-pinterest"></i></a></li>
                    <li><a href="#"><i class="icon-linkedin"></i></a></li>
                    <li><a href="#"><i class="icon-rss"></i></a></li>
                </ul>
            </div>
        </div>