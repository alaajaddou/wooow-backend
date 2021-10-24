<?php

namespace App;

use TCG\Voyager\Traits\Translatable;

class Page extends \TCG\Voyager\Models\Page
{
    use Translatable;
	protected $fillable = ['title', 'slug', 'body'];
}
