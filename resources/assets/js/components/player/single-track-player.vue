
<script>
export default{
    props:['playerContainer','track'],
    data(){
        return{
            player:null,
            timer:'',
            audioDuration:'',
            elapsedTime:'',
            loading:false,
            loadingText:'Loading...',
            loadingPercentage:0,
            playerActionClass:['fa', 'fa-play-circle-o'],

            downloads:0,
            played:0,
            likes:0,
            showElement: false,
            slickOptions: {
                slidesToShow: 3,
                // Any other options that can be got from plugin documentation
            },
        }
    },
    mounted(){
        console.log(this.track);
            //this.downloads=this.track.downloads;
            //this.played=this.track.played;

    },
    methods:{
        initialisePlayer(){
        this.player = wavesurfer.create({
                    container: this.playerContainer,
                    waveColor: '#066265',
                    progressColor: '#771e86',
                    barWidth:3,
                    height:70,
                    hideScrollbar:true
                });
        this.player.load(this.track.audio);
        this.loading=true;
        this.player.on('ready', this.playerReady);
        this.player.on('finish',this.stopTimer);

        //Set pause button
        this.playerActionClass=['fa', 'fa fa-spinner', 'fa-spin'];

        },
        playerReady(){
            //The audio has been load, hence stop showing percentage
            this.loading=false;
            //Set Pause button
            this.playerActionClass=['fa', 'fa-pause-circle-o'];
            
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
             this.audioDuration=this.player.getDuration();
        },
        calculateElapsedTime(){
           this.timer= setInterval(()=>{          
            this.elapsedTime=this.player.getCurrentTime() ;
                        },1000);
        },
      
        stopTimer(){
            clearInterval(this.timer);
           this.playerActionClass=['fa', 'fa-play-circle-o'];
        },
        download(){
                this.downloads++;              
                window.location.href = `../../../download/${this.track.id}`;
        },
         played(){
                this.played++;
                window.location.href = `../../../played/${this.track.id}`;
        }
    },
    filters:{
      time(timeInSeconds){
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
    }
}
    
</script>

