<!DOCTYPE html>
<html lang="zxx" class="no-js">


@include('platform.header')


<body>

@include('platform.navbar')

@include('platform.start_section')

<div id="">
    <div class="container">
        <div class="mt-5 mb-3">
            <div class="jumbotron shadow" style="background-color:aliceblue">
                <div class="d-flex mb-3">
                    <h1 class="display-4 mb-4 mr-4">{{$series->title}}</h1>
                    <img style="width:100px; margin-top:-10px" class="mb-2 img-thumbnail rounded-circle" src="{{asset($series->image)}}" alt="">
                </div>
                <p class="lead">{{$series->description}}</p>
                <hr class="my-4">
                <p>Click Subscribe to watch full series tutorial</p>
                <a href="#" class="genric-btn success circle">
                    Subscribe <i class="fas fa-shopping-cart"></i>
                </a>
            </div>
            <!-- <episodes :videos="{{$series->videos}}"></episodes> -->
        </div>
    </div>
</div>


<div class="container">
    <div class="mt-5 mb-3">

        @foreach($series->videos as $video)

            <div class="row pt-3 shadow" style="border: 2px solid #f3f1f1">
                <div class="col-md-3">
                    <video width="100px" class="img-thumbnail mb-1" src="{{asset($video->video)}}"></video>
                </div>
                <div class="col-md-9 mt-sm-20">
                    <div class="col">
                        <h2 class="ml-1 mb-1">{{$video->title}}</h2>
                        <p class="ml-1">{{$video->series->title}}</p>    
                        <strong class="ml-1">{{$video->description}}</strong>  
                    </div>
                    <div class="card-body">
                        <a class="genric-btn danger circle btn-sm" href="{{route('single_video',[$series->slug,$video->episode_number])}}" role="button">
                        <i class="fas fa-play"></i></a>
                    </div>
                </div>

			</div><br>

        @endforeach    
    </div>
</div>



  @include('platform.footer')

</body>

</html>