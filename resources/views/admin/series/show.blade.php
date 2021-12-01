@extends('admin.template')

@section('content')

<div class="col-12">
    <a href="{{route('admin.series.create')}}" class="btn bg-gradient-primary btn-sm mb-3">Add Series</a>

    @if(count($series) > 0)
    <div class="card mb-4">
            <div class="card-header pb-0">
                <div class="mb-3">
                    <h6>Series ({{$series_count}})</h6>
                </div>
            </div>
        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Image</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Title</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Who Created</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Description</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Categories</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Plan</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="myTable">
                @foreach($series as $ser)

                <tr>

                    <td>
                        <img src="{{asset($ser->image)}}" class="img-fluid border-radius-lg">
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$ser->title}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <div class="d-flex px-2">
                            <div class="my-auto">
                            <h6 class="mb-0 text-sm" style="margin-left:8px">{{$ser->user->name}}</h6>
                            </div>
                        </div>
                    </td>

                    <td>
                        <!-- <p class="text-sm font-weight-bold mb-0">{{\Str::words($ser->description,7)}}</p> -->
                        <div>
                            <p class="text-sm font-weight-bold mb-0">
                                <b>
                                    {{$ser->description}}
                                </b>
                            </p>
                        </div>
                    </td>

                    <td>
                        <p class="text-sm font-weight-bold mb-0">{{$ser->category->name}}</p>
                    </td>

                    <td>
                        <p class="text-sm font-weight-bold mb-0">{{$ser->plan}}</p>
                    </td>

                    <td>
                        <p class="text-sm font-weight-bold mb-0">{{$ser->created_at->diffForHumans()}}</p>
                    </td>

                    <td>
                        <div class="ms-auto">
                            <form action="{{route('admin.series.destroy',$ser->id)}}" method="post">
                            @csrf
                            @method('delete')

                                <a class="btn btn-link text-dark px-3 mb-0" href="{{route('admin.series.edit',$ser->id)}}">
                                    <i class="fas fa-pencil-alt text-dark me-2" aria-hidden="true"></i>
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" >
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
    @else
        <center><b>No Series Found</b></center>
    @endif    
</div>

@endsection