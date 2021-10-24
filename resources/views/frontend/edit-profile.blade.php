@extends('frontend.layout')

@section('css')
<style>
.card.user-card {
    border-top: none;
    -webkit-box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
    box-shadow: 0 0 1px 2px rgba(0,0,0,0.05), 0 -2px 1px -2px rgba(0,0,0,0.04), 0 0 0 -1px rgba(0,0,0,0.05);
    -webkit-transition: all 150ms linear;
    transition: all 150ms linear;
}

.card {
    border-radius: 5px;
    -webkit-box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    box-shadow: 0 1px 2.94px 0.06px rgba(4,26,55,0.16);
    border: none;
    margin-bottom: 30px;
    -webkit-transition: all 0.3s ease-in-out;
    transition: all 0.3s ease-in-out;
}

.card .card-header {
    background-color: transparent;
    border-bottom: none;
    padding: 25px;
}

.card .card-header h5 {
    margin-bottom: 0;
    color: #222;
    font-size: 14px;
    font-weight: 600;
    display: inline-block;
    margin-right: 10px;
    line-height: 1.4;
}

.card .card-header+.card-block, .card .card-header+.card-block-big {
    padding-top: 0;
}

.user-card .card-block {
    text-align: center;
}

.card .card-block {
    padding: 25px;
}

.user-card .card-block .user-image {
    position: relative;
    margin: 0 auto;
    display: inline-block;
    padding: 5px;
    width: 110px;
    height: 110px;
}

.user-card .card-block .user-image img {
    z-index: 20;
    position: absolute;
    top: 5px;
    left: 5px;
    width: 100px;
    height: 100px;
}

.img-radius {
    border-radius: 50%;
}

.f-w-600 {
    font-weight: 600;
}

.m-b-10 {
    margin-bottom: 10px;
}

.m-t-25 {
    margin-top: 25px;
}

.m-t-15 {
    margin-top: 15px;
}

.card .card-block p {
    line-height: 1;
    margin-bottom: 0;
}

.text-muted {
    color: #919aa3!important;
}

.user-card .card-block .activity-leval li.active {
    background-color: #2ed8b6;
}

.user-card .card-block .activity-leval li {
    display: inline-block;
    width: 15%;
    height: 4px;
    margin: 0 3px;
    background-color: #ccc;
}

.user-card .card-block .counter-block {
    color: #fff;
}

.bg-c-blue {
    background: linear-gradient(45deg,#4099ff,#73b4ff);
}

.bg-c-green {
    background: linear-gradient(45deg,#2ed8b6,#59e0c5);
}

.bg-c-yellow {
    background: linear-gradient(45deg,#FFB64D,#ffcb80);
}

.bg-c-pink {
    background: linear-gradient(45deg,#FF5370,#ff869a);
}

.m-t-10 {
    margin-top: 10px;
}

.p-20 {
    padding: 20px;
}

.user-card .card-block .user-social-link i {
    font-size: 30px;
}

.text-facebook {
    color: #3B5997;
}

.text-twitter {
    color: #42C0FB;
}

.text-dribbble {
    color: #EC4A89;
}

.user-card .card-block .user-image:before {
    bottom: 0;
    border-bottom-left-radius: 50px;
    border-bottom-right-radius: 50px;
}

.user-card .card-block .user-image:after, .user-card .card-block .user-image:before {
    content: "";
    width: 100%;
    height: 48%;
    border: 2px solid #4099ff;
    position: absolute;
    left: 0;
    z-index: 10;
}

.user-card .card-block .user-image:after {
    top: 0;
    border-top-left-radius: 50px;
    border-top-right-radius: 50px;
}

.user-card .card-block .user-image:after, .user-card .card-block .user-image:before {
    content: "";
    width: 100%;
    height: 48%;
    border: 2px solid #4099ff;
    position: absolute;
    left: 0;
    z-index: 10;
}
</style>
@endsection
@php
$user = auth()->user();
@endphp
@section('content')
@if(session()->has('success'))
    <div class="alert alert-success">
        {{ session()->get('success') }}
    </div>
@endif
@if(session()->has('danger'))
    <div class="alert alert-danger">
        {{ session()->get('danger') }}
    </div>
@endif
<div class="card border-0 shadow-none user-card d-flex align-items-center justify-content-center">
  <div class="card-header">
      <h4>Profile</h4>
  </div>
  <div class="card-block">
      <div class="user-image">
          <img src="{{ Voyager::Image($user->avatar) }}" class="img-radius" alt="User-Profile-Image">
      </div>
      <h6 class="f-w-600 m-t-25 m-b-10">{{$user->name}}</h6>
      <p class="text-muted"><span class="text-success">Active</span>@if($user->gender)  | {{ $user->gender }} @endif @if($user->date_of_birth)  | Born {{ \Carbon\Carbon::parse($user->date_of_birth)->format('d.m.Y')}} @endif</p>
      <hr>
			{{ Form::open(['route' => ['user.update', $user], 'method' => 'put', 'files' => true]) }}
				{{ Form::token() }}
				<div class="form-group text-left">
					{{ Form::label('name', 'Name') }}
					{{ Form::text('name', $user->name, ['class' => 'form-control']) }}
				</div>
				<div class="form-group text-left">
					{{ Form::label('gender', 'Gender') }}
					{{ Form::select('gender', array(null => 'Choose gender', 'male' => 'Male', 'female' => 'Female'), $user->gender, ['class' => 'form-control']) }}
				</div>
				<div class="form-group text-left">
					{{ Form::label('date_of_birth', 'Date of birth') }}
					{{ Form::date('date_of_birth', $user->date_of_birth, ['class' => 'form-control']) }}
				</div>
				<div class="form-group text-left">
					<div class="btn-group">
						{{ Form::submit('Save ', ['class' => 'btn btn-primary mr-3']) }}
						<a href="{{ route('user.index') }}" class="btn btn-outline-info">Back</a>
					</div>
				</div>
			{{ Form::close() }}
	</div>
</div>
@endsection
