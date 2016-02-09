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
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::get('/', function () {
        if(Auth::check()) {
            return Redirect::to('dashboard');
        } else {
            //TODO: This is a temporary redirect to the login page, because
            //      the home page isn't finished yet.
            return Redirect::to('login');
        }
        return view('index');
    });
    Route::get('dashboard', "DashboardController@index");

    Route::post('task', "TaskController@store");
});
