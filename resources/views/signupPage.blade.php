@extends('layouts.myapp')


@section('title')
    signUp | Page
@endsection

@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm">
    <form action="{{ route('register') }}" class="form-signin p-4" style="background:#eeee" method="post">
        {{ csrf_field() }}
        <h1 class="text-center font-weight-bold"><span class="display-2"><i class="fa fa-futbol-o" aria-hidden="true"></i></span> Solution</h1>
        <h3 class="h3 mb-3 font-weight-normal">Register</h3>
       
        <div class="form-group">

            <label for="namefield" class="sr-only">Name</label>
            <input type="text" id="namefield" class="form-control" name="name" placeholder="Name" required autofocus>
        </div>
        <div class="form-group">

            <label for="phoneField" class="sr-only">User type</label>
            <select class="form-control" name="user_type" required id="userType">
                <option>--Select user type--</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </div>
        <div class="form-group">

            <label for="phoneField" class="sr-only">Phone</label>
            <input type="text" id="phoneField" name="phone" class="form-control" placeholder="Phone" required >
        </div>
       
        <div class="form-group">

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required="">
        </div>
        
        <button class="mt-5 btn btn-lg btn-outline-info btn-block" type="submit">Register</button>
        <p class="mt-5 mb-3 text-muted">Structlooper © 2020</p>
      </form>
    </div>
    <div class="col-sm-3"></div>
    </div>

</div>
@endsection