<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use Exception;
use App\User;

class FacebookController extends Controller
{
    public function redirectToFacebook() {
        return Socialite::driver('facebook')->redirect();
    }
    public function handleFacebookCallback() {
        try {
						$user = Socialite::driver('facebook')->user();
						$finduser = User::where('facebook_id', $user->id)->first();
						if ($finduser) {
								Auth::login($finduser);
								return redirect('/user');
						} else {
								$newUser = User::create(['name' => $user->name, 'email' => $user->email, 'facebook_id' => $user->id]);
								Auth::login($newUser);
								return redirect('/user');
						}
        }
        catch(Exception $e) {
					dd($e);
            return redirect('login')->with(['error' => 'Please check again. '. $e]);
        }
    }
}
