@extends('layouts.myapp')


@section('title')
    Post | Feed
@endsection

@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-sm-3">
            <div class="sidebar-sticky">
                 
                <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                  <span>Posts by person</span>
                  <a class="d-flex align-items-center text-muted" href="#">
                  <i class="fa fa-user"> </i>  
                  </a>
                </h6>
                <ul class="nav flex-column mb-2">
              
                  @foreach ($admins as $admin)
                      
                  <li class="nav-item">
                      <a class="nav-link" href="{{ route('postbyUser',$admin->user_id) }}">
                          <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg>
                          {{ $admin->name }}
                        </a>
                    </li>
                    
                    @endforeach
                </ul>
              </div>
        </div>
        <div class="col-sm">
            <h2 class="text-center">Posts by {{ Str::ucfirst($by->name) }}</h2>
            @if (sizeof($posts) > 0)
            
            @foreach ($posts as $item)
            <div class="card">
                <div class="card-header">
                    {{ $item->title }}
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $item->desc }}</p>
                        <footer class="blockquote-footer"><cite title="Source Title">{{ $item->name }}</cite></footer>
                    </blockquote>
                </div>
            </div>
            <hr>
            @endforeach
            @else
                NO, Quote posted by {{ Str::ucfirst($by->name) }}
            @endif
    </div>
    <div class="col-sm-1"></div>
    </div>

</div>

@endsection
