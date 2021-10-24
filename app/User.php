<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends \TCG\Voyager\Models\User
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'gender', 'date_of_birth', 'google_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function address() {
      return $this->hasMany('App\Address')->latest();
    }

    public function orders() {
      return $this->hasMany('App\Order', 'created_by')->orderBy('id', 'desc');
    }

    public function wishlistItems() {
      return $this->hasMany('App\WishlistItem', 'created_by');
    }

    public function notifications() {
      return $this->hasMany('App\Notification', 'notification_users', 'notification_id', 'user_id')->orWhereNull('user_id')->orderBy('created_at', 'desc');
    }

    public function unreadNotifications() {
      return $this->belongsToMany('App\Notification', 'notification_users', 'user_id', 'notification_id')->where('is_read', '0');
    }
}
