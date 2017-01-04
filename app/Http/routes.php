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

Route::get('/admin', function (){
    return redirect('/admin/classtable');
});

Route::group(['namespace' => 'Admin', 'middleware' => 'auth'], function(){
    Route::resource('admin/student', 'StudentController');
    Route::resource('admin/teacher', 'TeacherController');
    Route::resource('admin/classtable', 'ClasstableController');
});

//Logging in and out
Route::get('/auth/login', 'Auth\AuthController@getLogin');//注意斜杠的方向
Route::post('/auth/login', 'Auth\AuthController@postLogin');
Route::get('/auth/logout', 'Auth\AuthController@getLogout');