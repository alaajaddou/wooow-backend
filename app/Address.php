<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Address extends Model
{
    protected $fillable = [
      "city", "village", "phone", "mobile", "address", "building", "user_id"
  ];
}
