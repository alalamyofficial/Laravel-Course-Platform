<template>
    <div class="p-5">
        
        <div class="mt-5 mb-5">
                <div class="flex">

                    <playlist :series_videos="series_videos" :current_video="current_video"></playlist>

                    <video-player 
                        class="video-player-box ml-5 vjs-big-play-centered"
                        ref="videoPlayer"
                        :options="playerOptions"
                        :playsinline="true"
                        @canplay="onPlayerCanplay($event)"
                        @playing="onPlayerPlaying($event)"
                        @ended="onPlayerEnded()"                
                    >
                    </video-player>

                </div>
                <!-- <pre>{{video_duration}}</pre> -->

        </div>    

    </div>
</template>

<script>

import playlist from './PlayList'

export default {

    data(){
        return{
            current:{}

        }
    },

    components:{

        playlist
    },

    mounted(){

        console.log("Test " + this.next_video.episode_number)
        console.log(this.player.duration)

    },

    computed:{

        player() {
            return this.$refs.videoPlayer.player
        }

    },

    props:['one_video','series','next_video','video_duration','series_videos','current_video'],

    data(){
        return{
            first_video:[],
            playerOptions: {
                // videojs options
                muted: false,
                width: 1010,
                height:630,
                autoplay:true,
                language: 'en',
                playbackRates: [0.7, 1.0, 1.5, 2.0],
                sources: [{
                    type: "video/mp4",
                    src: '/'+this.one_video.video
                    // src: "https://cdn.theguardian.tv/webM/2015/07/20/150716YesMen_synd_768k_vp8.webm"

                }],
                // poster: "/static/images/author.jpg",
            }
        }
    },

    methods:{

        onPlayerCanplay(player) {
            console.log('player play!', player)
            this.current = player
        },

        onPlayerPlaying(player){


        },

        onPlayerEnded(){

            window.location.replace(this.next_video.episode_number)


        }
    
    }
}
</script>