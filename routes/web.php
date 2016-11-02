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
    return view('auth.login');
});

Route::get('/logout',function(){
	Auth::logout();
	return redirect('/login');
});

Route::post('/test',function(){
	echo 'Login success';
});

Auth::routes();

Route::get('/home', 'HomeController@index');

	Route::group(['prefix' => 'user','middleware'=> 'auth'], function(){

		Route::get('/',['as' => 'user','uses' => 'UserController@index']);

		Route::group(['prefix' => 'alert'],function(){
			Route::get('list', ['as' => 'user.alert.list', 'uses' => 'AlertController@index']);
			Route::get('create', ['as' => 'user.alert.create', 'uses' => 'AlertController@getCreate']);
			Route::post('create', ['as' => 'user.alert.postcreate', 'uses' => 'AlertController@postCreate']);
			Route::get('show/{id}', ['as' => 'user.alert.show', 'uses' => 'AlertController@show']);
			Route::get('edit/{id}', ['as' => 'user.alert.edit', 'uses' => 'AlertController@edit']);
			Route::put('edit/{id}', ['as' => 'user.alert.update', 'uses' => 'AlertController@update']);

	});

});
