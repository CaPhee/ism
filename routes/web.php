<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Zizaco\Entrust\Traits\EntrustUserTrait;

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

Route::get('/logout','Auth\AuthController@logout');



Route::get('/db', function()
{
  	
});

Route::get('test',function(){
	$titles = DB::table('alerts')->pluck('title');

	foreach ($titles as $title) {
    echo $title;
}
});

Auth::routes();

Route::get('/home', 'HomeController@index');

	Route::group(['prefix' => 'user','middleware'=> 'auth'], function(){

		Route::get('/',['as' => 'user','uses' => 'UserController@index']);

		Route::group(['prefix' => 'alert'],function(){
			Route::get('list', ['as' => 'user.alert.list', 'uses' => 'AlertController@index']);
			Route::get('detail/{id}', ['as' => 'user.alert.detail', 'uses' => 'AlertController@detail']);
			Route::get('create', ['as' => 'user.alert.create', 'uses' => 'AlertController@getCreate']);
			Route::post('create', ['as' => 'user.alert.postcreate', 'uses' => 'AlertController@postCreate']);
			Route::get('edit/{id}', ['as' => 'user.alert.edit', 'uses' => 'AlertController@edit']);
			Route::put('edit/{id}', ['as' => 'user.alert.update', 'uses' => 'AlertController@update']);
			Route::delete('delete/{id}' ,['as' => 'user.alert.destroy', 'uses' => 'AlertController@destroy']);

		});

		Route::group(['prefix' => 'employee'],function(){
			Route::get('list', ['as' => 'user.employee.list', 'uses' => 'EmployeeController@index']);
			Route::get('detail/{id}', ['as' => 'user.employee.detail', 'uses' => 'EmployeeController@detail']);
			Route::get('create', ['as' => 'user.employee.create', 'uses' => 'EmployeeController@getCreate']);
			Route::post('create', ['as' => 'user.employee.postcreate', 'uses' => 'EmployeeController@postCreate']);
			Route::get('edit/{id}', ['as' => 'user.employee.edit', 'uses' => 'EmployeeController@edit']);
			Route::put('edit/{id}', ['as' => 'user.employee.update', 'uses' => 'EmployeeController@update']);
			Route::delete('delete/{id}' ,['as' => 'user.employee.destroy', 'uses' => 'EmployeeController@destroy']);

		});

});
