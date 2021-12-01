@extends('admin.template')

@section('content')


<div class="col-12">
    <a href="{{route('admin.plans')}}" class="btn bg-gradient-primary btn-sm mb-3">Plans</a>

    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>Add Plan</h6>
        </div>

        <div class="row">
            <form action="{{route('admin.plan.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-lg-12 col-md-6 mb-2">
                    <label for="title">Plan Title</label>
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Write Title">
                    </div>
                </div>


                <div class="col-lg-12 col-md-6 mb-2">
                    <label for="identifier">Identifier</label>
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="identifier">
                            <option value="basic" holder>Basic</option><br>
                            <option value="premium" holder>Premium</option><br>
                            <option value="gold" holder>Gold</option><br>
                        </select>
                    </div>   
                </div>   

                <button type="submit" class="btn btn-outline-primary">Create</button>

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