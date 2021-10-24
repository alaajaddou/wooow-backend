@extends('frontend.layout')

@section('content')
	@include('frontend.partials.search-form')
@endsection

@section('js')

<script>
var typingTimer;                //timer identifier
var doneTypingInterval = 100;  //time in ms (5 seconds)

$("#search").on('keyup', function () {
    clearTimeout(typingTimer);
    if ($('#search').val()) {
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    }
});

//user is "finished typing," do something
function doneTyping() {
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

    if (data['query'].length >= 3) {
				$.ajaxSetup({
				    headers: {
				        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				    }
				});
				$.ajax({
			      url: '/autocomplete',
						data: data,
			      type: 'POST',
			      success: function (data) {
							console.log('data =>', data);
			          $("#item-container").html(data);
			      },
						done: function () {
							hideOverLay();
						}
			  });
		}
}
</script>
@endsection
