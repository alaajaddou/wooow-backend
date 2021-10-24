<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Str;
use TCG\Voyager\Models\Role;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    // use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    public function index() {
        return view('frontend.register');
    }

    public function showRegistrationForm() {
        return view('auth.register');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create()
    {
        $data = request()->only(['name', 'email', 'password', 'password_confirmation']);

        $findUser = User::where('email', $data['email'])->first();
        if($findUser){
            $error = __('auth.email_exists');
            return redirect('register')->with('error', $error);
        }else{
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $role = Role::find(2);

            $user->roles()->attach($role);
            auth()->login($user);
            // $user = $this->updateToken();
            return redirect()->route('user.index');
        }

    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register()
    {
        $data = request()->only(['name', 'email', 'password', 'password_confirmation']);

        $findUser = User::where('email', $data['email'])->first();
        if($findUser){
            $error = __('auth.email_exists');
            return redirect('register')->with('error', $error);
        }else{
            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            $role = Role::find(2);

            $user->roles()->attach($role);
            auth()->login($user);
            // $user = $this->updateToken();
            return redirect()->route('user.index');
        }

    }

    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function updateToken()
    {
        $token = Str::random(60);
        $hash = hash('sha256', $token);
        auth()->user()->forceFill([
            'api_token' => $hash,
        ])->save();

        return auth()->user();
    }
}
