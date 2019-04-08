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
Route::post('/posts', 'PostController@store');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{tag}', 'PostController@getPostsByTag');

Route::post('/markpostasread/{id}', 'PostController@markPostAsRead');

Route::get('posts/{id}/comments/', 'CommentController@index');
Route::get('comments/post/{id}', 'CommentController@getPostComments');
Route::post('comments', 'CommentController@store');
Route::get('comments/{id}', 'CommentController@displayComments');

Route::post('/like/{id}', 'LikeController@like');
Route::post('/unlike/{id}', 'LikeController@unlike');
Route::get('/isliked/{id}', 'LikeController@isLiked');



Route::group(['prefix'=>'admin','middleware'=>['admin'] ], function (){
    Route::get('/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('/posts/{id}/comments/', 'CommentController@adminPostComments');
    // Route::get('/comments/post/{id}', 'CommentController@getAdminPostComments');
    Route::get('comments/{id}', 'CommentController@displayAdminComments');
});
