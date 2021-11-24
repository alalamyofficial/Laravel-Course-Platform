@extends('admin.template')

@section('content')


<div class="col-12">
    <a href="{{route('admin.categories')}}" class="btn bg-gradient-primary btn-sm mb-3">Categories</a>

    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>Edit Category</h6>
        </div>

        <div class="row">
            <form action="{{route('admin.category.update',$category->id)}}" method="POST">
            @csrf
            @method('patch')
                <div class="col-lg-12 col-md-6 mb-1">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" value="{{$category->name}}" placeholder="Write Name">
                    </div>
                </div>
                <button type="submit" class="btn btn-outline-success">Update</button>

            </form>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">

        </div>
    </div>
    </div>
</div>

@endsection