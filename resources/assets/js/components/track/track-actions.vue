<template>
   <div class="footer">
        <div @click="recordPlay()" class="action-btn" v-show="showElement">
            <i class="fa fa-thumbs-o-up text-primary"></i>
            <small>({{this.likes}})</small>
        </div>

        <div @click="played()" class="action-btn" >
            <i class="fa fa-play text-primary"></i>
            <small :id="'play-'+ track.id">({{this.played}})</small>
        </div>
        <div @click="download()" class="action-btn">
            <i class="fa fa-download text-primary"></i>
            <small class="play-value">({{this.downloads}})</small>
        </div>
    </div>
</template>

<script>
import Slick from 'vue-slick';
    export default{
        props:['track'],
        components:{Slick},
        data(){
            return{
              downloads:0,
              likes:0,
              played:0,
              showElement:false,
              slickOptions: {
                slidesToShow: 3,
                // Any other options that can be got from plugin documentation
            },
            }
        },
        mounted(){
            this.downloads=this.track.downloads;
            this.likes=this.track.likes;
            this.played=this.track.played;

        },
        methods:{
            download(){
                this.downloads++;              
                window.location.href = `../../../download/${this.track.id}`;
            },
            recordPlay(){
                this.played=20;
            }
            
            
        }
    }
</script>