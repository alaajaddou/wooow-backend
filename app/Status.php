<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Status extends Model
{       use Translatable;
        protected $translatable = ['name'];
        protected $fillable = [
            'id',
            'name',
            'order'
         ];
}
