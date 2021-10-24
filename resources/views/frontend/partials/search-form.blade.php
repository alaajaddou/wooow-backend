<div class="container-fluid">
	<div class="row my-1">
		<div class="@if(count($category->categories ?? []) > 0) col-6 @else col-12 @endif">
			{{ Form::select('sub-category', [
    'price_asc' => __('labels.price_asc'),
    'price_desc' => __('labels.price_desc')
], null, ['class'=>'form-control', 'id' => 'filter'])}}
		</div>
		<input type="hidden" value="{{ $category->id ?? '' }}" name="category" id="category" />
		@if(count($category->categories ?? []) > 0)
			<div class="col-6">
				{{ Form::select('sub-category', $category->categories ?? [], null, ['class'=>'form-control', 'id' => 'sub-category'])}}
			</div>
		 @endif
	</div>
	<div class="row mb-3">
		<div class="col-12">
			<div class="input-group">
				<input type="text" class="form-control" id="search" placeholder="{{ __('labels.search') }}" aria-label="Search" aria-describedby="basic-addon2">
			</div>
		</div>
	</div>
	<div class="row no-gutters" id="item-container">
	</div>
</div>
