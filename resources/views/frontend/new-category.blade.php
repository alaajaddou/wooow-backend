@extends('frontend.layout')

@section('title')
    <h1 class="h3 mb-0 text-gray-800">New Category</h1>
@endsection

@section('page_title', 'New Category ')

@section('css')
@endsection

@section('content')
    <!-- Nested Row within Card Body -->
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <form action="{{ route('categories.store') }}" method="POST" name="form">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        {{ Form::label('name', 'New Category') }}
                        {{ Form::text('name', '', ['class'=>'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('parent', 'Parent') }}
                        {{ Form::select('parent', $categories, '', ['class' => 'form-control']) }}
                    </div>
                    <hr>
                    <div class="button-group float-right">
                        <button class="btn btn-outline-info" onclick="form.reset()">
                            Reset
                        </button> | <button class="btn btn-success">
                            Create
                        </button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@section('js')
@endsection
