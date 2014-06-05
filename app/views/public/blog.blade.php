@extends('public.base')
@section('body')
<!--=======content================================-->

<div class="container_12">
    <div class="grid_12">

        <img src="/static/images/big_pic1.jpg" alt="" class="img3">


        <div class="grid_8 alpha">
            <h2>{{trans('general.our_blog')}}</h2>
            @foreach(Blog::whereLang(App::getLocale())->get() as $blogPost)
            <div class="wrapper marBot2">

                <h3 class="v2"><a href="#" class="link3">{{$blogPost->title}}</a></h3>

                <div spellcheck="false"
                     contenteditable="false"
                     class="text-container cke_editable cke_editable_themed cke_contents_ltr cke_show_borders">
                    <div id="short-text">{{substr($blogPost->content,0,300)}}</div><div id="complete-text">{{substr($blogPost->content,300,strlen($blogPost->content))}}</div>
                    <a id="toggle-button" class="more_btn2">Read More</a>
                </div>
            </div>
            <br/>
            <hr/>
            @endforeach

        </div>


        <div class="grid_4 omega">
            <h2>Categories</h2>
            <ul class="listWithMarker">
                <li><i class="icon-caret-right"></i><a href="#">Praesent vestibulum molestie</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Aenean nonummy hendrerit</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Vivamus eget nibh</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Etiam cursus leo vel metus</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Nulla facilisi</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Aenean nec eros</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Vestibulum ante ipsum primis</a></li>
                <li><i class="icon-caret-right"></i><a href="#">In faucibus orci luctus et</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Ultrices posuere cubilia Curae</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Suspendisse sollicitudin velit sed leo</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Ut pharetra augue nec augue</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Nam elit agna,endrerit sit amet</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Tincidunt ac, viverra sed, nulla</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Donec porta diam eu massa</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Quisque diam lorem</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Interdum vitae,dapibus ac</a></li>
                <li><i class="icon-caret-right"></i><a href="#">Scelerisque vitae, pede</a></li>
            </ul>

            <h2>Archive</h2>
            <ul class="listWithMarker">
                <li><i class="icon-caret-right"></i><a href="#">April 2013</a></li>
                <li><i class="icon-caret-right"></i><a href="#">March 2013</a></li>
                <li><i class="icon-caret-right"></i><a href="#">February 2013</a></li>
                <li><i class="icon-caret-right"></i><a href="#">January 2013</a></li>
                <li><i class="icon-caret-right"></i><a href="#">December 2012</a></li>
                <li><i class="icon-caret-right"></i><a href="#">November 2012</a></li>
                <li><i class="icon-caret-right"></i><a href="#">October 2012</a></li>
                <li><i class="icon-caret-right"></i><a href="#">September 2012</a></li>
            </ul>
        </div>


    </div>
</div>

</div>
@stop
@section('js')
<script>
    $(document).ready(function () {
        $('[id=complete-text]').addClass('hide');
        $('[id=toggle-button]').on('click', function () {
            if ($(this).text() == 'Read More') {
                $(this).html('Read Less');
            } else {
                $(this).html('Read More');
            }
            $(this).prev('#short-text').toggleClass('hide');
            $(this).prev('#complete-text').toggleClass('hide');
        });
    });
</script>
@stop