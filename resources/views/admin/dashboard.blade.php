@extends('admin.template')

@section('content')

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Categories</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$categories_count}}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Videos</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$videos_count}}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Series</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$videos_count}}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-3 col-sm-6">
    <div class="card">
        <div class="card-body p-3">
            <div class="row">
            <div class="col-8">
                <div class="numbers">
                <p class="text-sm mb-0 text-capitalize font-weight-bold">Comments</p>
                <h5 class="font-weight-bolder mb-0">
                    {{$comments_count}}
                </h5>
                </div>
            </div>
            <div class="col-4 text-end">
                <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>

<br><br>

<img src="http://www.dunamath.com/image/gif1.gif" alt="gif" style="width:700px; margin-left: 166px;">

@endsection