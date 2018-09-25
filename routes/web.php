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

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => 'auth'], function() {
    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);

    Route::group(['prefix' => 'menu', 'as' => 'menu.'], function() {
       Route::get('/', ['uses' => 'MenuController@index', 'as' => 'list']);
       Route::get('/add', ['uses' => 'MenuController@create', 'as' => 'create']);
       Route::post('/store', ['uses' => 'MenuController@store', 'as' => 'store']);
       Route::get('/edit/{menu}', ['uses' => 'MenuController@edit', 'as' => 'edit']);
       Route::post('/update', ['uses' => 'MenuController@update', 'as' => 'update']);
       Route::get('/delete/{menu}', ['uses' => 'MenuController@destroy', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'slider', 'as' => 'slider.'], function() {
        Route::get('/', ['uses' => 'SliderController@index', 'as' => 'list']);
        Route::get('/add', ['uses' => 'SliderController@create', 'as' => 'create']);
        Route::post('/store', ['uses' => 'SliderController@store', 'as' => 'store']);
        Route::get('/edit/{slide}', ['uses' => 'SliderController@edit', 'as' => 'edit']);
        Route::post('/update', ['uses' => 'SliderController@update', 'as' => 'update']);
        Route::get('/delete/{slide}', ['uses' => 'SliderController@destroy', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'video', 'as' => 'video.'], function() {
        Route::get('/', ['uses' => 'VideoController@index', 'as' => 'list']);
        Route::get('/add', ['uses' => 'VideoController@create', 'as' => 'create']);
        Route::post('/store', ['uses' => 'VideoController@store', 'as' => 'store']);
        Route::get('/edit/{video}', ['uses' => 'VideoController@edit', 'as' => 'edit']);
        Route::post('/update', ['uses' => 'VideoController@update', 'as' => 'update']);
        Route::get('/delete/{video}', ['uses' => 'VideoController@destroy', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'album', 'as' => 'album.'], function() {
        Route::get('/', ['uses' => 'AlbumController@index', 'as' => 'list']);
        Route::get('/add', ['uses' => 'AlbumController@create', 'as' => 'create']);
        Route::post('/store', ['uses' => 'AlbumController@store', 'as' => 'store']);
        Route::get('/edit/{album}', ['uses' => 'AlbumController@edit', 'as' => 'edit']);
        Route::post('/update', ['uses' => 'AlbumController@update', 'as' => 'update']);
        Route::get('/delete/{album}', ['uses' => 'AlbumController@destroy', 'as' => 'delete']);
    });
});

Route::group(['middleware' => 'lang', 'as' => 'site.'], function() {
    Route::get('set_lang', ['as' => 'set_lang', 'uses' => 'LanguageController@setLanguage']);
    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);
    Route::get('/video/{video}', ['uses' => 'PageController@showVideo', 'as' => 'video']);
    Route::get('/photo/{album}', ['uses' => 'PageController@showAlbum', 'as' => 'album']);
    Route::get('/{slug}', 'PageController@showPage')->name('page');
});
