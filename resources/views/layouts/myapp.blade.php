@include('layouts.header')
<div class="wrapper">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark ">
    <div class="container p-3">
    <a class="navbar-brand" href="{{ route('home') }}"><i class="fa fa-futbol-o" aria-hidden="true"></i> Solution</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item ">
          <a class="nav-link" href="{{ route('home') }}"><i class="fa fa-home" aria-hidden="true"></i> Home </a>
        </li>
        @if (!is_null(Session::get('logginedUser')))
            @if (Session::get('logginedUser')->user_type == 'user')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('postFeed') }}"><i class="fa fa-file" aria-hidden="true"></i> Post feed</a>
            </li>
            @elseif(Session::get('logginedUser')->user_type == 'superadmin')
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profiles') }}"><i class="fa fa-user" aria-hidden="true"></i> admin/users</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('postFeed') }}"><i class="fa fa-file" aria-hidden="true"></i> Post feed</a>
            </li>
            @else
              <li class="nav-item">
                <a class="nav-link" href="{{ route('postFeed') }}"><i class="fa fa-file" aria-hidden="true"></i> Post feed</a>
              </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('postPage') }}"><i class="fa fa-file" aria-hidden="true"></i> Posts</a>
            </li>
                
            @endif
        <li class="dropdown">
          <button class="btn btn-outline-secondary text-white border-0 dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-user" aria-hidden="true"></i> {{ Str::ucfirst(Session::get('logginedUser')->name) }}
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="javaScript::void(0);">Profile <span class="text-muted">({{ Str::ucfirst(Session::get('logginedUser')->user_type) }})</span></a>
            <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
          </div>
        </li>
        @else
            
        <li class="nav-item">
          <a class="nav-link" href="{{ route('loginPage') }}"><i class="fa fa-user" aria-hidden="true"></i> Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('signupPage') }}"><i class="fa fa-sign-in" aria-hidden="true"></i> Signup</a>
        </li>
        @endif
      </ul>
    </div>
    </div>
  </nav>
  <div class=" p-4">
    @include('layouts.alerts')
@yield('mainContent')

@include('layouts.footer')