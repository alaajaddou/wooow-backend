@extends('frontend.layout')

@section('title', 'WoOoW Supermarket')

@section('content')
    <div class="container-fluid py-1">
        <div class="row">
            <div class="col-12 p-0">
                <img src="{{ Voyager::image(setting('site.banner')) }}" style="width: 100%;"/>
            </div>
        </div>
        <!--Carousel Wrapper-->
        <div class="row" id="smallCategories"></div>
        <div id="home-categories"></div>
    </div>
@endsection

@section('js')
    <script>
		$(document).ready(function () {
			$("div.spanner").addClass("show");
			$("div.overlay").addClass("show");
			$.get("{{ route('small-categories') }}", function (result) {
				$("#smallCategories").html(JSON.parse(result)['html']);
				$.get("{{ route('home-categories') }}", function (result1) {
					$("#home-categories").html(JSON.parse(result1)['html']);
					$("div.spanner").removeClass("show");
					$("div.overlay").removeClass("show");
				});
			});
		});
    </script>
@endsection
