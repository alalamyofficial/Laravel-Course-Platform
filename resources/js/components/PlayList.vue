<template>
  <div class="bg">
    <h2>Series</h2>

    <div v-for="video in series_videos" :key="video.episode_number">
      <div class="mt-2 p-3">
        <div :class=" (video.episode_number == current)  ? 'vid_template' : 'none'">
          <div class="d-flex">
            <video class="img-thumbnail" :src="'/'+video.video" width="100px"></video>
            <div class="col ml-5 mr-3">
              <h4>{{video.title}}</h4>
              <p>desc</p>

              <a class="genric-btn danger circle btn-sm" :href="video.episode_number" role="button">
                <!-- <i :class=" play ? 'fas fa-play':'none'"></i> -->
                <i class="pl fas fa-play"></i>
              </a>
              <!-- <i class="fas fa-pause"></i> -->
            </div>
          </div>
        </div>
      </div>
    </div>
    <hr />

    
  </div>
</template>

<script>
export default {
  data() {
    return {
      play:true,  
      current : this.current_video.episode_number
    };
  },

  props: ["series_videos", "current_video"],
  mounted() {
    console.log(this.series_videos);
  }
};
</script>


<style lang="css">
.bg {
  background-color: #eef7f4;
}

.vid_template {
  background-color: floralwhite;
  /* background-image: url("https://zellusmarketing.com/wp-content/uploads/2021/03/icon-4.5s-317px-1.gif");
   */
}

.vid_template > .pl{
    display: none;
}

</style>