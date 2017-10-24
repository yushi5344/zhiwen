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
    if(session('user')){
        $session_id= session('user')->id;
    }else{
        $session_id=false;
    }
    return view('index',compact('session_id'));
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

/*读取用户信息*/
Route::get('api/user/read/{id}','ApiController@ReadUser');


/*读取用户问题*/
Route::get('api/quest/read/{id}','QuestionController@Readquest');


/*读取用户问题*/
Route::get('api/user/answer/read/{id}','AnswerController@Readanswer');
/*时间线*/
Route::post('api/timeline','CommonController@timeline');
/*问题api*/
Route::resource('api/quest','QuestionController');
Route::get('/test','ApiController@test');