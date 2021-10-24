<?php

namespace App\Http\Controllers;

use App\User;
use App\Address;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public $user;
    private function _checkUser() {
      $user = auth()->user();
          if ($user) {
            $this->user = User::find($user->id);
            return true;
          }
          return false;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!$this->_checkUser()) {
          return redirect()->route('login');
        }
        $data = ['user' => auth()->user()];
        return view('frontend.profile', $data);
    }

    public function getAddress() {
        if (!$this->_checkUser()) {
          return redirect()->route('login');
        }
        $data = ['user' => $this->user];
        return view('frontend.address', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function find($id)
    {
        if (!$this->_checkUser()) {
          return redirect()->route('login');
        }
        $user = User::find($id);
        if ($user) {
            return $user;
        }
        return response()->json([
            'error' => 'ResourceNotFound',
            'message' => 'Resource Not Found'
        ], 404);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        if (!$this->_checkUser()) {
          return redirect()->route('login');
        }
        return view('frontend.edit-profile');
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        if (!$this->_checkUser()) {
          return redirect()->route('login');
        }

        try {
          $user->name = $request['name'];
          $user->gender = $request['gender'];
          $user->date_of_birth = $request['date_of_birth'];

          $user->save();
          return redirect()->route('user.index', $user->id)->with('success', 'User has been updated!!');
        } catch(Throwable $e) {
          return redirect()->route('user.show', $user->id)->with('danger', $exception->getMessage());
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!$this->_checkUser()) {
          return redirect()->route('login');
        }
        //
    }

    public function createAddress(Request $request) {
        if (!$this->_checkUser()) {
          return redirect()->route('login');
        }
        $user = auth()->user();
        $address = $request->only(['id', 'city', 'village', 'phone', 'mobile', 'address', 'building']);
        $address['user_id'] = $user->id;
        if ($request->has('id')) {
          $status = Address::where('id', $address['id'])->update($address);
          $text = 'Updated ';
        } else {
          $status = Address::create($address);
          $text = 'Created ';
        }
        if ($status) {
          return redirect()->route('checkout');
        } else {
          return redirect()->back()->with([
              'message' => 'Please check inserted address.'
          ]);
        }
    }

    public function logout() {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect()->route('home');
    }

    public function notifications() {
      if(!auth()->user()) {
        return redirect()->route('login');
      }
      return view('frontend.notifications');
    }

    public function readNotifications() {
      if (request()->has('user_id')) {
        Notification::where('user_id', request()->user_id)->update(['is_read' => 1]);
      }
    }

    public function wishlist() {
        if(!auth()->user()) {
            return redirect()->route('login');
        }
    }
}
