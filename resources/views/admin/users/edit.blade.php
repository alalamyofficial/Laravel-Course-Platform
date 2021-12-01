@extends('admin.template')

@section('content')

<div class="col-12">

    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>User ({{$user->name}})</h6>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center justify-content-center mb-0">
            <tbody>

            <div class="container">

                <form action="{{route('admin.user.update',$user->id)}}" method="post">              
                @csrf
                @method('patch')

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Name" value="{{$user->name}}">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email" 
                            value="{{$user->email}}"
                            >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                        <label for="exampleFormControlSelect1">Role 
                            @if($user->role_as == 10)
                                <b>Admin</b>
                            @elseif($user->role_as == 1)
                                <b>Author</b>
                            @else
                                <b>User</b>
                            @endif            
                            
                        </label>
                            <select class="form-control" name="role_as" id="exampleFormControlSelect1">
                                <option value="10">Admin</option>
                                <option value="1">Author</option>
                                <option value="0">User</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="Password"
                        
                            >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="password" name="password_confirmation" class="form-control" 
                            placeholder="Confirm Password" >
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="stirpe_id" class="form-control" placeholder="Stripe ID">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="card_brand" class="form-control" placeholder="Card Brand">
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input type="text" name="card_last_four" class="form-control" 
                            placeholder="Card Last Four">
                        </div>
                    </div>
                    
                    <button type="submit" class="btn bg-gradient-success">Update</button>
                </form>




            </div>

            </tbody>
        </table>
        </div>
    </div>
    </div>
</div>

@endsection