<?php

class TagController extends \BaseController {

	public function handle($type='all', $id=NULL){
		if($type == 'all'){
			$a= array();
			foreach (Tag::select('name')->distinct()->get() as $tg) {
				array_push($a, $tg->name);	
			}
			return Response::json($a);	

		}else if($id!=NULL && is_numeric($id)){
			$a= array();
			$tags = Tag::where('tagable_id', '=', $id)
						->where('tagable_type', '=', $type)
						->select('name')->distinct()->get();
			foreach ($tags as $tg) {
				array_push($a, $tg->name);	
			}
			return Response::json($a);
		}else{
			//todo : log for error
			echo 'error in json';
		}
	}

	public function index(){
		$all_objs = '';
		$count =Product::$paginate_per_page;
		if(Input::has('deleted'))
			$all_objs = Tag::onlyTrashed()->paginate($count);
		else
			$all_objs = Tag::paginate($count);
		
		return View::make('admin.platform.index')->with('all_objs', $all_objs);
	}


	public function destroy($id){
		$p = Product::withTrashed()->find($id);
		
		if($p!=NULL){
			if($p->trashed()){
				if(Input::get('forcedelete')=='true'){
					foreach ($p->photos as $photo) {
						$photo->delete();
					}
					$p->forceDelete();
				}
				else{
					$p->restore();
				}
			}else{
				$p->delete();
			}
		}else{
			echo "see platform conltroler for delete";
			die();//TODO:log
		}
		return Redirect::action('ProductController@index');
	}


}

