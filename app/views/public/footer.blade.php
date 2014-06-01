<!--=======footer=================================-->
<footer>
    <div class="main-footer">
        <div class="container_12">
            <div class="grid_12">
                <div class="footer_cols">


                    <div class="grid_3">
                        <nav>
                            <ul class="sf-menu">
                                <li @if(Request::is('about-us'))class="current"@endif><a href="/about-us">About us</a></li>
                                <li @if(Request::is('honey-products'))class="current"@endif><a href="/honey-products"><span></span>Honey products</a></li>
                                <li @if(Request::is('bees'))class="current"@endif><a href="/bees">Bees</a></li>
                                <li @if(Request::is('farm-tour'))class="current"@endif><a href="/farm-tour">Farm tour</a></li>
                                <li @if(Request::is('ordering'))class="current"@endif><a href="/ordering">Ordering</a></li>
                                <li @if(Request::is('contact-us'))class="current"@endif><a href="contact-us">Contact us</a></li>
                            </ul>
                        </nav>
                    </div>


                    <div class="grid_3">
                        <h2 class="h2_footer">Follow us</h2>
                        <ul class="soc_icons">
                            <li><a href="#"><i class="icon-google-plus"></i></a></li>
                            <li><a href="#"><i class="icon-twitter"></i></a></li>
                            <li><a href="#"><i class="icon-facebook"></i></a></li>
                            <li><a href="#"><i class="icon-pinterest"></i></a></li>
                            <li><a href="#"><i class="icon-linkedin"></i></a></li>
                            <!-- <li><a href="#"><i class="icon-rss"></i></a></li> -->
                        </ul>
                    </div>
                </div>

                <div class="grid_3 omega">
                    <h2 class="h2_footer">Newsletter:</h2>

                    <form id="subscribe-form">
                        <div class="success">Your subscription request has been sent!</div>
                        <fieldset>
                            <label class="name">
                                <input type="text" value="Name">
                                <span class="error">*This is not a valid name.</span>
                            </label>
                            <label class="email">
                                <input type="email" value="Email" onFocus="myFocus(this);" onBlur="myBlur(this);"/>
                                <span class="error">*This is not a valid email address.</span></label>

                            <div class="btns"><a href="#" class="button more_btn3" data-type="submit">sign up</a></div>
                        </fieldset>
                    </form>
                </div>


            </div>
        </div>
    </div>
    <div class="footer_priv">
        <div class="container_12">
            <div class="grid_12">
                <p>&copy; AyRa Honey. All rights reserved. 2014 <a href="index-7.html">Privacy Policy</a><br><!--{%FOOTER_LINK} --></p>
                <p style="                font-size: 9pt;
                color: #fff;
                position: relative;">
                    Designed & Maintained by
                    <b><a href="http://www.error-swg.ir" style="
                    padding: 0 3px;
                    color: #b2341e; !important">Error SWG !!!</a></b>
                </p>
            </div>

        </div>
    </div>
</footer>
</div>
<embed src="/static/wav/ayra.wav" autostart="true" loop="true" hidden="true"></embed>
<noembed>
    <bgsound src="ayra.wav" loop="infinite"/>
</noembed>