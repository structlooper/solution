@extends('layouts.myapp')


@section('title')
    Profiles | Page
@endsection

@section('mainContent')
<div class="container">
    <div class="row">
        <div class="col-sm-1"></div>
        <div class="col-sm">
            <table class="table">
                <thead class="thead-dark">
                    
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Profile type</th>
                    <th scope="col">Profile status</th>
                    <th scope="col">Action </th>
                  </tr>
                </thead>
                <tbody>
                    @if (sizeof($profiles) > 0)
                    @php $i=1; @endphp  
                    @foreach ($profiles as  $item)
                    @if ($item->user_type == Session::get('logginedUser')->user_type)
                        
                    @else
                    <tr>
                        <th scope="row">{{ $i }}</th>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->user_type }}</td>
                        @if ($item->profile_status == 0)
                        <td>   <span class="badge badge-warning"> not approved </span></td>
                        <td><a href="{{ Route('ProfileApprove',$item->user_id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" title="approve profile"><i class="fa fa-check"></i></a></td>
                        @else
                        <td><span class="badge badge-lg badge-success"> approved </span>  </td>
                        <td><a href="{{ Route('ProfileApprove',$item->user_id) }}" class="btn btn-sm btn-danger" data-toggle="tooltip" title="dis approve profile"><i class="fa fa-times"></i></a></td>
                        @endif
                    </tr>
                    @php
                    $i++;    
                    @endphp
                    @endif
                    @endforeach
                    
                    @else
                    <tr>
                        <th></th>
                        <th>

                            No Profiles found, 
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
