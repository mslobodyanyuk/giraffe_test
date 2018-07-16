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


/*Route::group(['middleware' => 'auth'], function (){
    Route::get('/logout', function(){
        //Auth::logout();
        return redirect(route('register'));
    })->name('logout');
});*/


Route::resource('/', 'AdController');
Route::resource('ads', 'AdController');// index

Route::get('/', ['as' => 'main', 'uses' => 'AdController@index']);
Route::get('ad/{id}', ['as' => 'cart', 'uses' => 'AdController@cart']);

//Route::get('ads/delete/{id}', 'AdController@destroy')->name('ads.destroy');

//??? - ads/create
Route::get('ads/create', 'AdController@create')->name('ads.create');


Route::post('ads/create', 'AdController@create');


/**************/
Route::get('logout', 'AdController@logout')->name('logout');

//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
//Route::get('ads/create', 'AdController@create')->name('create');



//Auth::routes();// - с ним не светится Create Ad

