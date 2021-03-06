@extends('public.base')
@section('body')
<!--=======content================================-->
<div class="container_12">
    <div class="grid_12">
        <div class="slider_wrapper">
            <div class="" id="camera_wrap">
                @foreach(Slider::all() as $slider)
                <div data-src="{{Photo::getPhotoDir($slider->mainPhoto())}}"></div>
                @endforeach
<!--                <div data-src="/static/images/slide1.jpg"></div>
                <div data-src="/static/images/slide2.jpg"></div>
                <div data-src="/static/images/slide3.jpg"></div>
                <div data-src="/static/images/slide4.jpg"></div>
                <div data-src="/static/images/honey-slider.jpg"></div>
-->            </div>
        </div>
    </div>
</div>

<div class="container_12">
    <div class="grid_12">
        <div class="wrapper mobile_txt_cntr">
            <h2 class="v3 txt_cntr">{{trans('general.first_note')}}</h2>
            <h4 class="txt_cntr">Vivamus eget nibh. Etiam cursus leo vel metus. Nuacilisi. Aenean nec eros </h4>

            <div class="grid_3 alpha">
                <a href="#" class="img1">
                    <div class="rotate_section">
                        <img src="/static/img/page1_icon1.png" alt="" class="no_resize">
                    </div>
                </a>

                <h3>{{trans('general.about_us')}}</h3>

                <p>Quisque nestibulum libero nisl, porta vel, scelerisque eget, malada at, mus eget nibh. Etiam cursus
                    leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci
                    luctus.</p>
                <a href="#" class="more_btn2">read more</a>
            </div>

            <div class="grid_3">
                <a href="#" class="img1">
                    <div class="rotate_section">
                        <img src="/static/img/page1_icon2.png" alt="" class="no_resize">
                    </div>
                </a>

                <h3>{{trans('general.our_honey')}}</h3>

                <p>Quisque nestibulum libero nisl, porta vel, scelerisque eget, malada at, mus eget nibh. Etiam cursus
                    leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci
                    luctus.</p>
                <a href="#" class="more_btn2">read more</a>
            </div>

            <div class="grid_3">
                <a href="#" class="img1">
                    <div class="rotate_section">
                        <img src="/static/img/page1_icon3.png" alt="" class="no_resize">
                    </div>
                </a>

                <h3>{{trans('general.gallery')}}</h3>

                <p>Quisque nestibulum libero nisl, porta vel, scelerisque eget, malada at, mus eget nibh. Etiam cursus
                    leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci
                    luctus.</p>
                <a href="#" class="more_btn2">read more</a>
            </div>

            <div class="grid_3 omega">
                <a href="#" class="img1">
                    <div class="rotate_section">
                        <img src="/static/img/page1_icon4.png" alt="" class="no_resize">
                    </div>
                </a>

                <h3>{{trans('general.our_blog')}}</h3>

                <p>Quisque nestibulum libero nisl, porta vel, scelerisque eget, malada at, mus eget nibh. Etiam cursus
                    leo vel metus. Nulla facilisi. Aenean nec eros. Vestibulum ante ipsum primis in faucibus orci
                    luctus.</p>
                <a href="#" class="more_btn2">read more</a>
            </div>
        </div>


        <div class="wrapper">
            <h2 class="txt_cntr v2">{{trans('general.second_note')}}</h2>
            <h4 class="txt_cntr">Estibulum ante ipsum primis in faucibus orci luctus et ultrices posuere</h4>

            <div class="list_carousel responsive">
                <ul id="carousel">
                    @foreach(Honey::all() as $honey)
                    @if($honey->getAttr('title')!="")
                    <li>
                        <img src="{{Photo::get($honey->mainPhoto())}}" alt="">
                        <h5>{{$honey->getAttr('title')}}</h5>
                        <a href="#" class="more_btn" onclick="alert('{{trans('general.not_ready_message')}}')">{{trans('general.buy_now')}}</a>
                    </li>
                    @endif
                    @endforeach


                </ul>
                <div class="clear"></div>
                <a class="prev" id="prev" href="javascript:;"></a>
                <a class="next" id="next" href="javascript:;"></a>
            </div>


        </div>


    </div>
</div>

</div>
@stop
@section('js')
<script>
    $(window).load(function () {
        //  Responsive layout, resizing the items
        $('#carousel').carouFredSel({
            auto: false,
            responsive: true,
            width: '100%',
            scroll: 1,
            prev: '#prev',
            next: '#next',
            pagination: false,
            mousewheel: false,
            swipe: {
                onMouse: true,
                onTouch: true
            },
            items: {
                width: 140,
                height: 'auto',   //  optionally resize item-height
                visible: {
                    min: 1,
                    max: 6
                }
            }
        });


    });

</script>
<script type="text/javascript">
    $(document).ready(function () {

        jQuery('#camera_wrap').camera({
            loader: false,
            pagination: true,
            thumbnails: false,
            height: '51.8398268%',
            fx: 'mosaicSpiral',
            rows: '1',
            slicedCols: '1',
            slicedRows: '1',
            caption: false
        });

    });

    $(document).ready(function () {
        // Initialize the gallery
        $('.magnifier2').touchTouch();
    });

    $('.lightbox-video').hover(
        function () {
            $(this).find("span").stop().animate({opacity: '1'}, 400)
        },
        function () {
            $(this).find("span").stop().animate({opacity: '0'}, 400)
        }
    )


</script>
<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-7078796-5']);
    _gaq.push(['_trackPageview']);
    (function () {
        var ga = document.createElement('script');
        ga.type = 'text/javascript';
        ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0];
        s.parentNode.insertBefore(ga, s);
    })();</script>
@stop