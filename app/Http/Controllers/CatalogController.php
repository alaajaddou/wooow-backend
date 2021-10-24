<?php

namespace App\Http\Controllers;

use View;
use App\Catalog;
use App\Category;
use App\Item;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public $categories = [];

    private function listCategories() {
        if (count($this->categories) === 0) {
            $this->categories = Category::withTranslations()->with('homeItems')->get();
        }
        return $this->categories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::withTranslations()->get();
        return view('frontend.home', ['categories' => $categories]);
    }

    function loadItems($category = null)
    {
        $categoryObject = Category::withTranslations()->where('id', $category)->first();
        $itemsQuery = Item::query();

        if ($category != null) {
            $itemsQuery = $itemsQuery->where('category_id', $categoryObject->id);
        }

        $items = $itemsQuery->withTranslations()->get();
        return view('frontend.list', ['items' => $items, 'category' => $categoryObject]);
    }

    function getCategories()
    {
        $categories = Category::withTranslations()->get();
        // dd($newCategories);
        return view('frontend.categories', ['categories' => $categories]);
    }

    public function smallCategories() {
        $html = view('frontend.partials.small-categories', ['categories' => $this->listCategories()])->render();
        return json_encode(['html' => $html]);
    }

    function getCategory()
    {
        $html = view('frontend.partials.home-categories', ['categories' => $this->listCategories()])->render();
        return json_encode(['html' => $html]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Catalog $catalog
     * @return \Illuminate\Http\Response
     */
    public function show($item_id)
    {
        $item = Item::withTranslations()->findOrFail($item_id);
        return view('frontend.item', ['item' => $item, 'category' => $item->category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Catalog $catalog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Catalog $catalog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Catalog $catalog
     * @return \Illuminate\Http\Response
     */
    public function destroy(Catalog $catalog)
    {
        //
    }

    public function search()
    {
        return view('frontend.search');
    }

    public function searchResult()
    {
        $data = request()->all();
        $itemsQuery = Item::query();
        if (request()->has('query')) {
            $itemsQuery = $itemsQuery->where('name', 'LIKE', '%' . $data['query'] . '%');
        }
        if (request()->has('category_id')) {
            $itemsQuery = $itemsQuery->where('category_id', $data['category_id']);
        }

        $items = $itemsQuery->withTranslations()->get();
        $html = view('frontend.search-result', ['items' => $items])->render();
        return response()->json($html, 201);
    }
}
