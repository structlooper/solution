@extends('layouts.myapp')


@section('title')
    Post | Page
@endsection

@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <table class="table">
                <thead class="thead-dark">
                    <div class="text-right">
                        
                    <a href="{{ route('postPageAdd') }}" class="btn btn-lg btn-warning"><i class="fa fa-plus" aria-hidden="true"></i> Add Post</a>
                    </div>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Action </th>
                  </tr>
                </thead>
                <tbody>
                    @if (sizeof($posts) > 0)  
                    @foreach ($posts as $key => $item)
                    
                    <tr>
                        <th scope="row">{{ $key+1 }}</th>
                        <td>{{ $item->title }}</td>
                        <td>{{ $item->desc }}</td>
                        <td><a href="{{ Route('postbyUser',$item->user_id) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" title="View post"><i class="fa fa-eye"></i></a></td>
                    </tr>
                    @endforeach
                    
                    @else
                    <tr>
                        <th></th>
                        <th>

                            No post found, Please add post
                        </th>
                    </tr>
                    @endif
                </tbody>
            </table>
    </div>
    <div class="col-sm-1"></div>
    </div>

</div>
@endsection