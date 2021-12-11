<!DOCTYPE html>
<html lang="zxx" class="no-js">

<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />


<style>


    .course-list{

        font-size:20px;
        padding:5px;

    }

</style>


<script>
    $('#addStar').change('.star', function(e) {
        $(this).submit();
    });
</script>

@include('platform.header')


<body>

@include('platform.navbar')

<section class="banner-area">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-12 banner-right">
                <h1 class="text-white">
                    {{$series->title}}
                </h1>
                <p class="mx-auto text-white  mt-20 mb-40">
                    In the history of modern astronomy, there is probably no one greater leap forward than the
                    building.
                </p>
            </div>
        </div>
    </div>
</section>




<section class="course-details-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 course-details-left">
                <div class="main-image">
                    <img class="img-fluid" src="{{asset($series->image)}}" alt="">
                </div>
                <div class="content-wrapper">
                    <h4 class="title">Description</h4>
                    <div class="content">
                        {{$series->description}}
                    </div>

                    <h4 class="title">Course Outline</h4>
                    <div class="content">
                        <ul class="course-list">
                            @forelse($series->videos as $video)
                                <div class="d-flex m-2">
                                    <strong class="mr-2">{{$loop->index}}-</strong>
                                    <li class="justify-content-between d-flex">
                                     <strong class="mr-1">{{$video->title}}</strong>
                                    </li>
                                </div>
                            @empty
                                <strong>No Videos Yet</strong>
                            @endforelse   
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <a class="justify-content-between d-flex">
                            <p>Trainer’s Name</p>
                            <span class="or">{{$series->user->name}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex">
                            <p>Course Plan </p>
                            <span>{{$series->plan}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex">
                            <p>Videos</p>
                            <span>{{count($series->videos)}}</span>
                        </a>
                    </li>
                </ul>
                @if(count($series_videos) == 0)
                    <button class="btn text-uppercase enroll" >Series Have No Videos</button>
                @else
                    <a href="{{route('single_video',[$series->slug,$first_video->episode_number])}}" 
                    class="btn text-uppercase enroll">Enroll the course</a>
                @endif

                <h4 class="title">Reviews</h4>

                <form class="form-horizontal poststars" action="{{route('seriesStar', $series->id)}}" 
                id="addStar" method="POST">
                {{ csrf_field() }}

                    <input id="input-1" name="rate" class="rating rating-loading" 
                    data-min="0" data-max="5" data-step="1"  data-size="xs"
                    value="{{ $series->averageRating }}"
                    >

                    <div class="feedeback">
                        <h6 class="mb-10">Your Feedback</h6>
                        <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                        <div class="mt-10 text-right">
                            <button class="btn 
                            text-center text-uppercase enroll" type="submit">Submit</button>
                        </div>
                    </div>

                  </form>  





                <div class="comments-area mb-30">
                    <br><h3>Latest Review</h3>
                    <hr>
                    <br>

                    @if(count($series->ratings) > 0)
                    <div class="comment-list">
                        @foreach($series->ratings as $rate)
                            <div class="single-comment single-reviews justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">{{$rate->user->name}}</a>
                                            @if($rate->rating == 1)
                                                <div class="star">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            @elseif($rate->rating == 2)
                                                <div class="star">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            @elseif($rate->rating == 3)
                                                <div class="star">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            @elseif($rate->rating == 4 )
                                                <div class="star">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star"></span>
                                                </div>
                                            @elseif($rate->rating == 5 )
                                                <div class="star">
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                    <span class="fa fa-star checked"></span>
                                                </div>         
                                            @else
                                                <p>U Have to Rate</p>    

                                            @endif
                                        </h5>
                                        <p class="comment">
                                            {{$rate->feedback}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @else
                        <center>
                            <b>No Reviews Yet</b>
                        </center>
                    @endif    

            </div>
        </div>
    </div>
</section>



<script type="text/javascript">
    $("#input-id").rating();
</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


@include('platform.footer')

</body>

</html>