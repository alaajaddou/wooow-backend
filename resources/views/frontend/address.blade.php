@extends('frontend.layout')
@section('content')
<div class="container-fluid" style="height: calc(100% - 120px)">
	<div class="row mb-3" style="height: 120px; background: rgb(188,201,109); background: linear-gradient(90deg, rgba(188,201,109,1) 23%, rgba(255,255,255,1) 100%);">
		<div class="col-12 d-flex align-items-center justify-content-start">
			<div class="profile-image" style="height:75px; width: 75px; border: 3px solid white; border-radius: 50%; background: #fff url('{{ Voyager::image($user->avatar) }}'); background-size: 100%;"></div>
			<div  class="ml-2">
				<div class="text text-white">{{ $user->name }}</div>
				<div class="text text-white">{{ $user->email }}</div>
			</div>
		</div>
	</div>
	<div class="row h-100">
		<div class="col-12 h-100 d-flex align-items-center flex-column">
			<h3 class="page-title w-100"><i class="fas fa-globe"></i> {{ __('labels.billing_address') }} </h3>
				<div class="panel-body w-100 align-self-center">
					{{ Form::open(['route' => 'create-address', 'method' => 'post'])}}
					{{ Form::token() }}
					<div class="form-group">
						<label class="control-label" for="name">{{ __('labels.city') }}</label>
						<input required="" type="text" class="form-control" name="city" placeholder="City" value="@if($user->address->first()) {{$user->address->first()->city}} @endif">
					</div>
					<div class="form-group">
						<label class="control-label" for="name">{{ __('labels.village') }}</label>
						<input type="text" class="form-control" name="village" placeholder="Village" value="@if($user->address->first()) {{$user->address->first()->village}} @endif">
					</div>
					<div class="form-group">
						<label class="control-label" for="name">{{ __('labels.phone') }}</label>
						<input type="text" class="form-control" name="phone" placeholder="Phone" value="@if($user->address->first()) {{$user->address->first()->phone}} @endif">
					</div>
					<div class="form-group">
						<label class="control-label" for="name">{{ __('labels.mobile') }}</label>
						<input required="" type="text" class="form-control" name="mobile" placeholder="Mobile" value="@if($user->address->first()) {{$user->address->first()->mobile}} @endif">
					</div>
					<div class="form-group">
						<label class="control-label" for="name">{{ __('labels.address') }}</label>
						<input required="" type="text" class="form-control" name="address" placeholder="Address" value="@if($user->address->first()) {{$user->address->first()->address}} @endif">
					</div>
					<div class="form-group">
						<label class="control-label" for="name">{{ __('labels.building') }}</label>
						<input required="" type="text" class="form-control" name="building" placeholder="Building" value="@if($user->address->first()) {{$user->address->first()->building}} @endif">
					</div>
					<div class="form-group">
						<div class="button-group">
								<button class="btn btn-primary btn-block" type="submit">{{ __('labels.to_checkout') }}</button>
								<a class="btn btn-danger btn-block" href="{{ route('cart') }}">
                                    {{ __('labels.back') }}</a>
						</div>
					</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
