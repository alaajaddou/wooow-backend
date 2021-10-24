@extends('frontend.layout')

@section('css')
    <style>
        .facebook-btn{  background-color:#3C589C; color: white; }
        .google-btn{ background-color: #DF4B3B; color: white; }
    </style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0">
                <h1 class="card-header bg-white text-center h1 border-0">{{ __('auth.register') }}</h1>

                <div class="card-body pt-0">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        @if (\Session::has('error'))
                          <div class="alert alert-danger my-2">
                              {!! \Session::get('error') !!}
                          </div>
                        @endif
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('auth.name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('auth.email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('auth.password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('auth.password_confirm') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                              <div class="btn-group text-center d-flex justify-content-center align-items-center">
                                <button type="submit" class="btn btn-primary mr-2">
                                    {{ __('auth.register') }}
                                </button>
                                  <span class="mr-2">|</span>
                                  <a role="button" class="btn btn-info" href="{{ route('login') }}">
                                      {{ __('auth.login') }}
                                  </a>
                              </div>
                            </div>
                        </div>
                        <hr class="w-75 mx-auto" />
                        <div class="btn-group text-center d-flex justify-content-center align-items-center">
                            @if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off')
                                <a class="btn facebook-btn social-btn mr-2" href="{{ url('auth/facebook') }}" type="button">
                                    <span><i class="fab fa-facebook-f"></i>
                                        {{__('auth.sign_facebook')}}</span>
                                </a>
                                <span class="mr-2">|</span>
                            @endif
                            <a class="btn google-btn social-btn @if(!empty( $_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') btn-block @endif" type="button" href="{{ url('auth/google') }}">
                                <span><i class="fab fa-google-plus-g"></i>
                                    {{ __('auth.sign_google') }}</span>
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
