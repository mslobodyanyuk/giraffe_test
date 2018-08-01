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



Route::group(['middleware' => 'guest'], function (){

    Route::get('/', function(){
        return view('ad.index')->name('register');
    });
    Route::post('/register', 'AdController@register' );

    Route::get('/login', function(){
        return view('ad.index')->name('login');
    });
});



Route::resource('/', 'AdController');
Route::resource('ads', 'AdController');// index



Route::get('/', ['as' => 'main', 'uses' => 'AdController@index']);
Route::get('ad/{id}', ['as' => 'cart', 'uses' => 'AdController@cart']);



//??? - ads/create
Route::get('ads/create', 'AdController@create')->name('ads.create');


Route::post('ads/create', 'AdController@create');


/**************/
Route::get('logout', 'AdController@logout')->name('logout');


//Auth::routes();// - с ним не светится Create Ad



Route::get('delete/{id}','AdController@destroy');

//???
Route::get('edit/{id}','AdController@edit');