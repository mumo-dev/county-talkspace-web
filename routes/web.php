<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['user']);
Route::get('/user/profile/{user}', 'HomeController@showProfile')->name('profile');
Route::post('/user/profile/update', 'HomeController@updateProfile')->name('update.profile');
Route::post('/posts', 'PostController@store');
Route::get('/posts', 'PostController@index');
Route::get('/posts/{tag}', 'PostController@getPostsByTag');
Route::get('/posts/user/{id}', 'PostController@getPostsByUser');

Route::post('/markpostasread/{id}', 'PostController@markPostAsRead');

Route::get('posts/{id}/comments/', 'CommentController@index');
Route::get('comments/post/{id}', 'CommentController@getPostComments');
Route::post('comments', 'CommentController@store');
Route::get('comments/{id}', 'CommentController@displayComments');

Route::post('/like/{id}', 'LikeController@like');
Route::post('/unlike/{id}', 'LikeController@unlike');
Route::get('/isliked/{id}', 'LikeController@isLiked');

Route::get('/polls', 'PollsController@displayPolls')->name('polls')->middleware(['auth','user']);
Route::post('/vote', 'VoteController@addVote')->middleware(['user']);

Route::get('/news', 'NewsController@showNews')->name('news')->middleware(['auth','user']);
Route::get('/news/{id}', 'NewsController@showNewsDetails')->name('news.show')->middleware(['auth','user']);
Route::get('/events', 'EventController@showEvents')->name('events');

Route::get('/services', 'ServiceController@index')->name('services');
Route::get('/services/{service}', 'ServiceController@show');
Route::post('/services', 'ServiceController@store')->name('service.store');
Route::get('/services/user/{userId}', 'ServiceController@fetchAllByUserServices');

Route::post('/services/comment', 'ServiceController@storeComment');
Route::get('/services/comments/{id}', 'ServiceController@fetchComments');


Route::group(['prefix'=>'admin','middleware'=>['auth','admin'] ], function (){
    Route::get('/home', 'HomeController@adminHome')->name('admin.home');
    Route::get('/posts/{id}/comments/', 'CommentController@adminPostComments');

    Route::get('comments/{id}', 'CommentController@displayAdminComments');

    Route::get('/logs', 'AdminController@getLogs')->name('admin.logs');
    Route::get('/accounts', 'AdminController@getAccounts')->name('admin.accounts');
    Route::get('/accounts/create', 'AdminController@createAccount')->name('admin.account.create');
    Route::post('/accounts', 'AdminController@storeAccount')->name('admin.newaccount');
    Route::post('/accounts/delete', 'AdminController@deleteAccount')->name('admin.account.delete');
  

    Route::get('/polls', 'PollsController@index')->name('admin.polls');
    Route::post('/polls/create', 'PollsController@store');

    Route::get('/events', 'EventController@index')->name('admin.events');
    Route::get('/events/{event}', 'EventController@show')->name('admin.event.show');
    Route::get('/events/{event}/edit', 'EventController@edit')->name('admin.event.edit');
    Route::post('/events', 'EventController@store')->name('admin.event.store');
    Route::post('/event/update', 'EventController@update')->name('admin.event.update');
    Route::get('/events/new/create', 'EventController@create')->name('admin.event.create');
    Route::post('/event/delete', 'EventController@delete')->name('admin.event.delete');

    Route::get('/news', 'NewsController@index')->name('admin.news');
    Route::get('/news/{id}', 'NewsController@show')->name('admin.news.show');
    Route::post('/news', 'NewsController@store')->name('admin.news.store');
    Route::get('/news/create', 'NewsController@create')->name('admin.news.create');
    Route::get('/news/{id}/edit', 'NewsController@edit')->name('admin.news.edit');
    Route::post('/news/delete', 'NewsController@delete')->name('admin.news.delete');
    Route::post('/news/update', 'NewsController@update')->name('admin.news.update');


    Route::get('/services', 'ServiceController@adminIndex')->name('admin.services');
    Route::get('/services/{id}', 'ServiceController@adminShow')->name('admin.service.show');

});
