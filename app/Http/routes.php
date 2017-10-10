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

Route::get('/', function () {
    return view('welcome');
});
Route::any('/api',function(){
    return ['version'=>0.1];
});
/*注册api*/
Route::any('api/signup','ApiController@signup');

/*登录api*/
Route::any('api/signin','ApiController@signin');

/*登出api*/

Route::get('api/logout','ApiController@logout');

Route::get('/test','ApiController@test');