<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 6/4/14
 * Time: 12:59 PM
 */

class HoneyController extends BaseController {
    public function index()
    {
        $all_objs = '';
        $count = Honey::$paginate_per_page;
        if (Input::has('deleted'))
            $all_objs = Honey::onlyTrashed()->paginate($count);
        else
            $all_objs = Honey::paginate($count);


        return View::make('admin.honey.index')->with('all_objs', $all_objs);
    }

    public function show($id)
    {
        $this->index();
    }

    public function create()
    {
        return View::make('admin.honey.insert')->with('obj', new Honey());
    }

    public function edit($id)
    {
        return View::make('admin.honey.insert')->with('obj', Honey::withTrashed()->find($id));
    }

    public function store()
    {
        $this->update(-1);
    }

    public function update($id)
    {
        $obj = '';
        if ($id == -1) {
            $obj = new Honey();
        } else {
            $obj = Honey::withTrashed()->find($id);
            if ($obj == NULL) {
                throw new Exception("this id ->" . $id . " doesn't exist in Product table", 1);
            }
        }

        $rules = array(
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            $errors =array('page'=>'product');
            foreach ($validator->messages()->all() as $key => $value) {
                $errors[$key]= $value;
            }
            return Redirect::to('/admin/honey')
                ->with('err_msgs',$errors)
                ->withInput();
        }

        $obj->save();
        $obj->setAttr('title' , Input::get('en_title') , 'en');
        $obj->setAttr('title' , Input::get('ru_title') , 'ru');
        $obj->setAttr('description' , Input::get('en_description') , 'en');
        $obj->setAttr('description' , Input::get('ru_description') , 'ru');

        $this->doSaveTags($obj, 'honey');
        $this->doUploadPhotos($obj, 'honey');

        //do show successfully inserted
        return Redirect::action('HoneyController@index');
    }


    public function destroy($id)
    {
        $obj = Honey::withTrashed()->find($id);

        if ($obj != NULL) {
            if ($obj->trashed()) {
                if (Input::get('forcedelete') == 'true') {
                    $obj->forceDelete();
                } else {
                    $obj->restore();
                }
            } else {
                $obj->delete();
            }
        } else {
            echo "see category controller for delete";
            die(); //TODO:log
        }
        return Redirect::action('HoneyController@index');
    }
} 