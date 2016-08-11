<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Route::get('/', function () {
//     // return view('welcome');
// });
// Route::get('/test',function(){
// 	/*Sentinel::register([
// 		'email'    => 'ramesh@yopmail.com',
// 		'password' => 'foobar',
// 	]);	*/
// 	$credentials = [
// 		'email'    => 'ramesh@yopmail.com',
// 		'password' => 'foobar',
// 	];

// 	$user = Sentinel::authenticate($credentials);
// 	echo "<pre>"; print_r($user); echo "</pre>";
// });
// Route::get('/test1',array('uses'=>'TestController@index'));

Route::group(['middleware' => ['web']], function () {
	Route::get('/tasks', 'TaskController@showTask');
	Route::post('/task', 'TaskController@storeTask');
	Route::delete('/task/{task}', 'TaskController@deleteTask');
	Route::auth();
	Route::get('/', 'HomeController@index');//->middleware('guest');
});