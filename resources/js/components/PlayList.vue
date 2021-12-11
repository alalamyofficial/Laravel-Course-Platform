<template>

  <div id="playlist">
    <div class="bg">
      <center><h2>Series</h2></center><hr>

      <div  v-for="video in series_videos" :key="video.episode_number">
        <div class="mt-2 p-3">
          <div :class=" (video.episode_number == current)  ? 'vid_template' : 'none'">
            <div class="d-flex">
              <video id="myvid" class="img-thumbnail" :src="'/'+video.video" width="100px"></video>
              <div class="col ml-5 mr-3">
                <h4>{{video.title}}</h4>
                <p>desc</p>

                    <div v-if="video.episode_number == current">
                      <img src="https://icon-library.com/images/ajax-loading-icon/ajax-loading-icon-18.jpg" 
                            width="50px"  
                            alt="">
                    </div>

                    <div v-if="video.episode_number != current">
                      <a class="genric-btn danger circle btn-sm" :href="video.episode_number" role="button">
                              <i class="pl fas fa-play"></i>
                      </a>
                    </div>
                <!-- <i class="fas fa-pause"></i> -->
              </div>
            </div>
          </div>
        </div>
      </div>
      <hr />
      
    </div>
  </div>

</template>

<script>



export default {
  data() {
    return {
      play:true,  
      current : this.current_video.episode_number,
      video_comments:[],
      time: '00:00'
    };
  },

  props: ["series_videos", "current_video",'one_video'],
  mounted() {
    console.log(this.series_videos);
  },
  methods:{


  }
};
</script>


<style lang="css">
.bg {
  background-color: #ededed;
}

.vid_template {
  background-color: floralwhite;
  /* background-image: url("https://zellusmarketing.com/wp-content/uploads/2021/03/icon-4.5s-317px-1.gif");
   */

  padding: 2px;
}

.vid_template > .pl{
    display: none;
}



 *::-webkit-scrollbar,
*::-webkit-scrollbar-thumb {
  width: 26px;
  border-radius: 13px;
  background-clip: padding-box;
  border: 10px solid transparent;
}

*::-webkit-scrollbar-thumb {        
  box-shadow: inset 0 0 0 10px;
}

#playlist:hover {
  color: rgba(0, 0, 0, 0.3);
}

#playlist {
  background: white;
  padding: 20px;
  width: 500px;
  height: 630px;
  /* margin: 100px auto; */
  border-radius: 3px;
  overflow: auto;
  color: rgba(0, 0, 0, 0);
  -webkit-text-fill-color: black;
  box-shadow: 0 1px 6px rgba(0, 0, 0, 0.2);
  transition: color .3s ease;
}



</style>