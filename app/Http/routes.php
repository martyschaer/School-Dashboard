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
        if (Auth::check()) {
            return Redirect::to('dashboard');
        } else {
            //TODO: This is a temporary redirect to the login page, because
            //the home page isn't finished yet.
            return Redirect::to('login');
        }
        return view('index');
    });
    Route::get('dashboard', "DashboardController@index");

    // Tasks
    Route::post('task', "TaskController@store");
    Route::delete('task/{id}/delete', "TaskController@destroy");
    Route::patch('task/{id}/check', "TaskController@check");
    Route::put('task/{id}/update', "TaskController@update");
});
