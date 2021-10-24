@extends('frontend.layout')

@section('css')
    <style>
        .facebook-btn {
            background-color: #3C589C;
            color: white;
        }

        .google-btn {
            background-color: #DF4B3B;
            color: white;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card border-0">
                    <h1 class="card-header bg-white text-center h1 border-0">{{ __('auth.login') }}</h1>

                    <div class="card-body pt-0">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            @if (\Session::has('error'))
                                <div class="alert alert-danger my-2">
                                    {!! \Session::get('error') !!}
                                </div>
                            @endif
                            <div class="form-group row">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('auth.remember') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-12">
                                    <div class="btn-group text-center d-flex justify-content-center align-items-center">
                                        <button type="submit" class="btn btn-primary mr-2">
                                            {{ __('auth.login') }}
                                        </button>
                                        <span class="mr-2">|</span>
                                        <a role="button" class="btn btn-info" href="{{ route('register') }}">
                                            {{ __('auth.register') }}
                                        </a>
                                    </div>
                                </div>
                                <div>
                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('auth.password_request') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                            <hr class="w-75 mx-auto"/>
                            <div class="btn-group text-center d-flex justify-content-center align-items-center">
                                @if(!empty( $_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')
                                    <a class="btn facebook-btn social-btn mr-2" href="{{ url('auth/facebook') }}"
                                       type="button">
                                        <span>
                                            <i class="fab fa-facebook-f"></i>
                                            {{ __('auth.sign_facebook') }}
                                        </span>
                                    </a>
                                    <span class="mr-2">|</span>
                                @endif
                                <a class="btn google-btn social-btn @if(!empty( $_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') btn-block @endif"
                                   type="button" href="{{ url('auth/google') }}">
                                    <span>
                                        <i class="fab fa-google-plus-g"></i>
                                        {{ __('auth.sign_google') }}
                                    </span>
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>
        @if(!empty( $_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')
	        window.fbAsyncInit = function() {
	        FB.init({
		                appId: '2381214602021925',
		                cookie: true,
		                xfbml: true,
		                version: 'v9.0'
	                });
	        FB.getLoginStatus(function(response) {
		        statusChangeCallback(response);
	        });
	        FB.AppEvents.logPageView();

        }; function checkLoginState() {
	        FB.getLoginStatus(function (response) {
		        statusChangeCallback(response);
	        });
        } (function(d, s, id){
	        var js, fjs = d.getElementsByTagName(s)[0];
	        if (d.getElementById(id)) { return; }
	        js = d.createElement(s); js.id = id;
	        js.src = "https://connect.facebook.net/en_US/sdk.js";
	        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
        @endif
    </script>
@endsection
