@extends('layouts.myapp')


@section('title')
    Add | Post
@endsection

@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm">
    <form action="{{ route('post') }}" class="form-signin p-4" style="background:#eeee" method="post">
        {{ csrf_field() }}
        <h1 class="text-center font-weight-bold"><span class="display-2"><i class="fa fa-futbol-o" aria-hidden="true"></i></span> Solution</h1>
        <h3 class="h3 mb-3 font-weight-normal">Post as {{ Session::get('logginedUser')->name }}</h3>
       
        <div class="form-group">

            <label for="title" class="sr-only">Title</label>
            <input type="text" id="title" class="form-control" name="title" placeholder="Title" required autofocus>
        </div>
       
        <div class="form-group">

            <label for="desc" class="sr-only">Description</label>
            <textarea class="form-control" name="desc" id="desc" cols="30" rows="5">Description</textarea>
        </div>
       
        
        
        <button class="mt-5 btn btn-lg btn-outline-info btn-block" type="submit">Post</button>
        <p class="mt-5 mb-3 text-muted">Structlooper © 2020</p>
      </form>
    </div>
    <div class="col-sm-3"></div>
    </div>

</div>
@endsection