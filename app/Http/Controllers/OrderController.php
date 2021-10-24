<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\OrderStatus;
use App\Status;
use App\OrderItem;
use App\Item;
use App\Address;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Cart;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      if (!auth()->check()) {
        return redirect()->route('login');
      }
      $orders = auth()->user()->orders;
      $statuses = Status::withTranslations()->orderBy('order')->get();
      return view('frontend.order-list', ['orders' => $orders, 'statuses' => $statuses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!auth()->check()) {
          return redirect()->route('login');
        }
        $user = auth()->user();
        $items = Cart::session($user->id)->getContent();
        $order = new Order();
        $order->status = 1;
        $order->created_by = $user->id;
        $order->modified_by = $user->id;
        $order->address_id = Address::where('user_id', $user->id)->latest()->first()->id;
        $order->save();
        foreach($items as $item) {
            $item_id = $this->getItemId($item->id);
            $order_item = new OrderItem();
            $order_item->order_id = $order->id;
            $order_item->item_id = $item_id;
            $order_item->quantity = $item->quantity;
            $order_item->price = $item->price;
            $order_item->total = $item->getPriceSum();
            $order_item->save();
        }
        Cart::session($user->id)->clear();
        return redirect()->route('order-list')->with(['message' => __('labels.order_success')]);
    }

    private function getItemId($itemId) {
      $regex = '/\d+/';
      preg_match($regex, $itemId, $matches);
      return $matches[0];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getOrdersByUser() {
        $user = Auth::user();
        $orders = Order::select(['id', 'status', 'address_id'])->where('created_by', $user->id)->get()->toArray();
        foreach ($orders as $index => $order) {
            $order['items'] = OrderItem::select(['item_id', 'quantity', 'total'])->where('order_id', $order['id'])->get()->toArray();
            $total = 0;
            foreach ($order['items'] as $index => $item) {
              $order['items'][$index]['item'] = Item::where('id', $item['item_id'])->first()->toArray();
              $total += $order['items'][$index]['total'];
            }
            $order['totalNet'] = $total;
            $order['numberOfItems'] = count($order['items']);
            $order['address'] = Address::select(["city", "village", "phone", "mobile", "address", "building"])->where('id', $order['address_id'])->first()->toArray();
            $orders[$index] = $order;
        }
        return response()->json($orders, 200);
    }

    public function getOrderStatuses() {
        $statuses = Status::withTranslations()->select(['id', 'name', 'order'])->orderBy('order', 'asc')->get()->toArray();
        return response()->json($statuses, 200);
    }

    public function cancelOrder(Request $request) {
        $user = Auth::user();
        $requestBody = json_decode($request->getContent());
        if ($user && $requestBody->id) {
            $order = Order::where('id', $requestBody->id)->first();
            if ($order->status == 0) {
                $responseText = __('labels.cancel_duplicate');
            } else {
                if ($order && ($order->status != 1 && $order->status != 2)) {
                    $order->status = 0;
                    $order->updated_at = Carbon::now()->setTimeZone('Asia/Jerusalem');
                    $order->modified_by = $user->id;
                    $order->save();
                    $responseText = __('labels.cancel_accept');
                } else {
                    $responseText = __('labels.cancel_reject');
                }
            }
        } else {
            $responseText = __('labels.cancel_reject');
        }
        return response()->json($responseText, 209);
    }

    public function cart() {
      return view('frontend.cart');
    }

    public function checkout() {
      return view('frontend.checkout');
    }

    public function addToCart() {
      if (auth()->check()) {
        $userID = auth()->user()->id;
        preg_match("/\d+/", request()->id, $matches);
        $item_id = $matches[0];
        $isIncrement = request()->isIncrement;
        $itemModel = Item::findOrFail($item_id);
        if (Cart::session($userID)->getContent()->has('cart_' . $itemModel->id)) {
            $newQuantity = $isIncrement === 'true' ? 1 : -1;
            Cart::session($userID)->update('cart_' . $itemModel->id, [
            'quantity' => $newQuantity
          ]);
          return response()->json(['message' => __('labels.update_success_message')], 203);
        } else {
          Cart::session($userID)->add(array(
            'id' => 'cart_' . $itemModel->id,
            'name' => $itemModel->name,
            'price' => $itemModel->price,
            'quantity' => 1,
            'attributes' => array(),
            'associatedModel' => $itemModel
          ));
          return response()->json(['message' => __('labels.added_success_message')], 201);
        }
      } else {
        return response()->json(['message' => __('labels.unauthorized')], 401);
      }
    }
    public function emptyCart() {
      Cart::session(auth()->user()->id)->clear();
      return redirect()->route('cart');
    }

    public function removeFromCart() {
      if (auth()->check()) {
          if (request()->id === 'all') {
              $this->emptyCart();
          } else {
              Cart::session(auth()->user()->id)->remove(request()->id);
          }
        return response()->json(['message' => __('labels.remove_success_message')], 203);
      } else {
        return response()->json(['message' => __('labels.unauthorized', 'ar')], 401);
      }
    }

    public function getTotal() {
      return getCartTotal();
    }
    public function getTotalQuantity() {
      return getCartQuantity();
    }
}
