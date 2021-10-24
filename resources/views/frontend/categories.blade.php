@extends('frontend.layout')

@section('page_title', 'Category List')

@section('css')
    <!-- Custom styles for this page -->
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="{{ asset('css/categories.css') }}" rel="stylesheet"/>
@endsection


@section('content')
    <div class="container-fluid">
        <div class="row">
            <style>
                .category-image {
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
          @foreach($categories as $category)
              <style>
                  .category-image-{{$category->id}}  {
                      background-image: url("@if($category->image) {{ Voyager::Image($category->image) }} @else https://via.placeholder.com/120x400 @endif");
                  }
              </style>
            <a href="{{ url( 'list/' . $category->id )}}" class="col-12 category-image category-image-{{$category->id}} d-flex align-items-center justify-content-center my-2 nav-link">
              <div class="h3 text-white bg-wooow">{{ $category->name }}</div>
            </a>
          @endforeach
        </div>
    </div>
@endsection

@section('js')
    <!-- Page level plugins -->
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="/js/demo/datatables-demo.js"></script>
@endsection
