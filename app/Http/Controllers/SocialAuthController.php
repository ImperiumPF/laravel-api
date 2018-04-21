<?php

namespace Imperium\Http\Controllers;

use Socialite;
use Illuminate\Http\Request;
use App\Services\SocialAccountService;

class SocialAuthController extends Controller
{
    /**
    * Create a redirect method to facebook api.
    *
    * @return void
    */
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    /**
     * Return a callback method from facebook api.
     *
     * @return callback URL from facebook
     */
    public function callback(SocialFacebookAccountService $service)
    {
        $user = $service->createOrGetUser(Socialite::driver('facebook')->user());
        auth()->login($user);
        return redirect()->to('/home');
    }
}
