
<header class="navbar navbar-expand-sm bg-dark navbar-dark sticky-top toolbar">
  <a class="navbar-brand" href="{{ route('home') }}">
    <img src="{{ Voyager::Image(setting('site.logo')) }}" style="height: 50px;" />
  </a>
  <ul class="navbar-nav flex-row ml-auto ">
    <li class="d-flex align-items-center"><a href="{{ route('search') }}" class="ml-auto px-3 mt-1 text-white"><i class="fas fa-search" style="font-size: 24px"></i></a></li>
    <li class="d-flex align-items-center">
      <a class="ml-auto px-3 mt-1 text-white" href="{{ route('cart') }}">
        <i class="fas fa-shopping-cart" id="cart" style="font-size: 24px; position: relative;">
          <span class="badge badge-danger notification-badge @if(auth()->user() && Cart::session(auth()->user()->id)->getContent()->count() === 0) d-none @endif" id="cart-item-total">@if(auth()->user()) {{ Cart::session(auth()->user()->id)->getContent()->count() }} @endif</span>
        </i>
      </a>
    </li>
    <li class="d-flex align-items-center">
      <a class="ml-auto px-3 mt-1 text-white" href="{{ route('notifications') }}">
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
      <img style="width:40px;height:40px; border-radius:50%; border:2px solid white;" src="{{ Voyager::Image($user->avatar ?? 'users/default.png')}}" />
    </a></li>
  </ul>
</header>
<div class="overflow-auto" style="height: calc(100% - 120px);">
  @yield('content')
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark fixed-bottom mx-auto toolbar">
    <a class="navbar-brand" href="{{ route('home') }}">
      <img src="{{ Voyager::Image(setting('site.logo')) }}" style="height: 50px;" />
    </a>
    <ul class="navbar-nav flex-row mx-auto ">
      <li class="d-flex align-items-center">
        <a href="{{ route('category-list') }}" class="ml-auto px-2 text-white text-center">
          <i class="fas fa-th-list"></i><br />
          <label class="mb-0">Categories</label>
        </a>
      </li>
      <li class="d-flex align-items-center">
        <a href="{{ route('order-list') }}" class="ml-auto px-2 text-white text-center">
          <i class="fas fa-file-invoice"></i><br />
          <label class="mb-0">Orders</label>
        </a>
      </li>
      <li class="d-flex align-items-center">
        <a href="{{ route('user.index') }}" class="ml-auto px-2 text-white text-center">
          <i class="fas fa-user"></i><br />
          <label class="mb-0">Account</label>
        </a>
      </li>
    </ul>
</nav>
