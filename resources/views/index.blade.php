@extends('layouts.myapp')


@section('title')
    Home | Page
@endsection

@section('mainContent')
<h1 class="text-center">Welcome to Solution</h1>
<div class="row">
    <div class="col-sm"></div>
    @if (Session::has('logginedUser') == '')
    <div class="col-sm-6">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
              <h5 class="card-title">Assessment Solution</h5>
              <p class="card-text">as you have given the assessment of Superadmin, Admin and User here is the solution</p>
              <p class="card-text">after login all links will available on nav bar</p>
              <p class="card-text">But if you face any problem them contact <br>Deepak Kumar <br>7678178911</p>
              <a href="{{ route('loginPage') }}" class="card-link btn btn-outline-info"><i class="fa fa-user"></i> Login</a>
              <a href="{{ route('signupPage') }}" class="card-link btn btn-outline-info"><i class="fa fa-file"></i> Register your self</a>
            </div>
          </div>
    </div>
    
   
    @else
    
    @if (Session::get('logginedUser')->user_type == 'superadmin')
    <div class="col-sm-6">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
              <h5 class="card-title">Welcome SuperAdmin</h5>
              <p class="card-text">You can approve profile on admin/users <br> and also view the posts on post feed </p>
              <p class="card-text">But if you face any problem them contact <br>Deepak Kumar <br>7678178911</p>
              <a href="{{ route('profiles') }}" class="card-link btn btn-outline-info"><i class="fa fa-user"></i> admin/users</a>
              <a href="{{ route('postFeed') }}" class="card-link btn btn-outline-info"><i class="fa fa-file"></i> Post feed</a>
            </div>
          </div>
    </div>
    @elseif (Session::get('logginedUser')->user_type == 'admin')
    <div class="col-sm-6">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
              <h5 class="card-title">Welcome Admin</h5>
              <p class="card-text">You can post quote on posts <br> and also view the posts on post feed </p>
              <p class="card-text">But if you face any problem them contact <br>Deepak Kumar <br>7678178911</p>
              <a href="{{ route('postPage') }}" class="card-link btn btn-outline-info"><i class="fa fa-file"></i> Posts</a>
              <a href="{{ route('postFeed') }}" class="card-link btn btn-outline-info"><i class="fa fa-file"></i> Post feed</a>
            </div>
          </div>
    </div>
    @else
    <div class="col-sm-6">
        <div class="card" style="width: 40rem;">
            <div class="card-body">
              <h5 class="card-title">Welcome User</h5>
              <p class="card-text">You can view the posts on post feed</p>
              <p class="card-text">But if you face any problem them contact <br>Deepak Kumar <br>7678178911</p>
              <a href="{{ route('postFeed') }}" class="card-link btn btn-outline-info"><i class="fa fa-file"></i> Post feed</a>
            </div>
          </div>
    </div>
    @endif
    @endif
    <div class="col-sm"></div>
</div>
@endsection
