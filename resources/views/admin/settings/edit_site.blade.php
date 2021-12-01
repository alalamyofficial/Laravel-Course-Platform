@extends('admin.template')

@section('content')


<div class="col-12">

    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>Site Settings</h6>
        </div>

        <div class="row">
            <form action="{{route('admin.settings.update')}}" method="POST">
            @csrf
            @method('patch')

                <label for="site_name">Site Name</label>
                <div class="col-lg-12 col-md-6 mb-1">
                    <div class="form-group">
                        <input type="text" name="site_name" 
                        value="" class="form-control" placeholder="Write Name">
                    </div>
                </div>

                <label for="site_about">Site About</label>
                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <textarea type="text" name="about" class="form-control" 
                        placeholder="Write Site About">
                        </textarea>
                    </div>
                </div>

                <button type="submit" class="btn btn-outline-info">Update</button>

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