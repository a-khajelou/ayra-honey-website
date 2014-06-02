<?php
class ProductController extends BaseController
{
    public function index()
    {
        $all_objs = '';
        $count = Product::$paginate_per_page;
        if (Input::has('deleted'))
            $all_objs = Product::onlyTrashed()->paginate($count);
        else
            $all_objs = Product::paginate($count);


        return View::make('admin.product.index')->with('all_objs', $all_objs);
    }

    public function show($id)
    {
        $this->index();
    }

    public function create()
    {
        return View::make('admin.product.insert')->with('product', new Product());
    }

    public function edit($id)
    {
        return View::make('admin.product.insert')->with('product', Product::withTrashed()->find($id));
    }

    public function store()
    {
        $this->update(-1);
    }

    public function update($id)
    {
        $product = '';
        if ($id == -1) {
            $product = new Product();
        } else {
            $product = Product::withTrashed()->find($id);
            if ($product == NULL) {
                throw new Exception("this id ->" . $id . " doesn't exist in Product table", 1);
            }
        }

        $rules = array(
            "category" => "required",
            "title" => 'required' ,
            "description" => 'required' ,
        );

        $validator = Validator::make(Input::all(), $rules);
        if ($validator->fails()){
            $errors =array('page'=>'product');
            foreach ($validator->messages()->all() as $key => $value) {
                $errors[$key]= $value;
            }
            return Redirect::to('/admin/product')
                ->with('err_msgs',$errors)
                ->withInput();
        }

        $product->category_id = Input::get('category');
        if(Input::has('price')){
            $product->price = Input::get('price');
        }
        else{
            $product->price = -1;
        }
        if(Input::has('countPerBox')){
            $product->count=Input::get('countPerBox');
        }else {
            $product->count=-1;
        }
        $product->title=Input::get('title');
        $product->description=Input::get('description');
        $product->save();

        $this->doSaveTags($product, 'product-tag');
        $this->doUploadPhotos($product, 'product');

        //do show successfully inserted
        return Redirect::action('ProductController@index');
    }


    public function destroy($id)
    {
        $product = Product::withTrashed()->find($id);

        if ($product != NULL) {
            if ($product->trashed()) {
                if (Input::get('forcedelete') == 'true') {
                    $product->forceDelete();
                } else {
                    $product->restore();
                }
            } else {
                $product->delete();
            }
        } else {
            echo "see category controller for delete";
            die(); //TODO:log
        }
        return Redirect::action('ProductController@index');
    }

} 