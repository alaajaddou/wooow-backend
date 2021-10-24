@extends('frontend.layout')

@section('content')
    @if(!auth()->user() || Wishlist::session(auth()->user()->id.'_wishlist')->getContent()->count() == 0)
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
            .item-image {
                width: 20%;
                height: 70px;
                background-size: 100%;
                float: left;
            }
        </style>
        <div class="container-fluid cart">
            <div class="row py-2 bg-light">
                <div class="col-12">
                    <h4>
                        {{ __('labels.wishlist_items') }}
                        <button role="button" class="btn btn-outline-danger float-right clear-items" data-type="wishlist"><i class="fas fa-trash"></i>
                            {{ __('labels.clear_items') }}</button>
                    </h4>
                </div>
            </div>
            <div class="scrollable">
                @foreach(Wishlist::session(auth()->user()->id.'_wishlist')->getContent() as $item)
                    <style>
                        .item-image-{{$item->id}}{
                            background: url("@if($item->associatedModel->image) {{ Voyager::Image($item->associatedModel->image) }} @else https://via.placeholder.com/70 @endif") xno-repeat;
                        }
                    </style>
                    <div class="row py-2" id="{{ $item->id }}">
                        <div class="col-12 card border-bottom">
                            <div class="card-body p-0">
                                <div class="item-image item-image-{{$item->id}} img-thumbnail"></div>
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
                                            <div class="col-6 d-flex align-items-center">
                                                <div class="text-muted small"><b>{{ __('labels.price') }}: </b><span id="price-{{ $item->id }}">{{ $item->price }}</span></div>
                                            </div>
                                            <div class="col-6 d-flex align-items-center">
                                                <a href="{{ url('item/' . $item->associatedModel->id)}}" class="btn btn-primary btn-block btn-sm" type="button">
                                                    {{ __('labels.view_item') }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
@endsection
