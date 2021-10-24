<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Notification extends Model
{
use Translatable;

  public function users() {
    return $this->belongsToMany('App\User', 'notification_users', 'notification_id', 'user_id')->orderBy('created_at', 'desc');
  }
}
