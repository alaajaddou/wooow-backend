<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use TCG\Voyager\Traits\Translatable;
class Item extends Model
{
    use Translatable;
    protected $translatable = ['name', 'description'];

    protected $fillable = [
        'id',
        'name',
        'image',
        'description',
        'price',
        'category_id',
        'quantity'
     ];

     public function category() {
       return $this->belongsTo(Category::class);
     }

}
