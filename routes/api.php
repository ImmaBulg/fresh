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

Route::group(['namespace' => 'Api', 'as' => 'api.'], function() {
    Route::post('/update_menus_order', 'MenuController@updateMenuOrder');
    Route::post('/update_slide_order', 'MenuController@updateSlideOrder');
    Route::post('/update_about_order', 'MenuController@updateAboutOrder');
    Route::post('/delete_album_image', 'ImageController@deleteAlbumImage');
});
