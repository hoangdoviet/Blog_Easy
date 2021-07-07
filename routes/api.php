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

Route::group(['namespace' => 'Api'], function () {
    Route::get('/get_tags', 'ListController@tags');
    Route::get('/get_categories', 'ListController@categories');
    Route::get('/get_users', 'ListController@users')->middleware('admin');
    Route::get('/get_posts', 'ListController@posts');
    Route::get('/get_comments', 'ListController@comments');

});
