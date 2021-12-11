<template>
  <div class="p-5">
    <div class="mt-5 mb-5">
      <div class="flex">
        <playlist
          :series_videos="series_videos"
          :current_video="current_video"
          :one_video="one_video"
        ></playlist>

        <video-player
          class="video-player-box ml-5 vjs-big-play-centered"
          ref="videoPlayer"
          :options="playerOptions"
          :playsinline="true"
          @canplay="onPlayerCanplay($event)"
          @playing="onPlayerPlaying($event)"
          @ended="onPlayerEnded()"
        ></video-player>
      </div>
      <!-- <pre>{{video_duration}}</pre> -->
    </div>

    <div class="container comment-container">
      <div class="desc">
        <blockquote class="generic-blockquote">
          <strong style="font-weight:bold">{{one_video.description}}</strong>
        </blockquote>
        <br />
        <hr />
        <br />

        <div class="content">
          <div class="feedeback">
            <h6 class="mb-10">Write a Comment</h6>
            <form @submit.prevent="postComment">
              <textarea name="comment" v-model="comment" class="form-control" cols="10" rows="10"></textarea>

              <div class="mt-10 text-right">
                <button @submit="postComment" class="genric-btn primary circle">Submit</button>
              </div>
            </form>
          </div>

          <br />
          <h4>Latest Comments</h4>
          <br />

          <div v-if="comments.length">
            <div v-for="co in comments" :key="co.id">
              <div class="comments-area mb-5">
                <div class="comment-list">
                  <div class="single-comment single-reviews">
                    <div class="d-flex">
                      <div class="desc">
                        <div class="row justify-content-between mb-4">
                          <h5 class="user">
                            <a href="#">{{co.user_id}}</a>
                          </h5>

                          <div class="mr-3">
                            <button @click="deleteComment(co.id)" class="btn btn-danger btn-sm">x</button>
                          </div>
                        </div>

                        <p class="comment">{{co.comment}}</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import playlist from "./PlayList";

export default {
  data() {
    return {
      first_video: [],
      comments: [],
      comment: "",
      current: {},
      playerOptions: {
        // videojs options
        muted: false,
        width: 1010,
        height: 630,
        autoplay: true,
        language: "en",
        playbackRates: [0.7, 1.0, 1.5, 2.0],
        sources: [
          {
            type: "video/mp4",
            src: "/" + this.one_video.video
          }
        ]
      }
    };
  },

  components: {
    playlist
  },

  mounted() {
    this.showComments();
  },

  computed: {
    player() {
      return this.$refs.videoPlayer.player;
    }
  },

  props: [
    "one_video",
    "series",
    "next_video",
    "video_duration",
    "series_videos",
    "current_video",
    "vids",
    "user_id",
    "last_video",
    "one_user"
    // "comments"
  ],

  methods: {
    onPlayerCanplay(player) {
      console.log("player play!", player);
      this.current = player;
    },

    onPlayerPlaying(player) {},

    onPlayerEnded() {
      if (
        this.next_video.episode_number ==
        this.next_video.episode_number + 1
      ) {
        console.log("Series Done");
      } else {
        window.location.replace(this.next_video.episode_number);
      }
    },

    showComments() {
      // console.log("Meo")
      axios
        .get("/comments/" + this.one_video.id)
        .then(res => {
          console.log(res.data);
          this.comments = res.data;
        })
        .catch(errors => {
          console.log(errors);
        });
    },

    postComment() {
      axios
        .post("/comment/store/" + this.one_video.id, {
          user_id: this.user_id,
          comment: this.comment
        })
        .then(res => {
          this.comment = "";
          console.log(res.data);
          this.showComments();
          this.$toast.success("Comment Created Successfully", {
            timeout: 4000
          });
        })
        .then(err => {
          console.log(err);
        });
    },

    deleteComment(id) {
      axios.delete("/comment/delete/" + id).then(res => {
        console.log(res.data);
        this.showComments();
        this.$toast.error("Comment Deleted Successfully", {
          timeout: 4000
        });
      });
    }
  }
};
</script>

<style>
.comments-area {
  padding: 25px 5px;
  width: 743px;
  background-color: #f9f9f9;
}

.comment {
  margin-left: -166px;
  font-size: 15px;
  font-weight: bold;
}

.user {
  margin-left: -184px;
  margin-bottom: 10px;
  border-radius: 30px;
  background-color: cornsilk;
  padding: 5px;
}

.comment-container {
  margin-left: 55px;
}

.comments-area a .remove {
  color: red;
}

/* hr{
  width: 737px;
    margin-left: -215px;
} */
</style>