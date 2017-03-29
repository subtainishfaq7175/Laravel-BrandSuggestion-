<?php
namespace App\Http\Controllers;
use App\usersModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\SocialAccountService;
use Socialite; // socialite namespace
use Auth;

class SocialAuthController extends Controller
{
    // redirect function
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }
    // callback function
    public function callback(SocialAccountService $service){
        // when facebook call us a with token
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());

        return redirect()->to('/')->with('message','You has been Login successfully!');

    }
}