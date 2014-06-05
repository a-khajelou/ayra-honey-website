@extends('public.base')
@section('body')
<div class="container_12">
    <div class="grid_12">

        <img src="/static/images/big_pic1.jpg" alt="" class="img3">

        <div class="wrapper">
            <div class="grid_4 alpha">
                <h2 style="">{{trans('general.contact_us')}}</h2>
                <figure>
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
                    <div style="overflow:hidden;height:224px;width:224px;">
                        <div id="gmap_canvas" style="height:224px;width:224px;"></div>
                        <style>#gmap_canvas img {
                                max-width: none !important;
                                background: none !important
                            }</style>
                        <a class="google-map-code" href="http://www.leaksmirror.com" id="get-map-data">http://www.leaksmirror.com</a>
                    </div>
                    <script type="text/javascript"> function init_map() {
                            var myOptions = {zoom: 11, center: new google.maps.LatLng(35.6907189, 51.257945199999995), mapTypeId: google.maps.MapTypeId.ROADMAP};
                            map = new google.maps.Map(document.getElementById("gmap_canvas"), myOptions);
                            marker = new google.maps.Marker({map: map, position: new google.maps.LatLng(35.6907189, 51.257945199999995)});
                            infowindow = new google.maps.InfoWindow({content: "<b>Error SWG Co</b><br/>Tehransar<br/> Tehran,Iran" });
                            google.maps.event.addListener(marker, "click", function () {
                                infowindow.open(map, marker);
                            });
                            infowindow.open(map, marker);
                        }
                        google.maps.event.addDomListener(window, 'load', init_map);</script>
                    <!--                    <iframe src="http://maps.google.com/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Tehran,+Iran&amp;aq=0&amp;sll=37.0625,-95.677068&amp;sspn=61.282355,146.513672&amp;ie=UTF8&amp;hq=&amp;hnear=Brooklyn,+Kings,+New+York&amp;ll=40.649974,-73.950005&amp;spn=0.01628,0.025663&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe>-->
                </figure>
                <address>
                    <dl>
                        <dt>Error SWG Inc.<br>Tehran, Iran ,<br>[some other address :D] .</dt>
                        <dd><span>{{trans('general.phone')}}:</span> +98 939 979 1134</dd>
                        <dd><span>{{trans('general.phone')}}:</span> +98 939 979 1134</dd>
                        <dd><span>{{trans('general.phone')}}:</span> +98 939 979 1134</dd>
                        <dd>{{trans('general.email')}}: <a href="#" class="link1">info@ayrahoneyhouse.com</a></dd>
                    </dl>
                </address>
            </div>


            <div class="grid_7 prefix_1 omega">
                <h2>{{trans('general.get_in_touch')}}</h2>

                <form id="form">
                    <div class="success_wrapper">
                        <div class="success">Contact form submitted!<br>
                            <strong>We will be in touch soon.</strong></div>
                    </div>
                    <fieldset>
                        <label class="name">
                            <input type="text" value="{{trans('general.name')}}:">
                            <br class="clear">
                            <span class="error error-empty">*This is not a valid name.</span><span
                                class="empty error-empty">*This field is required.</span>
                        </label>
                        <label class="email">
                            <input type="text" value="{{trans('general.email')}}:">
                            <br class="clear">
                            <span class="error error-empty">*This is not a valid email address.</span><span
                                class="empty error-empty">*This field is required.</span>
                        </label>
                        <label class="phone">
                            <input type="tel" value="{{trans('general.phone')}}:">
                            <br class="clear">
                            <span class="error error-empty">*This is not a valid phone number.</span><span
                                class="empty error-empty">*This field is required.</span>
                        </label>
                        <label class="message">
                            <textarea>{{trans('general.phone')}}:</textarea>
                            <br class="clear">
                            <span class="error">*The message is too short.</span> <span class="empty">*This field is required.</span>
                        </label>

                        <div class="clear"></div>
                        <div class="btns">
                            <a data-type="submit" class="more_btn2">{{trans('general.submit')}}</a>
                            <a data-type="reset" class="more_btn2">{{trans('general.clear')}}</a>
                        </div>
                    </fieldset>
                </form>
            </div>


        </div>


    </div>
</div>

</div>
@stop
@section('js')
<script type="text/javascript">
    $(document).ready(function () {
        $('#form').forms({
            ownerEmail: '#'
        })
    })
</script>
@stop