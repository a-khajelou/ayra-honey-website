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

    public function getBees(){
        return View::make('public.bees');
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

}