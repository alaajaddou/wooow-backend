@foreach($items as $item)
    <div class="card text-center px-1 col-6 item border-0 mb-2">
        <style>
            .item-image-{{ $item->category->id ?? '' }}-{{$item->id}}  {
                background-image: url("@if($item->image) {{ Voyager::Image($item->image) }} @else https://via.placeholder.com/100 @endif");
                background-color: #cccccc;
                background-position: center;
                background-repeat: no-repeat;
                background-size: cover;
                position: relative;
                width: 100%;
                height: 200px;
            }

            .left-2 {
                left: 2%;
            }

            .right-2 {
                right: 2%;
            }
        </style>
        <a class="nav-link text-dark p-0" href="{{ url('item/' . $item->id)}}">
            <div class="item-image-{{ $item->category->id ?? '' }}-{{$item->id}} card-img-top img-thumbnail">
                @if ($item->quantity === 0)
                    <label class="position-absolute small alert alert-danger p-0 px-1 left-2">{{ __('labels.out_of_stock') }}</label>
                @endif
                @if($item->discount && $item->discount > 0)
                    <label class="position-absolute small alert alert-success p-0 px-1 left-2 top-3" style="@if(app()->getLocale() === 'ar') direction: rtl; @endif">{{ __('labels.discount') }} {{$item->discount}}%</label>
                @endif
                @if(auth()->check())
                    @if(Wishlist::session(auth()->user()->id.'_wishlist')->has('wishlist_'.$item->id))
                        <i class="position-absolute fas fa-heart text-danger right-2" id="wishlist_{{$item->id}}" onclick="toggleWishlistItem(event, '{{$item->id}}')"></i>
                    @else
                        <i class="position-absolute far fa-heart text-secondary right-2" id="wishlist_{{$item->id}}" onclick="toggleWishlistItem(event, '{{$item->id}}')"></i>
                    @endif
                @endif
            </div>
            <div class="card-body p-0">
                <label class="text text-muted"
                       style="font-size: 12px; margin-bottom: 0;">{{ $item->category->name ?? '' }}</label>
                <h6 class="card-title mb-1"
                    style="width: 100%; overflow: hidden; text-overflow: ellipsis">{{ $item->name }}</h6>
                <label class="text font-weight-bold mb-0">
                    <strong>₪{{ $item->price - ($item->price * $item->discount / 100) }}</strong>
                    @if($item->discount > 0)
                        <span class="text text-secondary">
                            <s>₪{{ $item->price }}</s>
                        </span>
                    @endif
                </label>
            </div>
        </a>
        <div class="card-footer border-0 p-0 bg-transparent">
            <button type="button" class="btn btn-block @if($item->quantity === 0) btn-secondary @else btn-primary @endif"
                    @if($item->quantity === 0) disabled
                    @endif onclick="javascript:addToCart({id: '{{ $item->id }}', isIncrement: true });">
                <i class="fas fa-cart-plus"></i>
                {{ __('labels.add_to_cart') }}
            </button>
        </div>
    </div>
@endforeach
