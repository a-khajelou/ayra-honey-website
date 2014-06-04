@extends('admin.honey.base')
@section('body')
@if($obj->id!=NULL)
{{Form::open(array('url' => '/admin/honey/'.$obj->id, 'method' => 'put', 'files'=>true))}}
@else
{{Form::open(array('url' => '/admin/honey/-1', 'method' => 'put' ,'files' => true))}}
@endif
@if(isset($err_msgs))
@foreach($err_msgs->all() as $message)
<div class='row form-errors'>{{{$message}}}</div>
@endforeach
@endif
<div class="row">
    <div class="col-lg-6">
        @include('admin.general.form_gallery',array('gallery_id'=>'honey', 'obj'=>$obj))
        @include('admin.general.form_tag', array('tag_id'=>'honey', 'obj'=>$obj, 'model'=>'Honey'))
    </div>
    <div class="col-lg-6">
        <div class="form-group input-group">
            <input name="en_title" placeholder="title (english)" @if($obj->id!=NULL) value="{{$obj->getAttr('title' , 'en')}}"@endif>
        </div>
        <div class="form-group input-group">
            <input name="ru_title" placeholder="название (русский)" @if($obj->id!=NULL) value="{{$obj->getAttr('title' , 'ru')}}"@endif>
        </div>
        <div class="form-group input-group">
            <textarea cols="50" rows="10" name="en_description" placeholder="description (english)">@if($obj->id!=NULL){{$obj->getAttr('description','en')}}@endif</textarea>
        </div>
        <div class="form-group input-group">
            <textarea cols="50" rows="10" name="ru_description" placeholder="описание (русский)">@if($obj->id!=NULL){{$obj->getAttr('description','ru')}}@endif</textarea>
        </div>

    </div>
</div>
<div class='row'>{{ Form::submit(trans('general.save'),array('class' => 'btn btn-default form-control'));}}</div>
{{ Form::close() }}
@stop