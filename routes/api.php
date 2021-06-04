<?php

use Illuminate\Support\Facades\Route;

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

Route::group(['middleware' => 'auth:api', 'namespace' => 'Api'], function () {
    Route::get('/tags', 'ListController@tags');
    Route::get('/categories', 'ListController@categories');
    Route::get('/users', 'ListController@users')->middleware('admin');

    Route::resource('/posts', 'PostController', ['only' => ['index', 'show']]);
});
