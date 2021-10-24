<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\User;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->user();

        
            $findUser = User::where('google_id', $user->id)->first();
	
            if($findUser){
                auth()->login($findUser);
                return redirect('/user');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'password' => encrypt('123456dummy')
                ]);
                Auth::login($newUser);
                return redirect('/user');
            }

        } catch (Exception $e) {
            if ($e->getCode() === "23000") {
                $error = __('auth.email_exists');
            } else {
                $error = __('auth.register_failed');
            }
            return redirect('register')->with('error', $error);
        }
    }
}
