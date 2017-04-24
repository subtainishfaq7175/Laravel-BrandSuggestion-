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
use Illuminate\Support\Facades\DB;
class SocialAuthController extends Controller
{
    // redirect function
    public function redirect(){
        return Socialite::driver('facebook')->redirect();
    }

  /*  public function redirectt(){
        return Socialite::driver('google')->redirect();
    }*/
    // callback function
    public function callback(SocialAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
            return redirect()->to('/')->with('message', 'You has been Login successfully!');
        return view('home');
    }



    public function redirectt(){
        return Socialite::driver('google')->redirect();
    }


    public function goolecallback(SocialAccountService $service)
    {

        //$user = Socialite::driver('google')->stateless()->user();
        $user = $service->createOrGetUserg(Socialite::driver('google')->user());

        auth()->login($user);

        if(Auth::user()->role_id == 1 || Auth::user()->role_id == 2)
            return redirect()->to('/')->with('message', 'You has been Login successfully!');
        return view('select_account');
    }

    public function socialSignin(Request $request)
    {

        DB::table('users')
            ->where('email', Auth::user()->email)
            ->update(['role_id' => $request->input('role_id')]);
        return redirect()->to('/')->with('message', 'You has been Login successfully!');
    }
}