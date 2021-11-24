@extends('admin.template')

@section('content')

<div class="col-12">
    <div class="card mb-4">
    <div class="card-header pb-0">
        <div class="mb-3">
            <h6>Ratings</h6>
        </div>
    </div>
    <div class="card-body px-0 pt-0 pb-2">
        <div class="table-responsive p-0">
        <table class="table align-items-center justify-content-center mb-0">
            <thead>
            <tr>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Who Rate</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rating</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rateable Series ID</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Rateable Type</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">FeedBack</th>
                <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Created At</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($ratings as $rating)

            <tr>


                <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">{{$rating->user->name}}</h6>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">{{$rating->rating}} Stars</h6> 
                        </div>
                    </div>
                </td>

                <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">

                            {{$rating->series->title}}

                        </h6>
                        </div>
                    </div>
                </td>

                <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">

                            {{$rating->rateable_type}}

                        </h6>
                        </div>
                    </div>
                </td>


                <td>
                    <div class="d-flex px-2">
                        <div class="my-auto">
                        <h6 class="mb-0 text-sm" style="margin-left:8px">

                            {{$rating->feedback}}

                        </h6>
                        </div>
                    </div>
                </td>



                <td>
                    <p class="text-sm font-weight-bold mb-0">{{$rating->created_at->diffForHumans()}}</p>
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