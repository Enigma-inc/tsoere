<script>
export default{
    props:['playerContainer','audio'],
    data(){
        return{
            player:null,
            timer:'',
            audioDuration:'',
            elapsedTime:'',
            playerActionClass:['fa', 'fa-play-circle-o']
        }
    },
    mounted(){
       
        
    
    },
    methods:{
        initialisePlayer(){
            this.player = wavesurfer.create({
                    container: this.playerContainer,
                    waveColor: '#0aa89e',
                    progressColor: '#066265',
                    barWidth:2,
                    height:20,
                    hideScrollbar:true
                });
        this.player.load(this.audio);
        this.player.on('ready', this.playerReady);
        this.player.on('finish',this.stopTimer);

        //Set pause button
        this.playerActionClass=['fa', 'fa-pause-circle-o'];

        },
        playerReady(){
            this.player.playPause();
            this.calculateAudioDuration();
            this.calculateElapsedTime();
            
        },        
        playAudio(){
            //Determine if player is initalized, otherwise play or pause
            if(this.player)
            {
                 this.player.playPause();
                if(this.player.isPlaying())
                {
                    //Restart the Timer
                    console.log("Seting pause");
                     this.playerActionClass=['fa', 'fa-pause-circle-o'];
                    this.calculateElapsedTime();
                }
                else{
                    //the player has been paused so stop timer
                    this.stopTimer();
                }
                 
            }
            else{
                this.initialisePlayer();
            }

        },
        calculateAudioDuration(){
             this.audioDuration=this.formatTime(this.player.getDuration());
        },
        calculateElapsedTime(){
           this.timer= setInterval(()=>{          
            this.elapsedTime=this.formatTime(this.player.getCurrentTime()) ;
                        },1000);
        },
        formatTime(timeInSeconds){
            let hrs= ~~(timeInSeconds/3600);
            let mins= ~~((timeInSeconds%3600)/60);
            let secs= Number(timeInSeconds%60).toFixed(0);

            let ret="";

            //output
            if (hrs>0){
                ret +=""+hrs+":"+(mins<10 ? "0" : "");
            }

            ret +=""+ mins +":"+(secs < 10 ? "0" : "");
            ret +=""+secs;

            return ret;
        },
        stopTimer(){
            clearInterval(this.timer);
           this.playerActionClass=['fa', 'fa-play-circle-o'];
        }
    }
}
    
</script>
<style lang="scss" scoped>

</style>
