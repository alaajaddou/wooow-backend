<?php
namespace App\Http\Controllers\Api;

use App\Category;
use App\Http\Controllers\Controller;
use App\Item;
use App\Order;
use App\OrderStatus;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function __construct() {

    }

    public function getAllData() {
        $allData = [];
        // if app doesn't have session.
            // - categories.
        $allData['categories'] = $this->listCategories();
        // - items.
        $allData['items'] = Item::all();
        // TODO: - notifications.

        // if app has session we need to get also.
        if (auth()->user()) {
            // - user.
            $allData['user'] = auth()->user();
            // - orders.
            $allData['orders'] = Order::where('created_by', auth()->user()->id)->get();
            // - orderStatuses.
            $allData['orderStatuses'] = OrderStatus::all();
        }

        return response()->json($allData);
    }

    /**
     * @return Category[]|array|Collection
     */
    public function listCategories() {
        try {
            $categories = Category::all();
        } catch (Exception $exception) {
            $categories = [];
        }
        return $categories;
    }
}
