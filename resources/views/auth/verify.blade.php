@extends('frontend.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <div class="card-header bg-white h4 border-0">{{ __('auth.verify') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('auth.verify_new_link') }}
                        </div>
                    @endif

                    {{ __('auth.verify_before_send') }}
                    {{ __('verify_no_receive') }},
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('auth.verify_new_request) }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
