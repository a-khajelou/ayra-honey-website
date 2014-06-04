<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

    public function getIndex () {
        return View::make('public.about-us');
    }

    public function getAboutUs () {
        return View::make('public.about-us');
    }

    public function getHoneyProducts(){
        return View::make('public.honey-products');
    }

    public function getBlog(){
        return View::make('public.blog');
    }

    public function getFarmTour(){
        return View::make('public.farm-tour');
    }

    public function getOrdering(){
        return View::make('public.ordering');
    }

    public function getContactUs(){
        return View::make('public.contact-us');
    }

    public function getSetLocale(){
        if(Input::has('dest')){
            if(Input::get('dest') == 'en')
                Session::put('current_locale', 'en');
            else if (Input::get('dest') == 'ru')
                Session::put('current_locale', 'ru');
        }
        $redirect=null;
        try{$redirect=Redirect::back();}catch (Exception $e){$redirect=Redirect::to('/');}
        return $redirect;
    }

    public function getLogin(){
        return View::make('public.login');
    }

    public function getHoney(){
        return View::make('public.honey');
    }

}