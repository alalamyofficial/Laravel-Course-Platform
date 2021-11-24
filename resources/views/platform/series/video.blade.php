<!DOCTYPE html>
<html lang="zxx" class="no-js">


@include('platform.header')

<style>
  
  .active{
    background-color:#f7eded
  }

  /* .video-js .vjs-big-play-button {

    left: 475px;
    top: 252px;

  } */

  .series{

    background: rgb(36,0,27);
    background: linear-gradient(90deg, rgba(36,0,27,1) 0%, rgba(79,5,60,1) 0%, rgba(121,9,85,1) 43%, rgba(255,0,14,1) 100%);
    height:400px;
    width:300px;
  }

  .next{
    margin-left: 640px;

  }

  .desc{

    margin-left: 174px;
    width: 1065px;

  }

 .video-js .vjs-time-control {
     display: block;
 }
 .video-js .vjs-remaining-time {
     display: none;
 }

 .ep_num{
    background-color: black;
    color: white;
    border-radius: 50%;
    /* margin-left: 119px; */
    width: 30px;
    text-align: center;
    height: 24px;
 }



</style>


<body>

@include('platform.navbar')

@include('platform.start_section')

<!-- <div class="container"> -->
    <div class="mt-5 mb-3">

        <div class="d-flex">
            <div class="ml-3 mr-3 series">
                
                <h2 class="mt-3 ml-3" style="color:white">Series {{$series->title}}</h2>
                <small class="ml-3">
                ({{count($series->videos)}}) Videos
                </small>

                    <div class="card mb-1 mt-3 p-2 border shadow"
                    >
                        @foreach($series->videos as $video)
                            <div class="d-flex ">
                                <div class="col">

                                    <div class="flex justify-content-between">
                                        <p class="ml-1 mb-1 mr-4 {{url('eries/laravel-youtube-clone/episode/3') ? 'active' : ''}}">{{$video->title}}</p>
                                        <strong class="ep_num">{{$video->episode_number}}</strong>   
                                    </div>
                                   
                                    <!-- <p class="ml-1">{{$video->series->title}}</p>     -->
                                    
                                </div>
                            </div>
                            <div class="card-body">
                                <a class="genric-btn danger circle btn-sm" href="{{route('single_video',[$series->slug,$video->episode_number] )}}" 
                                role="button"><i class="fas fa-play"></i></a>
                            </div>
                        <hr>
                        @endforeach  
                    </div>
                
            </div>

                <video
                    id="my-video"
                    class="video-js vjs-big-play-centered"
                    poster="{{asset($one_video->video)}}"
                    preload="auto"
                    width="1070"
                    height="564"
                    data-setup=''
                >
                    <source src="{{asset($one_video->video)}}" type="video/mp4" />
                    <p class="vjs-no-js">
                    To view this video please enable JavaScript, and consider upgrading to a
                    web browser that
                    <a href="https://videojs.com/html5-video-support/" target="_blank"
                        >supports HTML5 video</a
                    >
                    </p>
                </video>

        </div>
            <br>
            <div class="container">
                <div class="mt-3">

                    <div class="next">
                        <div class="flex">

                            <!-- Prev -->
                            @if($prevVideo['id'] == 0)
                                <a disabled 
                                class="btn btn-primary mr-3"><i class="fas fa-chevron-circle-left"></i>
                                </a>
                            @else
                                <a href="{{$prevVideo->episode_number}}" 
                                class="btn btn-primary mr-3"><i class="fas fa-chevron-circle-left"></i>
                                </a>
                            @endif    

                            <!-- Next -->
                            @if($nextVideo)
                                <a href="{{$nextVideo['episode_number']}}" 
                                class="btn btn-primary"><i class="fas fa-chevron-circle-right"></i>
                                </a>
                            @else
                                <a disabled
                                class="btn btn-primary"><i class="fas fa-chevron-circle-right"></i>
                                </a>
                            @endif    


                        </div>
                    </div>

                </div>
            </div>

            <br>    
            <div class="container">
                <div class="desc">
                    <blockquote class="generic-blockquote">
                    <span class="genric-btn success-border circle arrow">
                        By {{$video->user->name}}
                    </span> <br><br>
                       <strong style="font-weight:bold">{{$video->description}}</strong> 
                    </blockquote>

                    <br><hr><br>

                    <div class="content" >
                        <div class="feedeback">
                            <h6 class="mb-10">Write a Comment</h6>
                            <form action="{{route('comment.store' , $video->id)}}" method="post">
                            @csrf    
                                <textarea name="comment" class="form-control" cols="10" rows="10"></textarea>
                                
                                <div class="mt-10 text-right">
                                    <button type="submit" class="genric-btn primary circle">Submit</button>
                                </div>
                            </form>
                        </div>

                        <br>
                            @if(count($comments) > 0)
                                <h4>Latest Comments</h4>
                            @else
                                <p>No Comments Yet</p>
                            @endif
                        <br>

                        @foreach($comments as $comment)
                        <div class="comments-area mb-30">
                            <div class="comment-list">
                                <div class="single-comment single-reviews">
                                    <div class="d-flex">
                                        <div class="desc">
                                            <h5><a href="#">{{$comment->user->name}}</a></h5>
                                            <p class="comment">
                                                {{$comment->comment}}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div> 

                </div>
            </div>

     </div>
<!-- </div>         -->

    <script>
        
        var nextVideo = "{{$nextVideo}}";

        var player = videojs('my-video',{
            controls: true,
            autoplay: true,
            playbackRates : [0.25 , 0.5 , 1 , 1.5 , 2 , 2.5 , 3 , 3.5 , 4],
            plugins:{
                hotkeys:{
                    seekStep: 2
                }
            }
        });

        player.on('ended', function() {
            // player.src({"type":"video/mp4", "src":"http://commondatastorage.googleapis.com/gtv-videos-bucket/sample/BigBuckBunny.mp4"});
            // player.play(); 
            alert("Video has Ended , Click Next To See Next Video" + player.currentTime());
        });

    </script>



@include('platform.footer')

</body>

</html>