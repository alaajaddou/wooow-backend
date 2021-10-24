<?php

namespace App;

use App\Item;
use Maatwebsite\Excel\Concerns\ToModel;

class ItemImport implements ToModel
{
    public function model(array $row)
    {
        return new Item([
            'id' => $row[0],
            'name' => $row[1],
            'image' => $row[2],
            'description' => $row[3],
            'price' => $row[4],
            'category_id' => $row[5],
            'quantity' => $row[12],
        ]);
    }

    public function batchSize(): int
    {
        return 2500;
    }
}
