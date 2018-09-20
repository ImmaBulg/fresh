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
Route::group(['middleware' => 'lang'], function() {
    Route::get('set_lang', ['as' => 'set_lang', 'uses' => 'LanguageController@setLanguage']);

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/home', 'HomeController@index')->name('home');
});

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
});
