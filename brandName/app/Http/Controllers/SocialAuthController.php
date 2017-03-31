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
        return Socialite::driver('google')->redirect();
    }
    // callback function
    public function callback(SocialAccountService $service){
        // when facebook call us a with token

        try{
            $socialUser = Socialite::driver('google')->stateless()->user();
        }catch (Exception $e){
            $this->redirect('/');
        }

        $user = usersModel::where('provider_user_id', $socialUser->getId())->first();
        if(!$user){
            usersModel::create([
                'provider_user_id' => $socialUser->getId(),
                'name' => $socialUser->getName(),
                'email' => $socialUser->getEmail(),
                'provider' => 'Provider',
            ]);
        }

        if ( $user->accout == 0){
            $users = $user;
            return view('account_type', compact('users'));
        }
        Auth::login($user);
        return ('/index')->with('message','You has been Login successfully!');



    }
}