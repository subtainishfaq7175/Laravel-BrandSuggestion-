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

Route::get('welcome', 'HomeController@welcome')->name('welcome');


Auth::routes();

Route::get('/home', 'HomeController@index');


Route::post('/dousersignup','SiteUsersController@usersignup')->name('dousersignup');

Route::post('/userLogin','SiteUsersController@doLogin')->name('userLogin');
Route::get('/logout','SiteUsersController@userlogout')->name('userlogout');


Route::resource('products','ProductController');

// domain request controller
Route::resource('request','RequestController');

Route::get('domainRequest','RequestController@index');

Route::post('adDomainRequest','RequestController@store')->name('adDomainRequest');

Route::get('products_list','RequestController@products_list')->name('products_list');
//show all buyer purchased products
Route::get('showAllPurchases','PurchasesController@showAllPurchases')->name('showAllPurchases');

//Show response
Route::get('showResponse/{reid}','responseController@show')->name('showResponse');

Route::get('doResponse/{id}','responseController@index')->name('doResponse');

Route::get('showAllSales','SalesController@showAllSales')->name('showAllSales');


Route::get('Response/{id}','responseController@showResponse')->name('Response');
//response
Route::post('respond','responseController@store')->name('respond');

//Show response
Route::get('showResponse/{reid}','responseController@show')->name('showResponse');

Route::get('users/{id}','usersMangeController@update');
Route::Put('/users/{id}',['uses' => 'usersMangeController@update']);

// getting Rating

Route::post('ratting','RequestController@doRating')->name('doRating');

// social login
Route::get('/redirect', 'SocialAuthController@redirect')->name('redirect');
Route::get('/callback', 'SocialAuthController@callback')->name('callback');

//goole +
Route::get('/redirectt', 'SocialAuthController@redirectt')->name('redirectt');
Route::get('/goolecallback', 'SocialAuthController@goolecallback')->name('goolecallback');


Route::post('/socialSignin', 'SocialAuthController@socialSignin')->name('socialSignin');


Route::get('payments/{price}{proid}{rqid}','PurchasesController@index')->name('payments');

Route::post('order-post','PurchasesController@orderPost')->name('order-post');

//routes for admins
Route::get('/admin','Admin\AdminLoginController@index')->name('/admin');

Route::get('/adminDashboard','Admin\AdminController@index')->name('adminDashboard');

Route::post('/adminLogin','Admin\AdminLoginController@adminLogin')->name('/adminLogin');



