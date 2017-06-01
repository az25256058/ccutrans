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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();


Route::get('/login/facebook', 'Auth\LoginController@redirectToProvider');
Route::get('/login/facebook/callback', 'Auth\LoginController@handleProviderCallback');


Route::group(['middleware' => ['facebookLogin']], function (){
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('/product-{category}', 'ProductController@index');
    Route::get('/seller', 'SellController@index');
    Route::get('/purchaser', 'PurchaseController@index');

    Route::post('/post','SellController@store');

    Route::post('/purchase/{pid}', 'ProductController@purchase');
    Route::post('/comment/{pid}', 'ProductController@comment');

    Route::get('/cancel/{pid}','PurchaseController@destory');
});


