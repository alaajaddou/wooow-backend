@extends('frontend.layout')

@section('css')
<style>

	.item-image-{{ $item->category->id ?? '' }}-{{$item->id}} {
		 background-image: url("@if($item->image) {{ Voyager::Image($item->image) }} @else https://via.placeholder.com/100 @endif");
		 background-color: #cccccc;
		 background-position: center;
		 background-repeat: no-repeat;
		 background-size: cover;
		 position: relative;
		 width: 100%; height: 500px;
	}
	.left-2 {
		left: 2%;
	}
	.right-2 {
		right: 2%;
	}

/* The ribbons */

.corner-ribbon{
  width: 200px;
  background: #e43;
  position: absolute;
  top: 25px;
  left: -50px;
  text-align: center;
  line-height: 20px;
  letter-spacing: 0px;
  color: #f0f0f0;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

/* Custom styles */

.corner-ribbon.sticky{
  position: fixed;
}

.corner-ribbon.shadow{
  box-shadow: 0 0 3px rgba(0,0,0,.3);
}

/* Different positions */

.corner-ribbon.top-left{
  top: 80px;
    left: -60px;
    z-index: 10;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}
.corner-ribbon.top-left:nth-child(2) {
    top: 100px;
    left: -140px;
    width: 400px;
}

.corner-ribbon.top-right{
  top: 25px;
  right: -50px;
  left: auto;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.corner-ribbon.bottom-left{
  top: auto;
  bottom: 25px;
  left: -50px;
  transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
}

.corner-ribbon.bottom-right{
  top: auto;
  right: -50px;
  bottom: 25px;
  left: auto;
  transform: rotate(-45deg);
  -webkit-transform: rotate(-45deg);
}

/* Colors */

.corner-ribbon.white{background: #f0f0f0; color: #555;}
.corner-ribbon.black{background: #333;}
.corner-ribbon.grey{background: #999;}
.corner-ribbon.blue{background: #39d;}
.corner-ribbon.green{background: #2c7;}
.corner-ribbon.turquoise{background: #1b9;}
.corner-ribbon.purple{background: #95b;}
.corner-ribbon.red{background: #e43;}
.corner-ribbon.orange{background: #e82;}
.corner-ribbon.yellow{background: #ec0;}

    .category-title {
        border:  solid #bcc96d;
        border-width: 3px 15px 3px 15px;
    }
	</style>
@endsection

@section('content')
<div class="container-fluid">
@if($item->quantity <= 0) <div class="corner-ribbon top-left sticky red small">{{ __('labels.out_of_stock') }}</div> @endif
@if($item->discount > 0)<div class="corner-ribbon top-left sticky orange small">{{ __('labels.discount') . ' ' . $item->discount }}%</div>@endif
                    <div class="row">
                        <h4 class="text-center h4 w-100 m-3 py-2 px-3 my-1 category-title">{{ $item->name }}</h4>
                    </div>
	<div class="row pb-4">
		<div class="col-4">
			<img alt="{{ $item->name }}" src="@if($item->image) {{ Voyager::Image($item->image) }} @else https://via.placeholder.com/100 @endif" class="img-thumbnail" />
		</div>
		<div class="col-8">
			<h6 class="text-left mb-1" style="width: 100%; overflow: hidden; text-overflow: ellipsis">{{ $item->name }}</h6>
			<p class="text-left">
				<label class="text text-muted" style="font-size: 12px; margin-bottom: 0;">{{ $item->category->name ?? '' }}</label><br />
            	<label class="text font-weight-bold mb-0"><strong>₪{{ $item->price - ($item->price * $item->discount / 100) }}</strong> @if($item->discount > 0)<span class="text text-secondary"><s>₪{{ $item->price }}</s></span>@endif</label>
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-12">
			<button type="button" class="btn btn-block @if($item->quantity === 0) btn-secondary @else btn-primary @endif" @if($item->quantity === 0) disabled @endif onclick="javascript:addToCart({id: '{{ $item->id }}', isIncrement: true });"><i class="fas fa-cart-plus"></i> {{ __('labels.add_to_cart') }}</button>
		</div>
	</div>

	<div class="row">
                <div class="col-12">
                    <div class="row">
                        <h4 class="text-center h4 w-100 m-3 py-2 px-3 my-5 category-title">{{ __('labels.related_products') }}</h4>
                    </div>
                    <div>
                        <div style='overflow-x:scroll;overflow-y:hidden; width:100%; height: 390px;'>
                            <div style="width: calc(({{ count($item->category->items()->limit(6)->get()) + 1 }} * 50%) - ({{ count($item->category->items()->limit(6)->get()) + 1 }} * 17px)); padding-top: 15px;">
                                @foreach($item->category->items()->limit(6)->get() as $subItem)
                                    <div style="float: left; width: 230px;" class="mx-2 rounded bg-light">
                                        @include('frontend.partials.item', ['item' => $subItem])
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                $("#{{$item->category->id}}").carousel({
                    touch: true,
                    ride: 'false',
                    interval: false,
                });
            </script>
</div>

@endsection
