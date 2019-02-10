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
Route::get('/', function(){
    return view('home');
});

Route::get('about', 'SiteController@getAbout');

Route::group(['prefix'=>'admin'], function(){
    Route::get('/', function(){
        return view('admin.home');
    });

    Route::get('about', 'SiteController@getAboutAdmin');

    Route::get('menu', 'MenuController@index');

    Route::post('addcategory', 'MenuController@createCategory');

    Route::post('additem', 'MenuController@addItem');
    Route::post('addsubitem', 'MenuController@addSubItem');

    Route::post('saveabout', 'SiteController@saveAbout');
});