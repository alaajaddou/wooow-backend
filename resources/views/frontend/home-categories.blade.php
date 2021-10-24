@if($categories && count($categories) > 0)
	@foreach($categories as $category)
	@if (count($category->homeItems) > 0)
		<div class="row">
			<div class="col-12">
				<div class="row"><h4 class="text-center h4 w-100 my-3">{{ $category->name }}</h4></div>
					<div id="{{$category->id}}" class="carousel slide">
						<div class="carousel-inner py-1">
							@foreach($category->items->chunk(2) as $chunk)
								<div class="carousel-item @if($loop->first) active @endif">
									<div class="container">
										<div class="row">
											@foreach($chunk as $index => $item)
												@include('frontend.partials.item', ['item' => $item, 'category' => $item->category])
											@endforeach
										</div>
								 </div>
							 </div>
							@endforeach
						</div>
					</div>
			</div>
		</div>
		<script>
			$("#{{$category->id}}").carousel({
				touch: true,
				ride: 'false',
				interval: false,
			});
		</script>
	@endif
	@endforeach
@endif
