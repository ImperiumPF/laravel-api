<?php

namespace Imperium\Http\Controllers\Auth;

use Auth;
use Socialite;
use Imperium\models\User;

use Imperium\Http\Controllers\Controller;
use Imperium\Http\Controllers\Auth\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function socialLogin($social) {
        return Socialite::driver($social)->redirect();
    }

    public function handleProviderCallback($social){
        $userSocial = Socialite::driver($social)->user();
        $user = User::where(['email' => $userSocial->getEmail()])->first();
        if ($user) {
            Auth::login($user);
            return redirect()->action('HomeController@index');
        } else {
            return view('auth.register', ['name' => $userSocial->getName(),'email'=> $userSocial->getEmail()]);
        }
    }

    //public function authenticated(Request $request)
    //{
        // Logic that determines where to send the user
    //    if($request->user()->hasRole('Utilizador')){
    //        return redirect('/user/home');
    //    } else {
    //        return redirect('/admin/home');
    //    }
    //}
}
