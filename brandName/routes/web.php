<?php
use Illuminate\Support\Facades\Auth;
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
    return view('index');
});



Route::get('signup',['uses'=>'usersMangeController@index']);

Route::post('/signup', array('as'=>'signup' ,'befor'=>'csrf','uses'=>'Authcontroller@usersignup'));





Route::post('/userLogin', array('as'=>'userLogin','uses'=>'Authcontroller@authenticate'));

Route::get('/logout', array('as'=>'logout' ,'uses'=>'Authcontroller@userlogout'));

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');
