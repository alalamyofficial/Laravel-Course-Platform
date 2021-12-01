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
    background-color: #eb7373;
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

<div id="app">
    
    <one-video 
        :one_video="{{$one_video}}" 
        :series="{{$series}}"
        :series_videos="{{$series_videos}}" 
        :next_video="{{$nextVideo}}"
        :video_duration = "{{$video_duration}}"
        :current_video = "{{$current_video}}"
    >
    </one-video>

</div>        


<script src="{{ asset('js/app.js') }}" defer></script>
    

@include('platform.footer')

</body>

</html>