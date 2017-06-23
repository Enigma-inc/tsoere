

<script>
import Slick from 'vue-slick';
export default{
    props:['playerContainer','track'],
    components:{Slick},
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
        this.downloads=this.track.downloads;
        this.played=this.track.played;

    },
    methods:{
        initialisePlayer(){
        this.player = wavesurfer.create({
                    container: this.playerContainer,
                    waveColor: '#066265',
                    progressColor: '#ffffff',
                    barWidth:2,
                    height:20,
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
                this.recordTrackPlay();
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
                axios.get( `../../../download/${this.track.id}`).then((response)=>{
                        console.log("Here is your response...",response.data);
                });           
               // window.location.href = `../../../download/${this.track.id}`;
        },
         recordTrackPlay(){
                axios.get(`../../../played/${this.track.id}`).then((response)=>{
                    this.played=response.data.played;
                });
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

