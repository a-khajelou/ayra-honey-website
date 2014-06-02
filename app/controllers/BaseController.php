<?php

class BaseController extends Controller {


	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

	public static $galleries = array();

	public function doUploadPhotos($obj , $gallery_id){
        if ($obj->mainPhoto() != null){
            return;
        }
		$ids = HomeController::input_start_with_array($gallery_id.'-photo-');

		$mainPhoto = NULL;
		$ps = array();
		foreach ($ids as $value) {
			$photo = '';
			$name = $gallery_id.'-photo-'.$value;
			if(Input::has($gallery_id.'-id-'.$value)){
				$photo = Photo::findOrFail(Input::get($gallery_id.'-id-'.$value));
			}else{
				if(Input::hasFile($name)){
					$photo = $obj->savePhoto($name);
				}else{
					continue;
				}
			}
			
			array_push($ps, $photo);

			if(Input::get($gallery_id.'-main-photo') == $name){
				$mainPhoto = $photo;
			}
		}
		$exist_ids = array();
		foreach ($ps as $photo) {
			array_push($exist_ids, $photo->id);
		}
		if(count($exist_ids)!=0)
			$query = $obj->photos()->whereNotIn('id', $exist_ids)->get();
		else
			$query = $obj->photos()->get();

		foreach ($query as $t){
			if($t->imageable->id == $obj->id){
				$t->delete();
			}else{
				throw new Exception("changing html is not a good idea ", 1);
			}
		}
		if(count($ps)==0){
			return;
		}else if(is_null($mainPhoto))
            $mainPhoto = $ps[0];

		if($mainPhoto == NULL ){
			throw new Exception("main photo of '".$gallery_id."' give an incorect input value", 1);
		}else{
			$obj->photos()->update(array('is_main' => false));
			$mainPhoto->is_main=true;
			$mainPhoto->save();
		}
	}

	

	public static function startsWith($haystack, $needle)
	{
	    return !strncmp($haystack, $needle, strlen($needle));
	}

	public static function endsWith($haystack, $needle)
	{
	    $length = strlen($needle);
	    if ($length == 0) {
	        return true;
	    }

	    return (substr($haystack, -$length) === $needle);
	}
	public static function input_start_with_array($starts_with){
		if(strlen($starts_with)==0){
			echo "input_start_with_array function get a None arg";
			die();
		}

		$inputs = array();
		foreach (Input::all() as $key => $value) {
			if( !strncmp($key, $starts_with, strlen($starts_with))){
				foreach (array_slice(explode ($starts_with, $key), 1, 1) as $key => $value) {
					array_push($inputs, $value);
				}
			}
		}
		return $inputs;
	}

	protected function doSaveTags($obj , $tag_id){
		$tags = explode(',', Input::get('hidden-'.$tag_id));
		
		$obj->tags()->delete();
		foreach ($tags as $tg) {
			$t = new Tag();
			$t->name = $tg;
			$obj->tags()->save($t);
		}
	}
	public function doUploadFiles($obj){
        foreach(Input::all() as $key => $value){
            if (strpos($key , "attached_file_") !== false){
                if ($value !== null)
                    $obj->saveFile($key);
            }
        }
    }




}