
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

//show all buyer purchased products
Route::get('showAllPurchases','PurchasesController@showAllPurchases')->name('showAllPurchases');

Route::get('products_list','RatingController@products_list')->name('products_list');
Route::get('doResponse/{id}','responseController@index')->name('doResponse');

//showing all sales
Route::get('showAllSales','SalesController@showAllSales')->name('showAllSales');


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


// Purchases
Route::get('payments/{id}{proid}','PurchasesController@index')->name('payments');
Route::post('order-post','PurchasesController@orderPost')->name('order-post');
