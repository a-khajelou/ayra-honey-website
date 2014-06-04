@extends('admin.base')
@section('head_sub_menu')
<a class="btn btn-success" href="/admin/honey/create"><i>{{trans('general.add_type')}}</i></a>
<a class="btn btn-primary" href="/admin/honey/"><i>{{trans('general.show_list')}}</i></a>
<a class="btn btn-warning" href="/admin/honey?deleted=true"><i>{{trans('general.deleted')}}</i></a>
@stop