@extends('admin.honey.base')
@section('body')
<?php
	$counter = 1;
    if (Input::has('page'))
       $counter+=Honey::$paginate_per_page*(Input::get('page')-1);
    $removeOrDelete='remove';
    if(Input::has('deleted'))
        $removeOrDelete='retweet';
?>
<div class="table-responsive">	
	<table class="table table-striped table-hover tablesorter">
		<thead>
			<tr>
				<th class='header'>#</th>
                <th class="header">{{trans('general.title')}}</th>
				@if(Input::has('deleted') || (Input::has('page_mode') && Input::get('page_mode')=='deleted'))
					<th class='header'>{{trans('general.restore')}}<i class="fa fa-sort"></i></th>
				@endif
				<th class='header'>{{trans('general.delete')}}<i class="fa fa-sort"></i></th>
				<th class='header'>{{trans('general.edit')}}<i class="fa fa-sort"></i></th>
			</tr>
		</thead>
		<tbody>
		@foreach ($all_objs as $obj)
			<tr>
    			<td>{{{$counter}}}</td>
                <td>{{$obj->getAttr('title')}}</td>
    			<td>
    				{{Form::open(array('url' => '/admin/slider/'.$obj->id, 'method' => 'delete'))}}
    					<button type="submit" class="btn btn-warning" >
						  <span class="glyphicon glyphicon-{{$removeOrDelete}}"></span>
						</button>
    				{{Form::close()}}
    			</td>
    			@if(Input::has('deleted') || (Input::has('page_mode') && Input::get('page_mode')=='deleted'))
    			<td>
    				{{Form::open(array('url' => '/admin/honey/'.$obj->id.'?forcedelete=true', 'method' => 'delete'))}}
    					<button type="submit" class="btn btn-danger" >
						  <span class="glyphicon glyphicon-remove"></span>
						</button>
    				{{Form::close()}}
    			</td>
    			@endif
    			<td>
    				{{Form::open(array('url' => '/admin/honey/'.$obj->id.'/edit', 'method' => 'get'))}}
    					<button type="submit" class="btn btn-info" >
						  <span class="glyphicon glyphicon-pencil"></span>
						</button>
    				{{Form::close()}}

    			</td>
    		</tr>
    		<?php $counter++;?>
    	@endforeach
    	</tbody>
    </table>
</div>
@stop