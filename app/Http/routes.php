<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::group(['prefix' => 'manager'],function(){
	    Route::get('item/{id}/edit','ItemController@Edit');
	    Route::post('item/{id}/update','ItemController@Update');
	    Route::controller('item','ItemController');
	    Route::resource('category','CategoryController');
    });
	Route::controller('/vnlady-signin','SessionController');
	Route::controller('/','ViewController');
});
