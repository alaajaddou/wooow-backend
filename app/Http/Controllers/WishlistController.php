<?php

namespace App\Http\Controllers;


class WishListController extends Controller
{
    public function index()
    {
        $items = [];
        $wish_list = Wishlist::session(auth()->user()->id)->getContent();
        

//        $wish_list->getContent()->each(function ($item) use (&$items) {
//            $items[] = $item;
//        });

        if (request()->ajax()) {
            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'wishlist get items success'
            ), 200, []);
        } else {
            return view('wishlist', ['items' => $items]);
        }
    }

    public function add()
    {
//        $wish_list = app('wishlist');
//        $id = request('id');
//        $name = request('name');
//
//        $wish_list->add($id, $name, array());
    }

    public function delete($id)
    {
//        $wish_list = app('wishlist');
//
//        $wish_list->remove($id);
//
//        return response(array(
//            'success' => true,
//            'data' => $id,
//            'message' => "cart item {$id} removed."
//        ), 200, []);
    }
}
