@extends('admin.slider.base')

@section('body')
@if($slider->id!=NULL)
{{Form::open(array('url' => '/admin/slider/'.$slider->id, 'method' => 'put', 'files'=>true))}}
@else
{{Form::open(array('url' => '/admin/slider/-1', 'method' => 'put' ,'files' => true))}}
@endif
@if(isset($err_msgs))
@foreach($err_msgs->all() as $message)
<div class='row form-errors'>{{{$message}}}</div>
@endforeach
@endif
<div class="row">
    <div class="col-lg-6">
        @include('admin.general.form_gallery',array('gallery_id'=>'slider', 'obj'=>$slider))

    </div>
    <div class="col-lg-6">
        @include('admin.general.form_tag', array('tag_id'=>'slider-tag', 'obj'=>$slider, 'model'=>'Slider'))
    </div>
</div>
<div class='row'>{{ Form::submit(trans('general.save'),array('class' => 'btn btn-default form-control'));}}</div>
{{ Form::close() }}
@stop