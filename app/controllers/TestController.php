<?php
/**
 * Created by PhpStorm.
 * User: arash
 * Date: 2/4/14
 * Time: 9:43 PM
 */

class TestController extends BaseController {
    public function getIndex(){
        return View::make('public.test');
    }

    public function postGet(){
        return View::make('public.test')->with('blogPost',Input::get('blog_post'));
    }

    public function getView(){
        return View::make('public.view_test');
    }
}