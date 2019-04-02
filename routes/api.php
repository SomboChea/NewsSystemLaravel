<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::group(['middleware' => ['json.response']], function () {

//     Route::middleware('auth:api')->get('/user', function (Request $request) {
//         return $request->user();
//     });

//     // public routes
//     //Route::post('/login', 'Api\AuthController@login')->name('login.api');
//     //Route::post('/register', 'Api\AuthController@register')->name('register.api');

//     // private routes
//     Route::middleware('auth')->group(function () {
//         Route::get('/logout', 'Api\AuthController@logout')->name('logout');

//         Route::get('/news', 'Api\NewsController@index')->name('news');
//         Route::get('/news/{id}', 'Api\NewsController@show')->name('news.show');

//         // Route::post('/news', 'NewsController@create')->name('news.create');
//         // Route::patch('/news/{id}', 'NewsController@update')->name('news.update');
//         // Route::delete('/news/{id}', 'NewsController@delete')->name('news.delete');

//         // Route::get('categories', 'CategoryController@index')->name('categories');
//         // Route::post('categories/create', 'CategoryController@create')->name('categories.create');
//     });

// });
