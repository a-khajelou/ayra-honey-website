@extends('public.base')
@section('body')
<!--=======content================================-->


<div class="container_12">
    <div class="grid_12">

        <img src="/static/images/big_pic1.jpg" alt="" class="img3">

        <h2 class="txt_cntr">Honey Products</h2>

        <div class="wrapper">
            @foreach(Honey::all() as $honey)
            @if($honey->getAttr('title')!="")
            <div class="grid_4 alpha">
                <img src="{{Photo::get($honey->mainPhoto())}}" alt="" class="img2 no_resize">

                <div class="box">
                    <h3 class="v2">{{$honey->getAttr('title')}}</h3>

                    <p>{{$honey->getAttr('description')}}</p>
                    <a href="#" class="more_btn2">read more</a>
                </div>
            </div>
            @endif
            @endforeach

        </div>


    </div>
</div>

</div>
@stop