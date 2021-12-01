@extends('admin.template')

@section('content')

@if(count($users)>0)
    <div class="col-12">
        <a href="{{route('admin.user.create')}}" class="btn bg-gradient-primary btn-sm mb-3">Add User</a>

        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="mb-3">
                <h6>Users ({{$users_count}})</h6>
            </div>
        </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Type</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="myTable">
                @foreach($users as $user)

                <tr>


                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$user->name}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$user->email}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">
                            
                                @if($user->role_as == 0)
                                    <b>User</b>
                                @elseif($user->role_as == 1)
                                    <b>Author</b>    
                                @else
                                    <b>Admin</b>
                                @endif            

                            </h6>
                            </div>
                        </div>
                    </td>


                    <td>
                        <p class="text-sm font-weight-bold mb-0">{{$user->created_at->diffForHumans()}}</p>
                    </td>

                    <td>
                        <div class="ms-auto">
                            <form action="{{route('admin.user.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('delete')
                                <a class="btn btn-link text-dark px-3 mb-0" 
                                    href="{{route('admin.user.edit',$user->id)}}">
                                    <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i
                                    >Edit
                                </a>
                                <button class="btn btn-link text-danger text-gradient px-3 mb-0" >
                                    <i class="far fa-trash-alt me-2" aria-hidden="true"></i>
                                    Delete
                                </button>
                            </form>
                        </div>
                    </td>     

                </tr>
                @endforeach

                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
@else
    <center><b>No Users Found</b></center> 

@endif       

@endsection