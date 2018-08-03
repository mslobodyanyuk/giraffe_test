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
Route::get('logout', 'AdController@logout')->name('logout');


Route::resource('/', 'AdController', ['except' => ['show']]);
Route::resource('ads', 'AdController', ['except' => ['show']]);

Route::get('ad/{id}', ['as' => 'cart', 'uses' => 'AdController@cart']);

Route::delete('delete/{id}','AdController@destroy');
Route::post('edit/{id}','AdController@edit');