<?php

use Illuminate\Support\Facades\Route;

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
Route::group(['middleware' => 'locale'], function () {
    Route::get('change-language/{language}', 'BlogController@changeLanguage')
        ->name('blog.change-language');
    Route::get('/', 'BlogController@index');
    Route::get('/posts/{post}', 'BlogController@post');
    Route::post('/posts/{post}/comment', 'BlogController@comment')->middleware('auth');

    Auth::routes();

    Route::get('/home', 'HomeController@index');
    Route::get('logout', ['as' => 'logout', 'uses' => 'Auth\LogoutController@getLogout']);
    Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
        Route::resource('/posts', 'PostController');
        Route::put('/posts/{post}/publish', 'PostController@publish')->middleware('admin');
        Route::resource('/categories', 'CategoryController', ['except' => ['show']]);
        Route::resource('/tags', 'TagController', ['except' => ['show']]);
        Route::resource('/comments', 'CommentController', ['only' => ['index', 'destroy']]);
        Route::resource('/users', 'UserController', ['middleware' => 'admin', 'only' => ['index', 'destroy']]);
    });
    Route::get('lang-{lang}.js', 'LanguageController@show');
});
