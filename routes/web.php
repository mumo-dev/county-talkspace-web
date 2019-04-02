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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware('user');
Route::get('/user/profile/{user}', 'HomeController@showProfile')->name('profile');
Route::post('/user/profile/update', 'HomeController@updateProfile')->name('update.profile');

Route::group(['prefix'=>'admin','middleware'=>['admin'] ], function (){
    Route::get('/home', 'HomeController@adminHome')->name('admin.home');
});
