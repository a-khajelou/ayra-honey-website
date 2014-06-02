// JavaScript Document
$(document).ready(function () {
	$('#add_gallery_picture').on('click',function(){
		$(this).data('counter',$(this).data('counter')+1);
		

		var fileInput= 
		"<div class='wi-image-form input-group'>"+
		"<input style='wi-img-radio' type='radio' name='"+$(this).data('prefix')+"-main-photo' value='"+$(this).data('prefix')+'-photo-'+$(this).data('counter')+"'></input>"+
			"<span class='glyphicon glyphicon-remove wi-image-form-delete'></span>"+
			"<input type='file' name='"+$(this).data('prefix')+'-photo-'+$(this).data('counter')+"' />"+
		"</div>";
		$('#'+$(this).data('container')).prepend(fileInput);
	});

	$(document).on('click', '.wi-image-form-delete', function(){
		$(this).parent().remove();
	});

	$(document).on('click', '.wi-img-delete-btn', function(){
		
	});
	
	$.getJSON($('.tm-input').data('filled') , function( data ) {
		var items = [];
		$.each( data, function( key, val ) {
			items.push(val);
		});
		var tagApi = jQuery(".tm-input").tagsManager({
		    prefilled: items,
		    blinkBGColor_1: '#FFFF9C',
		    blinkBGColor_2: '#CDE69C'
		});
		jQuery(".tm-input").typeahead({
		    name: 'countries',
		    limit: 15,
		    prefetch: '/admin/json/all'
		}).on('typeahead:selected', function (e, d) {
		    tagApi.tagsManager("pushTag", d.value);
		});
	});

	// $.ajax({
	// 	dataType: "json",
	// 	url: url,
	// 	data: $('.tm-input').data('filled'),
	// 	success: function(){

	// 	}
	// });

	//alert(items);

	
});	

