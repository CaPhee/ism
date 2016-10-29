<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout',function(){
	Auth::logout();
	return redirect('/');
});

Route::post('/test',function(){
	echo 'Login success';
});

Auth::routes();

Route::get('/home', 'HomeController@index');

Route::group(['prefix' => 'user','middleware'=> 'auth'], function(){

	Route::get('/',['as' => 'user','uses' => 'UserController@index']);

	Route::group(['prefix' => 'login'],function(){

	});

});
