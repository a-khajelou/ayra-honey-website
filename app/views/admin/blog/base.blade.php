@extends('admin.base')
@section('head_sub_menu')
<a class="btn btn-success" href="/admin/blog/create"><i>{{trans('general.add_type')}}</i></a>
<a class="btn btn-primary" href="/admin/blog/"><i>{{trans('general.show_list')}}</i></a>
<a class="btn btn-warning" href="/admin/blog?deleted=true"><i>{{trans('general.deleted')}}</i></a>
@stop