@extends('admin.template')

@section('content')


<div class="col-12">
    <a href="{{route('admin.videos')}}" class="btn bg-gradient-primary btn-sm mb-3">Videos</a>

    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>Add Video</h6>
        </div>

        <div class="row">
            <form action="{{route('admin.videos.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <input type="text" name="title" class="form-control" placeholder="Write Title">
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <textarea type="text" name="description" class="form-control" 
                        placeholder="Write Description">
                        </textarea>
                    </div>
                </div>


                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <input type="file" name="video" class="form-control">
                    </div>
                </div>

                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <select class="form-control" id="exampleFormControlSelect1" name="series_id">
                            <option value="" holder>Choose Series</option><br>
                            @foreach ($series as $ser)
                                <option value="{{$ser->id}}">{{$ser->title}}</option>
                            @endforeach
                        </select>
                    </div>   
                </div>                 

                <div class="col-lg-12 col-md-6 mb-2">
                    <div class="form-group">
                        <input type="number" name="episode_number" class="form-control" placeholder="Enter Episode Number">
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