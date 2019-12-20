<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('dashboard');
});

Route::get('dashboard',"DashboardController@dashboard");

Route::group(['prefix' => 'posts'], function($app)
{
    Route::get('list',"PostController@index");
    Route::get('view/{id}', "PostController@view");

    Route::get('add', "PostController@create");
    Route::get('create', "PostController@store");
      
    Route::get('edit/{id}',"PostController@edit");
    Route::get('update/{id}',"PostController@update");

   
});

Route::group(['prefix' => 'users'], function($app)
{
    Route::get('list',"UserController@index");
    Route::get('view/{id}', "UserController@view");
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
