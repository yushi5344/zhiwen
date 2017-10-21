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
    return view('index');
});
Route::any('/api',function(){
    return ['version'=>0.1];
});
/*检查用户名是否存在*/
Route::post('api/user/exists','ApiController@UserExist');
/*注册api*/
Route::any('api/signup','ApiController@signup');

/*登录api*/
Route::any('api/signin','ApiController@signin');

/*登出api*/
Route::get('api/logout','ApiController@logout');

/*问题api*/
Route::resource('quest','QuestionController');
Route::get('/test','ApiController@test');