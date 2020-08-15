@extends('layouts.myapp')


@section('title')
    login | Page
@endsection

@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm">
    <form action="{{ route('login') }}" class="form-signin p-4" style="background:#eeee" method="POST">
        {{ csrf_field() }}
        <h1 class="text-center font-weight-bold"><span class="display-2"><i class="fa fa-futbol-o" aria-hidden="true"></i></span> Solution</h1>
        <h3 class="h3 mb-3 font-weight-normal">Sign in</h3>
        <div class="form-group">

            <label for="inputphone" class="sr-only">Phone</label>
            <input type="text" id="inputphone" class="form-control" placeholder="Phone" name="phone" required>
        </div>
        <div class="form-group">

            <label for="inputPassword" class="sr-only">Password</label>
            <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
        </div>
        
        <button class="mt-5 btn btn-lg btn-outline-info btn-block" type="submit">Sign in</button>
        <p class="mt-5 mb-3 text-muted">Structlooper © 2020</p>
      </form>
    </div>
    <div class="col-sm-3"></div>
    </div>

</div>
@endsection