<?php

class SliderController extends \BaseController {

	public function index(){
		$all_objs = '';
		$count =Slider::$paginate_per_page;
		if(Input::has('deleted'))
			$all_objs = Slider::onlyTrashed()->paginate($count);
		else
			$all_objs = Slider::paginate($count);
		return View::make('admin.slider.index')->with('all_objs', $all_objs);
	}

	public function show($id){
		//TODO
		return View::make("admin.slider.show")->with('slider', Slider::find($id));	
	}

	public function create(){
		return View::make('admin.slider.insert')->with('slider',new Slider());
	}

	public function edit($id){
		return View::make('admin.slider.insert')->with('slider', Slider::withTrashed()->find($id));
	}

	
	public function store(){
		$this->update(-1);
	}

	public function update($id){
		$slider = '';
		if ($id==-1){
			$slider = new Slider();
		}
		else{
			$slider = Slider::withTrashed()->find($id);
			if($slider==NULL){
				throw new Exception("this id ->".$id." doesn't exist in Slider table", 1);
			}
		}
        try {
            $slider->save();
        } catch (Exception $e) {
            echo $e ;
        }
        $this->doSaveTags($slider,'slider-tag');
		$this->doUploadPhotos($slider, 'slider');
		return Redirect::action('SliderController@index');
	}

	
	public function destroy($id){
		$s = Slider::withTrashed()->find($id);
		
		if($s!=NULL){
			if($s->trashed()){
				if(Input::get('forcedelete')=='true'){
					$s->forceDelete();
				}
				else{
					$s->restore();
				}
			}else{
				$s->delete();
			}
		}else{
			echo "see slider conltroler for delete";
			die();//TODO:log
		}
		return Redirect::action('SliderController@index');
	}

}