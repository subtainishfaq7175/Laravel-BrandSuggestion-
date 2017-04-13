<?php
namespace App\Http\Controllers;
use App\usersModel;
use Dompdf\Exception;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\SocialAccountService;
use Socialite; // socialite namespace
use Auth;
use App\SocialAccount;

class SocialAuthController extends Controller
{
    // redirect function
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }
    // callback function
    public function callback(SocialAccountService $service)
    {
        // when facebook call us a with token
        $user = $service->createOrGetUser(Socialite::driver('facebook')->stateless()->user());


        Auth()->login(Auth::user(), true);
        return ('/')->with('message', 'You has been Login successfully!');
    }
}