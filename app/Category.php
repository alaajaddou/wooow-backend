<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use TCG\Voyager\Traits\Translatable;

class Category extends Model
{
    use Translatable;
    protected $translatable = ['name'];

    protected $fillable = [
        'id',
        'name',
        'parent',
        'items'
    ];

    public function items() {
      return $this->hasMany(Item::class);
    }

    public function homeItems() {
        return $this->hasMany(Item::class);
    }

    public function categories() {
      return $this->hasMany(Category::class, 'parent');
    }
}
