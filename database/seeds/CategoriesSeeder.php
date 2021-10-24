<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;
use Illuminate\Support\Arr;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for($i = 0; $i < 10; $i++) {
            $cat = new Category();
            $cat->name = Str::random(20);
            $cat->parent = Arr::random([$this->getRandomCategoryId(), null]);
            $cat ->save();
        }
    }

    function getRandomCategoryId() {
        $category = \App\Category::inRandomOrder()->first();
        if ($category)
            return $category->id;
        return null;
    }
}
