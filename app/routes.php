<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::any('/createdb', 'DbController@createDb');

Route::group(
    array(
//        'before' => 'auth',
        'prefix' => 'admin'
    ),
    function () {
        Route::any('/' , 'HoneyController@index');

        Route::resource('slider', 'SliderController');
        Route::resource('honey', 'HoneyController');

        Route::resource('tags', 'TagController', array('only' => array('index', 'delete')));
        Route::any('json/{type?}/{id?}', 'TagController@handle');


        Route::any('photo/{id}', function ($id) {
            $p = Photo::find($id);
            if ($p != NULL) {
                $p->delete();
            } else {
                throw new Exception("photo with id='" . $id . "' doesn't exist", 1);
            }
            return Redirect::back();
        });
    });

Route::controller('/user', 'UserController');

Route::controller('test', 'TestController');
Route::controller('/', "HomeController");