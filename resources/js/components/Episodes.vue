<template>
    
    <div>

        <div style="background-color:black" v-for="(video , index) in videos" :key="index">

            <b>{{video.title}}</b>

        </div>

    </div>

</template>

<script>
export default {
    
    props:["videos"],

    mounted(){

        console.log(this.videos)

    }

}
</script>