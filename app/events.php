<?php
Event::listen('baseModel', function($obj){

    if(get_class($obj) == 'BaseModel')
    	return true;
    if((!$obj->is_trashable() && !is_null($obj->id)) || ( $obj->is_trashable() && $obj->trashed() ) ){
    	//delete all public stuffs
    	if(get_class($obj)!='Photo'){
    		$obj->deleteAllPhoto();	
    	}
    }
	//todo MoreContents
    return true;
});

// App::missing(function($exception){
    
//     return Response::view('errors.missing', array(), 404);
// });