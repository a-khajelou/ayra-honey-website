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
        @include('admin.general.form_tag', array('tag_id'=>'slider-tag', 'obj'=>$slider, 'model'=>'Slider'))
    </div>
    <div class="col-lg-6">
        <ol class="breadcrumb wi-devider" >
            <li class="active"><i class="fa fa-dashboard"></i>&nbsp;{{{trans('general.information')}}}</li>
        </ol>
        <div class="form-group input-group">
            <input type="text" name="title" placeholder="عنوان" @if($slider->id!=NULL) value="{{$slider->getTitle()}}" @endif/>
        </div>
        <div class="form-group input-group">
            <input type="text" name="url" placeholder="آدرس اینترنتی" @if($slider->id!=NULL) value="{{$slider->getUrl()}}" @endif/>
        </div>
        <div class="form-group input-group">
            <textarea cols="50" rows="10" name="description" placeholder="توضیحات">@if($slider->id!=NULL){{$slider->getDescription()}}@endif</textarea>
        </div>
    </div>
</div>
<div class='row'>{{ Form::submit(trans('general.submit'),array('class' => 'btn btn-default form-control'));}}</div>
{{ Form::close() }}
@stop