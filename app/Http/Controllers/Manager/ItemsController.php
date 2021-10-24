<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use App\Item;
use App\ItemImport;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class ItemsController extends Controller {
    public function upload(Request $request)
    {
        if ($request->hasFile('file-upload')) {
            $file = $request->file('file-upload');
            $items = (new FastExcel)->import($file->path(), function ($line) {
                if (!$line || $line['id'] == '') {
                    return;
                }
                $item = [
                    'id' => $line['id'],
                    'name' => $line['name'],
                    'image' => $line['image'],
                    'description' => $line['description'],
                ];
                if ($line['price'] != '') {
                    $item['price'] = $line['price'];
                } else {
                    $item['price'] = 0;
                }

                if ($line['category_id'] != '') {
                    $item['category_id'] = $line['category_id'];
                }

                if ($line['quantity'] != '') {
                    $item['quantity'] = $line['quantity'];
                } else {
                    $item['quantity'] = 0;
                }
                return Item::create($item);
            });
        }
        return redirect('/admin/items');
    }
}
