Skip to content
This repository
Search
Pull requests
Issues
Gist
 @saimzishan
 Sign out
 Watch 1
  Star 0
 Fork 0 subtainishfaqstudent/brandSuggestion Private
 Code  Issues 0  Pull requests 0  Projects 0  Wiki  Pulse  Graphs
Branch: master Find file Copy pathbrandSuggestion/brandName/routes/web.php
f7bf779  4 days ago
@saimzishan saimzishan checking
1 contributor
RawBlameHistory     
55 lines (30 sloc)  1.24 KB
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
use App\User;
Route::get('/', function () {
    return view('index');
});
Route::get('signup',['uses'=>'usersMangeController@index'])->name('signup');
Route::post('/signup', array('as'=>'signup' ,'befor'=>'csrf','uses'=>'Authcontroller@usersignup'));
Route::post('/userLogin', array('as'=>'userLogin','uses'=>'Authcontroller@authenticate'));
Route::get('/logout', array('as'=>'logout' ,'uses'=>'Authcontroller@userlogout'));

Route::get('/redirect', 'SocialAuthController@redirect');
Route::get('/callback', 'SocialAuthController@callback');

Route::group(['middleware' => 'auth'], function()
{
        Route::resource('products','ProductController');
});
// domain request controller
Route::get('domainRequest','RatingController@index');
Route::post('adDomainRequest','RatingController@store')->name('adDomainRequest');

//Request controller
Route::group(['middleware' => 'auth'], function()
{
    Route::resource('request','RatingController');
});

Route::get('products_list','RatingController@products_list')->name('products_list');
Route::get('doResponse/{id}','responseController@index')->name('doResponse');
Route::get('Response/{id}','responseController@showResponse')->name('Response');
//response
Route::post('respond','responseController@store')->name('respond');

//Show response
Route::get('showResponse/{reid}','responseController@show')->name('showResponse');

Route::get('users/{id}','usersMangeController@update');
Route::Put('/users/{id}',['uses' => 'usersMangeController@update']);

// getting Rating

Route::post('ratting','RatingController@doRating')->name('doRating');


Auth::routes();
Route::get('home', 'HomeController@index');


// Payment
Route::get('payments','PaymentController@index')->name('payments');
Route::post('order-post','PaymentController@orderPost')->name('order-post');
