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

    Route::group(['prefix' => 'contacts', 'as' => 'contacts.'], function() {
        Route::get('/edit', ['uses' => 'ContactController@edit', 'as' => 'edit']);
        Route::post('/update', ['uses' => 'ContactController@update', 'as' => 'update']);
    });

    Route::group(['prefix' => 'about', 'as' => 'about.'], function() {
        Route::get('/', ['uses' => 'AboutTabController@index', 'as' => 'list']);
        Route::get('/add', ['uses' => 'AboutTabController@create', 'as' => 'create']);
        Route::post('/store', ['uses' => 'AboutTabController@store', 'as' => 'store']);
        Route::get('/edit/{tab}', ['uses' => 'AboutTabController@edit', 'as' => 'edit']);
        Route::post('/update', ['uses' => 'AboutTabController@update', 'as' => 'update']);
        Route::get('/delete/{tab}', ['uses' => 'AboutTabController@destroy', 'as' => 'delete']);
    });

    Route::group(['prefix' => 'creator', 'as' => 'creator.'], function() {
        Route::get('/', ['uses' => 'CreatorController@index', 'as' => 'list']);
        Route::get('/add', ['uses' => 'CreatorController@create', 'as' => 'create']);
        Route::post('/store', ['uses' => 'CreatorController@store', 'as' => 'store']);
        Route::get('/edit/{creator}', ['uses' => 'CreatorController@edit', 'as' => 'edit']);
        Route::get('/show/{creator}', ['uses' => 'CreatorController@show', 'as' => 'show']);
        Route::post('/update', ['uses' => 'CreatorController@update', 'as' => 'update']);
        Route::get('/delete/{creator}', ['uses' => 'CreatorController@destroy', 'as' => 'delete']);

        Route::group(['prefix' => 'slider', 'as' => 'slider.'], function() {
            Route::get('/{creator}/add', ['uses' => 'CreatorSliderController@create', 'as' => 'create']);
            Route::post('/store', ['uses' => 'CreatorSliderController@store', 'as' => 'store']);
            Route::get('/edit/{slider}', ['uses' => 'CreatorSliderController@edit', 'as' => 'edit']);
            Route::post('/update', ['uses' => 'CreatorSliderController@update', 'as' => 'update']);
            Route::get('/delete/{slider}', ['uses' => 'CreatorSliderController@destroy', 'as' => 'delete']);
        });

        Route::group(['prefix' => 'text', 'as' => 'text.'], function() {
            Route::get('/{creator}/add', ['uses' => 'CreatorTextController@create', 'as' => 'create']);
            Route::post('/store', ['uses' => 'CreatorTextController@store', 'as' => 'store']);
            Route::get('/edit/{text}', ['uses' => 'CreatorTextController@edit', 'as' => 'edit']);
            Route::post('/update', ['uses' => 'CreatorTextController@update', 'as' => 'update']);
            Route::get('/delete/{text}', ['uses' => 'CreatorTextController@destroy', 'as' => 'delete']);
        });

        Route::group(['prefix' => 'video', 'as' => 'video.'], function() {
            Route::get('/{creator}/add', ['uses' => 'CreatorVideoController@create', 'as' => 'create']);
            Route::post('/store', ['uses' => 'CreatorVideoController@store', 'as' => 'store']);
            Route::get('/edit/{slider}', ['uses' => 'CreatorVideoController@edit', 'as' => 'edit']);
            Route::post('/update', ['uses' => 'CreatorVideoController@update', 'as' => 'update']);
            Route::get('/delete/{slider}', ['uses' => 'CreatorVideoController@destroy', 'as' => 'delete']);
        });

    });
});

Route::group(['middleware' => 'lang', 'as' => 'site.'], function() {
    Route::get('set_lang', ['as' => 'set_lang', 'uses' => 'LanguageController@setLanguage']);
    Route::get('/', ['uses' => 'IndexController@index', 'as' => 'index']);
    Route::get('/video/{video}', ['uses' => 'PageController@showVideo', 'as' => 'video']);
    Route::get('/photo/{album}', ['uses' => 'PageController@showAlbum', 'as' => 'album']);
    Route::get('/creators/{creator}', ['uses' => 'PageController@showCreator', 'as' => 'creator']);
    Route::get('/{slug}', 'PageController@showPage')->name('page');
});
