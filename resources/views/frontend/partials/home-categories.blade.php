<style>
    .category-title {
        border:  solid #bcc96d;
        border-width: 3px 15px 3px 15px;
    }
</style>
@if($categories && count($categories) > 0)
    @foreach($categories as $category)
        @if (count($category->items()->limit(6)->get()) > 0)
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <h4 class="text-center h4 w-100 m-3 py-2 px-3 category-title">{{ $category->name }}</h4>
                    </div>
                    <div>
                        <div style='overflow-x:scroll;overflow-y:hidden; width:100%; height: 390px;'>
                            <div style="width: calc(({{ count($category->items()->limit(6)->get()) + 1 }} * 50%) - ({{ count($category->items()->limit(6)->get()) + 1 }} * 17px)); padding-top: 15px;">
                                @foreach($category->items()->limit(6)->get() as $item)
                                    <div style="float: left; width: 230px;" class="mx-2 rounded bg-light">
                                        @include('frontend.partials.item', $item)
                                    </div>
                                @endforeach
                            </div>
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
