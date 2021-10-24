<!DOCTYPE html>
<html lang="en">

@include('frontend.partials.head')


<body id="page-top" style="width: 100vw; height: 100vh;">
<style>
    .left-2 {
        left: 2%;
    }

    .right-2 {
        right: 2%;
    }

    .top-3 {
        top: 2rem;
    }

    .item-big-image {
        background-color: #cccccc;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
        width: 100%;
        height: 250px;
    }
</style>
<div class="overlay" id="overlay"></div>
<div class="spanner" id="spanner">
    <img src="{{ Voyager::Image(setting('site.loader')) }}" style="height: 100px;" id="loader"/>
  <p>{{ __('labels.loading') }}</p>
</div>
<!-- Page Wrapper -->

<header class="navbar navbar-expand-sm navbar-dark sticky-top toolbar">
  <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ url('img/logo.png') }}" style="height: 50px;" />
  </a>
  <ul class="navbar-nav flex-row ml-auto ">
    <li class="d-flex align-items-center"><a href="{{ route('search') }}" class="ml-auto px-3 mt-1 text-white"><i class="fas fa-search" style="font-size: 24px"></i></a></li>
    <li class="d-flex align-items-center">
      <a class="ml-auto px-2 mt-1 text-white" href="{{ route('cart') }}">
        <i class="fas fa-shopping-cart" id="cart" style="font-size: 24px; position: relative;">
          <span class="badge badge-danger notification-badge @if(auth()->user() && Cart::session(auth()->user()->id)->getContent()->count() === 0) d-none @endif" id="cart-item-total">@if(auth()->user()) {{ Cart::session(auth()->user()->id)->getContent()->count() }} @endif</span>
        </i>
      </a>
    </li>
    <li class="d-flex align-items-center">
      <a class="ml-auto px-2 mt-1 text-white" href="{{ route('notifications') }}">
        @if(auth()->user() && count(auth()->user()->notifications) > 0)
          <i class="fas fa-bell" id="notification" style="font-size: 24px; position: relative;">
            <span class="badge badge-danger notification-badge">{{ auth()->user()->unreadNotifications->count() }}</span>
          </i>
        @else
        <i class="fas fa-bell-slash" id="notification" style="font-size: 24px; position: relative; color: #ccc;"></i>
        @endif
      </a>
    </li>
    <li class="d-flex align-items-center"><a href="{{ route('user.index') }}" class="ml-auto px-2 text-white">
      <img style="width:40px;height:40px; border-radius:50%; border:2px solid white; background: white;" src="{{ Voyager::image(auth()->user()->avatar ?? 'users/default.png')}}" />
    </a></li>
  </ul>
</header>

<div class="overflow-auto" style="height: calc(100% - 120px);">
    @yield('content')
</div>
<nav class="navbar navbar-expand-sm navbar-dark fixed-bottom mx-auto toolbar">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ url('img/logo.png') }}" style="height: 50px;" />
    </a>
    <ul class="navbar-nav flex-row mx-auto ">
      <li class="d-flex align-items-center">
        <a href="{{ route('category-list') }}" class="ml-auto px-2 text-white text-center">
          <i class="fas fa-th-list"></i><br />
          <label class="mb-0">{{ __('labels.categories') }}</label>
        </a>
      </li>
      <li class="d-flex align-items-center">
        <a href="{{ route('order-list') }}" class="ml-auto px-2 text-white text-center">
          <i class="fas fa-file-invoice"></i><br />
          <label class="mb-0">{{ __('labels.orders') }}</label>
        </a>
      </li>
      <li class="d-flex align-items-center">
        <a href="{{ route('user.index') }}" class="ml-auto px-2 text-white text-center">
          <i class="fas fa-user"></i><br />
          <label class="mb-0">{{ __('labels.account') }}</label>
        </a>
      </li>
    </ul>
</nav>
@include('frontend.partials.footer')
</body>

</html>
