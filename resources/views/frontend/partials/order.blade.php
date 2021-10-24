<div class="card py-1 my-1">
	<div class="title p-1 mb-0">{{ __('labels.purchase_receipt') }}</div>
	<div class="info p-1 d-flex justify-content-between">
			<label style="direction: rtl;"><b>{{ __('labels.date') }}: </b>{{ $order->created_at->locale(app()->getLocale())->format('j F, Y') }}</label>
			<label style="direction: rtl;"><b>{{ __('labels.order_num') }}: </b>{{ $order->id }}</label>
	</div>
	<div class="tracking">
			<div class="title p-1 mb-0">{{ __('labels.track_order') }}</div>
	</div>
	@if($order->status === 0)
		<div class="alert alert-danger text-center">{{ __('labels.cancelled') }}</div>
	@else
		<div class="d-flex align-items-center justify-content-between position-relative px-2">
			<div class="position-absolute border-top" style="height:1px; z-index: 0; width:90%; left: 5%;"></div>
			<style>
			.text-grey { color: #ccc;}
			</style>
			@foreach($statuses as $index => $status)
				@if($index != 0 && $index != 1)
					<div class="text @if($order->status >= $status->id) text-success @elseif($order->status+1 === $status->id) text-warning @else text-grey @endif text-center d-flex align-items-center flex-column bg-white p-1 " style="z-index: 1;">
						<i class="fas  @if($order->status >= $status->id) fa-check-circle @else fa-exclamation-circle @endif"></i>
						<label>{{ $status->name }}</label>
					</div>
				@endif
			@endforeach
		</div>
	@endif
</div>
