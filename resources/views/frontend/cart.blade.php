@extends('frontend.layout')

@section('content')
@if(!auth()->user() || Cart::session(auth()->user()->id)->getContent()->count() == 0)
  <div class="row h-100">
    <div class="col d-flex align-items-center justify-content-center">
      <div class="icon text-center" style="color: #cecece;">
        <i class="fas fa-shopping-cart fa-3x mb-3"></i>
        <h4 class="text mb-3">{{ __('labels.no_items') }}</h4>
        <a class="btn btn-secondary" href="{{ route('home') }}">{{ __('labels.shop_now') }} <i class="fas fa-paper-plane"></i></a>
      </div>
    </div>
  </div>
  @else

  <style>
    .cart {
        height: calc(100% - 152px);
    }
    .scrollable {
        height: 100%;
        overflow-y: scroll;
    }
    .item-details {
        width: 80%;
        float: left;
    }
    .card-text {
        font-size: 15px;
        white-space: nowrap;
        width:100%;
        overflow: hidden;
        text-overflow: ellipsis;
    }
    .card {
        border: none;
    }
  </style>
  <div class="container-fluid cart">
  <div class="row py-2 bg-light">
    <div class="col-12">
      <h4>
          {{ __('labels.cart_items') }}
        <button role="button" class="btn btn-outline-danger float-right clear-items" data-type="cart"><i class="fas fa-trash"></i> {{ __('labels.clear_items') }}</button>
      </h4>
    </div>
  </div>
  <div class="scrollable">
    @foreach(Cart::session(auth()->user()->id)->getContent() as $item)
    <style>
            .item-image{
                width: 20%;
                height: 70px;
                background: url("@if($item->associatedModel->image) {{ Voyager::Image($item->associatedModel->image) }} @else https://via.placeholder.com/70 @endif") xno-repeat;
                background-size: 100%;
                float: left;
            }
    </style>
    <div class="row py-2" id="{{ $item->id }}">
      <div class="col-12 card border-bottom">
        <div class="card-body p-0">
          <div class="item-image img-thumbnail"></div>
          <div class="item-details">
            <div class="container-fluid">
              <div class="row">
                <div class="col-9">
                  <p class="card-text">
                    {{ $item->name }}
                  </p>
                </div>
                <div class="col-3 text-right">
                  <p class="card-text text-right">
                    <a role="button" data-id="{{ $item->id }}" data-type="wishlist" class="btn btn-outline-danger remove-item"><i class="fas fa-trash"></i></a>
                  </p>
                </div>
              </div>
              <div class="row">
                <div class="col-6">
                  <div class="text-muted small"><b>{{ __('labels.price') }}: </b><span id="price-{{ $item->id }}">{{ $item->price }}</span></div>
                  <span class="text-danger"><b>{{ __('labels.item_total') }}: </b><span id="item-total-{{ $item->id }}">{{ $item->getPriceSum() }}</span></span>
                </div>
                <div class="col-6">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <button class="btn btn-outline-secondary" type="button" id="quantity-{{ $item->id }}-decrement"
                        @if ($item->quantity === 1) disabled @endif
                        onclick="JavaScript:addToCart({id: '{{ $item->id }}', isIncrement: false, itemQuantity: '{{ $item->associatedModel->quantity }}' });"
                       >-</button>
                    </div>
                    <label class="form-control text-center" id="quantity-{{ $item->id }}">{{ $item->quantity }}</label>
                    <div class="input-group-append">
                      <button class="btn btn-outline-secondary" type="button" id="quantity-{{ $item->id }}-increment"
                        @if ($item->quantity === $item->associatedModel->quantity) disabled @endif
                        onclick="JavaScript:addToCart({id: '{{ $item->id }}', isIncrement: true, itemQuantity: '{{ $item->associatedModel->quantity }}' });"
                       >+</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  <div class="row" style="height: 50px;">
    <div class="col-12 p-0 card border-bottom">
      <!-- <div class="card-header text-right">
        <span><b>Total: </b>{{ Cart::getSubTotal() }}</span>
      </div>
      <div class="card-body p-0">
        <div class="input-group input-group-sm">
          <div class="input-group-prepend">
            <span class="input-group-text" id="inputGroup-sizing-sm">Coupon</span>
          </div>
          <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
        </div>
      </div> -->
      <div class="card-footer d-flex align-items-center justify-content-between">
        <!-- <span class="text text-muted"><b>Discount: </b> {{ Cart::getTotal() }}</span> -->
        <span><b>{{ __('labels.total') }}: </b> <span id="cart-total">{{ Cart::session(auth()->user()->id)->getTotal() }}</span></span>
      </div>
    </div>
  </div>
  <div class="row">
    <a href="{{ route('address') }}" class="btn btn-primary btn-block d-flex align-items-center justify-content-center">
        {{ __('labels.to_address') }} &nbsp; <i class="fas fa-money-bill-wave-alt"></i></a>
  </div>
</div>
  @endif
@endsection
