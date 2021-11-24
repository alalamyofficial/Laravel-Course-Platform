<!DOCTYPE html>
<html lang="zxx" class="no-js">

<style>

    div.stars {
    display: inline-block;
    }

    input.star { display: none; }

    label.star {
    float: right;
    padding: 10px;
    font-size: 20px;
    color: 
    #444;
    transition: all .2s;
    }

    input.star:checked ~ label.star:before {
    content: '\f005';
    color: 
    #e74c3c;
    transition: all .25s;
    }

    input.star-5:checked ~ label.star:before {
    color: 
    #e74c3c;
    text-shadow: 0 0 5px 
    #7f8c8d;
    }

    input.star-1:checked ~ label.star:before { color: 
    #F62; }

    label.star:hover { transform: rotate(-15deg) scale(1.3); }

    label.star:before {
    content: '\f006';
    font-family: FontAwesome;
    }


    .horline > li:not(:last-child):after {
        content: " |";
    }
    .horline > li {
    font-weight: bold;
    color: 
    #ff7e1a;

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
                            @foreach($series->videos as $video)
                                <div class="d-flex m-2">
                                    <strong class="mr-2">{{$loop->index}}-</strong>
                                    <li class="justify-content-between d-flex">
                                     <strong class="mr-1">{{$video->title}}</strong>
                                    </li>
                                </div>
                            @endforeach    
                        </ul>
                    </div>
                </div>
            </div>


            <div class="col-lg-4 right-contents">
                <ul>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Trainer’s Name</p>
                            <span class="or">{{$series->user->name}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Course Plan </p>
                            <span>{{$series->plan}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Videos</p>
                            <span>{{count($series->videos)}}</span>
                        </a>
                    </li>
                    <li>
                        <a class="justify-content-between d-flex" href="#">
                            <p>Schedule </p>
                            <span>2.00 pm to 4.00 pm</span>
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
                <!-- <div class="content">
                    <div class="review-top row pt-40">
                        <div class="col-lg-12">
                            <h6 class="mb-15">Provide Your Rating</h6>
                            <div class="d-flex flex-row reviews justify-content-between">
                                <span>Quality</span>
                                <div class="star">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span>Outstanding</span>
                            </div>
                            <div class="d-flex flex-row reviews justify-content-between">
                                <span>Puncuality</span>
                                <div class="star">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span>Outstanding</span>
                            </div>
                            <div class="d-flex flex-row reviews justify-content-between">
                                <span>Quality</span>
                                <div class="star">
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star checked"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <span>Outstanding</span>
                            </div>
                        </div>
                    </div>
                    <div class="feedeback">
                        <h6 class="mb-10">Your Feedback</h6>
                        <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                        <div class="mt-10 text-right">
                            <a href="#" class="btn text-center text-uppercase enroll">Submit</a>
                        </div>
                    </div>
                    <div class="comments-area mb-30">
                        <div class="comment-list">
                            <div class="single-comment single-reviews justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c1.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Emilly Blunt</a>
                                            <div class="star">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </h5>
                                        <p class="comment">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment single-reviews justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c2.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Elsie Cunningham</a>
                                            <div class="star">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </h5>
                                        <p class="comment">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="comment-list">
                            <div class="single-comment single-reviews justify-content-between d-flex">
                                <div class="user justify-content-between d-flex">
                                    <div class="thumb">
                                        <img src="img/blog/c3.jpg" alt="">
                                    </div>
                                    <div class="desc">
                                        <h5><a href="#">Maria Luna</a>
                                            <div class="star">
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star checked"></span>
                                                <span class="fa fa-star"></span>
                                                <span class="fa fa-star"></span>
                                            </div>
                                        </h5>
                                        <p class="comment">
                                            Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                            eiusmod tempor incididunt ut labore et dolore.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                @auth

                @if(Auth::id() == $rating['user_id'])    
                    <b>You Already Review With 
                    @if($rating->rating == 1)    
                        {{$rating->rating}} 
                        <i class=" fas fa-star"></i>

                    @elseif($rating->rating == 2)
                        {{$rating->rating}} 
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>

                    @elseif($rating->rating == 3)
                        {{$rating->rating}} 
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>

                    @elseif($rating->rating == 4)
                        {{$rating->rating}} 
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>

                    @elseif($rating->rating == 5)
                        {{$rating->rating}} 
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>
                        <i class=" fas fa-star"></i>
                    @else
                        Rate Us
                    @endif        

                    </b>
                    
                    <br>

                @else
                <form class="form-horizontal poststars" action="{{route('seriesStar', $series->id)}}" id="addStar" method="POST">
                    {{ csrf_field() }}
                    <div class="form-group required" style="margin-right: 126px;">
                        <div class="col-sm-12">
                            <input class="star star-5" value="5" id="star-5" type="radio" name="star"/>
                            <label class="star star-5" for="star-5"></label>
                            <input class="star star-4" value="4" id="star-4" type="radio" name="star"/>
                            <label class="star star-4" for="star-4"></label>
                            <input class="star star-3" value="3" id="star-3" type="radio" name="star"/>
                            <label class="star star-3" for="star-3"></label>
                            <input class="star star-2" value="2" id="star-2" type="radio" name="star"/>
                            <label class="star star-2" for="star-2"></label>
                            <input class="star star-1" value="1" id="star-1" type="radio" name="star"/>
                            <label class="star star-1" for="star-1"></label>
                        </div>
                    </div><br><br>
                    <div class="feedeback">
                        <h6 class="mb-10">Your Feedback</h6>
                        <textarea name="feedback" class="form-control" cols="10" rows="10"></textarea>
                        <div class="mt-10 text-right">
                            <!-- <a href="#" class="btn text-center text-uppercase enroll">Submit</a> -->
                            <button class="btn 
                            text-center text-uppercase enroll" type="submit">Submit</button>
                        </div>
                    </div>
                </form>

                @endif

                @endauth


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




@include('platform.footer')

</body>

</html>