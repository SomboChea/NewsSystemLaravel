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

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('home', function () {
        $user = \Auth::user()->name;
        return redirect()->route('home')->with(['status' => "Welcome, $user!"]);
    });

    Route::get('/', 'HomeController@index')->name('home'); // List all News
    Route::get('news/{id}', 'HomeController@show')->name('news.show'); // View specific News

    Route::get('/api/news', 'Api\NewsController@index')->name('news');
    Route::get('/api/news/{id}', 'Api\NewsController@show')->name('news.show');

    Route::get('news/post/new', 'HomeController@post')->name('news.post'); // View new Post
    Route::post('news/post/create', 'HomeController@create')->name('news.create'); // Create a new post

    Route::get('news/post/{id}/edit', 'HomeController@edit')->name('news.edit'); // View Edit Post
    Route::post('news/post/{id}/update', 'HomeController@update')->name('news.update'); // Update Post

    Route::get('news/post/{id}/delete', 'HomeController@delete')->name('news.delete'); // Delete Post

});
