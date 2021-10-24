@extends('frontend.layout')

@section('css')
<style>
.notification {
	border-top: 0;
	border-left: 0;
	border-right: 0;
	border-bottom: 1px solid #c79409;
}
.notification:last-child {
	border-bottom: 0;
}

.unseen {
	font-weight: bolder;
}
</style>
@endsection

@section('content')
@php
	$notifications = auth()->user()->notifications;
@endphp
@if($notifications->count() > 0)
<div class="container-fluid">
	<div class="row">
		<div class="col-12">
			<div class="list-group">
				@foreach($notifications as $notification)
					<div class="list-group-item @if($notification->is_read) unseen bg-light @endif notification mb-1">
						<div class="d-flex w-100 justify-content-between">
				      <h5 class="mb-1"><i class="fas fa-star" style="color: #c79409;"></i>&nbsp;{{ $notification->title }}</h5>
				      <small style="color: #c79409;">{{ $notification->created_at->diffForHumans() }}</small>
				    </div>
						<p class="mb-1">{{ $notification->body }}</p>
					</div>
				@endforeach
			</div>
		</div>
	</div>
</div>
	<script>
		$.ajax({
		   url: '{{ route("read-notifications") }}',
		   type: 'PUT',
		   success: function(response) { }
		});
	</script>
@else
	<div class="container">
		<div class="row h-100">
			<div class="col d-flex align-items-center justify-content-center">
				<div class="icon text-center" style="color: #cecece;">
					<i class="far fa-bell-slash fa-3x mb-3"></i>
					<h4 class="text">{{ __('labels.no_notifications') }}</h4>
				</div>
			</div>
		</div>
	</div>
@endif
@endsection
