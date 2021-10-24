@extends('frontend.layout')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <style>
                .category-image-{{$category->id}}  {
                    background-image: url("@if($category->image) {{ Voyager::Image($category->image) }} @else https://via.placeholder.com/120x400 @endif");
                    background-color: #cccccc;
                    height: 120px;
                    background-position: center;
                    background-repeat: no-repeat;
                    background-size: cover;
                    position: relative;
                }

                .text-shadowed {
                    text-shadow: 1px 1px 1px #555555;
                }
            </style>
            <div class="col-12 category-image-{{$category->id}} d-flex align-items-center justify-content-center my-2 nav-link">
                <div class="h3 text-white bg-wooow">{{ $category->name }}</div>
            </div>
        </div>
    <!-- <div class="row my-1">
			<div class="col-6">
				<select class="form-control">
					<option>None</option>
				</select>
			</div>
			<div class="col-6">
				<select class="form-control">
					<option>None</option>
				</select>
			</div>
		</div>
		<div class="row">
			<div class="col-12">
				<div class="input-group">
				  <input type="text" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="basic-addon2">
				  <div class="input-group-append">
				    <button class="btn btn-outline-secondary" type="button"><i class="fa fa-search"></i></button>
				  </div>
				</div>
			</div>
		</div>
		<div class="row no-gutters">
			@foreach($items as $item)
        <div class="col-6 p-1 item">
            <a class="alert-link" style="text-decoration: none;" href="{{ url('item', $item->id)}}">
					<div class="card h-100">
						<img class="card-img-top" src="{{ Voyager::Image($item->image) }}" alt="">
						<div class="card-body p-1">
							<div class="text-center m-0 card-title text-muted small">{{ $category->name }}</div>
							<div class="text-center m-0 card-title">{{ $item->name }}</div>
							<div class="text-center"><span class="text-secondary small"><s>₪{{ $item->price }}</s></span> ₪{{ $item->price }}</div>
						</div>
						<div class="card-footer p-0">
							<button class="btn btn-primary btn-block" style="background-color: #c69308;"><i class="fa fa-shopping-cart"></i> Add To Cart</button>
						</div>
					</div>
				</a>
			</div>
			@endforeach
            </div> -->
        <div class="row">
            @include('frontend.partials.search-form', ['category' => $category])
        </div>
    </div>
@endsection

@section('js')
    <script>
		let typingTimer;                //timer identifier
		let doneTypingInterval = 100;  //time in ms (5 seconds)
		let searchElement = $('#search');
		let filter = $('#filter').val();
		let subCategory = $('#sub-category').val();
		searchElement.on('keyup', function () {
			clearTimeout(typingTimer);

			if (searchElement.val().length >= 3) {
				typingTimer = setTimeout(doneTyping, doneTypingInterval);
			}

			if (searchElement.val() === '') {
				typingTimer = setTimeout(doneTyping, doneTypingInterval);
			}
		});
		$('#filter').change(function () {
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
		})
		$('#sub-category').change(function () {
            typingTimer = setTimeout(doneTyping, doneTypingInterval);
		});
		$(document).ready(function () {
			doneTyping(true);
		})

		//user is "finished typing," do something
		function doneTyping(isLoad = false) {
			showOverLay();
			var itemContainer = $('#item-container');
			var data = {};
			if ($('#filter').val()) {
				data['filter'] = $('#filter').val();
			}
			if ($('#category').val()) {
				data['category_id'] = $('#category').val();
				if ($('#sub-category').val()) {
					data['category_id'] = $('#sub-category').val();
				}
			}
			if ($('#search').val()) {
				data['query'] = $('#search').val();
			}
			getItems(data);
		}

		function getItems(filters) {
			$.ajaxSetup({
				            headers: {
					            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				            }
			            });
			$.ajax({
				       url: '/autocomplete',
				       data: filters,
				       type: 'POST',
				       success: function (data) {
					       $("#item-container").html(data);
					       hideOverLay();
				       }
			       });
		}

		function toggleLoader() {
			//
		}
    </script>

@endsection
