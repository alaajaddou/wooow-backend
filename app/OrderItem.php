<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class OrderItem extends Model {
    protected $fillable = [ 'order_id', 'item_id', 'quantity', 'price'];
}
