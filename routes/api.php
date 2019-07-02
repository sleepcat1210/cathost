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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/position/{geohash}','Api\V1\IndexController@position');
Route::get('/index_category','Api\V1\IndexController@category');
Route::get('/shops','Api\V1\IndexController@shops');
Route::get('/captcha','Api\V1\IndexController@captcha');
