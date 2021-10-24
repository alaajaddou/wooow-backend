@extends('frontend.layout')

@section('css')
@endsection

@section('content')
<div class="container pt-3">
		<div class="row">
			<div class="col-md-4 order-md-2 mb-4">
				<h4 class="d-flex justify-content-between align-items-center mb-3">
					<span class="text-muted">{{ __('labels.your_cart') }}</span>
					<span class="badge badge-secondary badge-pill">{{ Cart::session(auth()->user()->id)->getContent()->count() }}</span>
				</h4>
				<ul class="list-group mb-3">
					@foreach(Cart::session(auth()->user()->id)->getContent() as $item)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">{{ $item->name }}</h6>
								<small class="text-muted"><b>{{ __("labels.quantity") }}: </b>{{ $item->quantity }} pcs</small>
							</div>
							<span class="text-muted">₪{{ $item->getPriceSum() }}</span>
						</li>
					@endforeach
					<li class="list-group-item d-flex justify-content-between">
						<span>{{ __('labels.total') }}</span>
						<strong>₪{{ Cart::session(auth()->user()->id)->getTotal() }}</strong>
					</li>
				</ul>
			</div>
			@php
				$user = auth()->user();
			@endphp
			<div class="col-md-8 order-md-1">
				<h4 class="mb-3">{{ __('labels.billing_address') }}</h4>
				<ul class="list-group mb-3">
					@if($user->address[0]->city)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">{{ __('labels.city') }}</h6>
								<small class="text-muted">{{ $user->address[0]->city ?? '' }}</small>
							</div>
						</li>
					@endif
					@if($user->address[0]->village)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">{{ __('labels.village') }}</h6>
								<small class="text-muted">{{$user->address[0]->village ?? ''}}</small>
							</div>
						</li>
					@endif
					@if($user->address[0]->phone)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">{{ __('labels.phone') }}</h6>
								<small class="text-muted">{{$user->address[0]->phone ?? ''}}</small>
							</div>
						</li>
					@endif
					@if($user->address[0]->mobile)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">{{ __('labels.mobile') }}</h6>
								<small class="text-muted">{{$user->address[0]->mobile ?? ''}}</small>
							</div>
						</li>
					@endif
					@if($user->address[0]->address)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">{{ __('labels.address') }}</h6>
								<small class="text-muted">{{$user->address[0]->address ?? ''}}</small>
							</div>
						</li>
					@endif
					@if($user->address[0]->building)
						<li class="list-group-item d-flex justify-content-between lh-condensed">
							<div>
								<h6 class="my-0">{{ __('labels.building') }}</h6>
								<small class="text-muted">{{$user->address[0]->building ?? ''}}</small>
							</div>
						</li>
					@endif
				</ul>
			</div>
		</div>

		<footer class="mb-5 pb-3 text-muted text-center text-small">
			{{ Form::open(['route' => 'create-order'])}}
			{{ Form::button(__('labels.complete_order') .' <i class="fas fa-paper-plane"></i>', ['type' => 'submit', 'class' => 'btn btn-primary btn-block']) }}
			{{ Form::token() }}
			{{ Form::close() }}
		</footer>
	</div>
@endsection
