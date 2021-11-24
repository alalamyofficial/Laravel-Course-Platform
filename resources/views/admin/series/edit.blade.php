@extends('admin.template')

@section('content')


<div class="col-12">
    <a href="{{route('admin.series')}}" class="btn bg-gradient-primary btn-sm mb-3">Series</a>

    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>Edit Series</h6>
        </div>

        <div class="row">
            <form action="{{route('admin.series.update',$series->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('patch')

                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <input type="text" name="title" value="{{$series->title}}" class="form-control" placeholder="Write Title">
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <textarea type="text" name="description" class="form-control" 
                        placeholder="Write Description">
                        {{$series->description}}
                        </textarea>
                    </div>
                </div>


                <div class="d-flex">
                    <div class="col-lg-10 col-md-6 mb-2">
                        <div class="form-group">
                            <input type="file" name="image" class="form-control mr-3">
                        </div>
                    </div>
                    <img width="70px" style="margin-left:50px; margin-top:-10px" class="ml-3" src="{{asset($series->image)}}" alt="">
                </div><br>

                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                            <option value="" holder>Choose Category</option><br>
                            @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
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