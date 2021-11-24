@extends('admin.template')

@section('content')

<div class="col-12">
    <a href="{{route('admin.user.create')}}" class="btn bg-gradient-primary btn-sm mb-3">Add User</a>

    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>Users</h6>
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
            <tbody>
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
                        <a class="btn btn-link text-danger text-gradient px-3 mb-0" href="javascript:;"><i class="far fa-trash-alt me-2" aria-hidden="true"></i>Delete</a>
                        <a class="btn btn-link text-dark px-3 mb-0" href="javascript:;"><i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>Edit</a>
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

@endsection