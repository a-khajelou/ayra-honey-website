@extends('admin.blog.base')
@section('body')
@if($obj->id!=NULL)
{{Form::open(array('url' => '/admin/blog/'.$obj->id, 'method' => 'put', 'files'=>true))}}
@else
{{Form::open(array('url' => '/admin/blog/-1', 'method' => 'put' ,'files' => true))}}
@endif
@if(isset($err_msgs))
@foreach($err_msgs->all() as $message)
<div class='row form-errors'>{{{$message}}}</div>
@endforeach
@endif
<div class="row">
    <div class="col-lg-6">
        @include('admin.general.form_tag', array('tag_id'=>'blog', 'obj'=>$obj, 'model'=>'Blog'))
    </div>
    <div class="col-lg-6">
        <div class="form-group input-group">
            <input type="text" name="title" placeholder="title" @if($obj->id!=null)value="{{$obj->title}}"@endif/>
            &nbsp&nbsp
            <select name="lang">
                <option value="en">
                    English
                </option>
                <option value="ru">
                    русский
                </option>
            </select>
        </div>
        <div class="form-group input-group">
            <textarea class="text_box ckeditor" cols="80" id="content" name="content" rows="10">
                @if($obj->id!=null){{$obj->content}}@endif
            </textarea>
        </div>

    </div>
</div>
<div class='row'>{{ Form::submit(trans('general.save'),array('class' => 'btn btn-default form-control'));}}</div>
{{ Form::close() }}
@stop