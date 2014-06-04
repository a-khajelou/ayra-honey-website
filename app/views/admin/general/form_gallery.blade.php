<ol class="breadcrumb wi-devider" >
	<li class="active"><i class="fa fa-dashboard"></i>&nbsp;{{{trans('general.gallery')}}}</li>
</ol>
@if(count($obj->photos)!=0)
<div class="row">
	<div class="col-md-12 pull-left" >
		@foreach($obj->photos as $photo)
		<div class="pull-left" >
			<img src="{{{$photo->getPhotoDir($photo) }}}" style="width: 40%"/>
			<a class="wi-img-delete-btn" href="/admin/photo/{{$photo->id}}">X</a>
			<input type="hidden" name="{{{$gallery_id}}}-main-photo"
				value="{{$photo->id}}" />
		</div>
		@endforeach
	</div>
</div>
@else
<div class="row">
	<span class="form-contorl">{{{trans('general.no_photo')}}}</span>
</div>
<div class="row">
  	<div id="{{{$gallery_id}}}-gallery" class="form-group pull-left">

	  	<div class="wi-image-form input-group">
	  		<input type="hidden" name="{{{$gallery_id}}}-main-photo" value="{{{$gallery_id}}}-photo-0"/>
<!--			<span class="glyphicon glyphicon-remove wi-image-form-delete"></span>-->
			<input name="{{{$gallery_id}}}-photo-0" type="file"/>
	  	</div>

	   	<!--<a id="add_gallery_picture" data-counter='0' data-container="{{{$gallery_id}}}-gallery" data-prefix="{{{$gallery_id}}}">
	   		<span class="glyphicon glyphicon-plus"></span><label>{{{trans('general.add_picture')}}}</label>
	   	</a>-->
  	</div>
</div>
@endif
<br/>