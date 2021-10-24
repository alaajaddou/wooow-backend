<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Item;
use App\Category;

class ItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        for ($i = 0; $i < 150; $i++) {
            $item = new Item();
            $item->name = Str::random(20);
            $item->image = 'https://via.placeholder.com/150';
            $item->description = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.';
            $item->price = rand(1, 200);
            $item->category_id = $this->getRandomCategoryId();
            $item->save();
        }
    }

    private function getRandomCategoryId() {
        $category = Category::inRandomOrder()->first();
        return $category->id;
    }
}
