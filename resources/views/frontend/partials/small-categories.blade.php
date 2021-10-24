@if($categories && count($categories) > 0)
    <div style='overflow-x:scroll;overflow-y:hidden; width:100%; height: 100px; background: #efefef;'>
        <div style="width: {{ $categories->count() * 70}}px; padding-top: 15px;">
            @foreach($categories as $index => $item)
                <a href="{{ url('list/' . $item->id)}}"
                   style="text-decoration: none; color: black; float: left; width: 80px;">
                    <style>
                        .category-image-{{$index}}  {
                            background-image: url("@if($item->image) {{ Voyager::Image($item->image) }} @else https://via.placeholder.com/70 @endif");
                            background-color: #cccccc;
                            height: 50px;
                            width: 50px;
                            background-position: center;
                            background-repeat: no-repeat;
                            background-size: cover;
                            position: relative;
                        }
                        .odd-category {
                            border: 3px solid #fab419;
                        }
                        .even-category {
                            border: 3px solid #bcc96d;
                        }
                    </style>
                    <div class="rounded-circle img-thumbnail category-image-{{$index}} mx-auto @if($index%2 === 0) even-category @else odd-category @endif" style="pointer-events: none;"></div>
                    <label class="card-title small text-center" style="pointer-events: none;"> {{ $item->name }} </label>
                </a>
            @endforeach
        </div>
    </div>
    <!--/.Carousel Wrapper-->
@endif
