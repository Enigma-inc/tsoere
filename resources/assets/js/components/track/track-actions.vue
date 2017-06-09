<template>
   <div class="footer">
        <div @click="download()" class="action-btn">
            <i class="fa fa-thumbs-o-up text-primary"></i>
            <small>({{this.likes}})</small>
        </div>
        <div @click="download()" class="action-btn">
            <i class="fa fa-play text-primary"></i>
            <small>({{this.played}})</small>
        </div>
        <div @click="download()" class="action-btn">
            <i class="fa fa-download text-primary"></i>
            <small>({{this.downloads}})</small>
        </div>
    </div>
</template>

<script>
    export default{
        props:['track'],
        data(){
            return{
              downloads:0,
              likes:0,
              played:0
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
                window.location.href = `../download/${this.track.id}`;
            }
        }
    }
</script>