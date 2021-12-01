@extends('admin.template')

@section('content')

@if(count($comments)>0)
    <div class="col-12">

        <div class="card mb-4">
        <div class="card-header pb-0">
            <div class="mb-3">
                <h6>Comments ({{$comments_count}})</h6>
            </div>
        </div>


        <div class="card-body px-0 pt-0 pb-2">
            <div class="table-responsive p-0">
            <table class="table align-items-center justify-content-center mb-0">
                <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Name</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Video</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Comment</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Action</th>
                    <th></th>
                </tr>
                </thead>
                <tbody id="myTable">
                @foreach($comments as $comment)
                <tr>
                    <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">{{$comment->user->name}}</h6>
                        </div>
                    </div>
                    </td>

                    <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">{{$comment->video->title}}</h6>
                        </div>
                    </div>
                    </td>

                    <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">{{$comment->comment}}</h6>
                        </div>
                    </div>
                    </td>

                    <td>
                    <p class="text-sm font-weight-bold mb-0">{{$comment->created_at->diffForHumans()}}</p>
                    </td>

                    <td>
                        <div class="ms-auto">
                            <form action="{{route('admin.comment.destroy',$comment->id)}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-link text-danger text-gradient px-3 mb-0" 
                                    ><i class="far fa-trash-alt me-2" aria-hidden="true"></i>
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

    <center><b>No Comments Found</b></center>

@endif    

@endsection