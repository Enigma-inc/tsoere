

<script>
import Slick from 'vue-slick';
export default{
    props:['playerContainer','track'],
    components:{Slick},
    data(){
        return{
            audio:'',
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
            shared:0,
            likes:0,
            showElement: false,
            slickOptions: {
                slidesToShow: 3,
                // Any other options that can be got from plugin documentation
            },


        }
    },
    mounted(){
         this.listenToPauseEvent()
        this.downloads=this.track.downloads;
        this.played=this.track.played;
        this.shared=this.track.shared;

    },
    methods:{
        initialisePlayer(){
        this.player = wavesurfer.create({
                    container:this.playerContainer,
                    waveColor: '#066265',
                    progressColor: '#ffffff',
                    barWidth:2,
                    height:20,
                    hideScrollbar:true,
                    backend: 'MediaElement',
                });
        this.player.backend.peaks = [ 0.15, 0.2542, 0.2538, 0.2358, 0.1195, 0.1591, 0.2599, 0.2742, 0.1447, 0.2328, 0.1878, 0.1988, 0.1645, 0.1218, 0.2005, 0.2828, 0.2051, 0.1664, 0.1181, 0.1621, 0.2966, 0.189, 0.246, 0.2445, 0.1621, 0.1618, 0.189, 0.2354, 0.1561, 0.1638, 0.2799, 0.0923, 0.1659, 0.1675, 0.1268, 0.0984, 0.0997, 0.1248, 0.1495, 0.1431, 0.1236, 0.1755, 0.1183, 0.1349, 0.1018, 0.1109, 0.1833, 0.1813, 0.1422, 0.0961, 0.1191, 0.0791, 0.0631, 0.0315, 0.0157, 0.0166, 0.0108];
        this.player.drawBuffer();
        this.player.load(this.track.audio,this.player.backend.peaks);
        this.dispatchPauseEvent();
        this.player.playPause();
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
            this.showPauseIcon();
            
           // this.player.playPause();
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
                    this.dispatchPauseEvent();
                     //Restart the Timer
                     this.showPauseIcon();
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
           this.showPlayIcon();
        },
        download(){
                this.downloads++;   
                window.location.href = `../../../download/${this.track.id}`; 
        },
         recordTrackPlay(){
                axios.get(`../../../played/${this.track.id}`).then((response)=>{
                    this.played=response.data.played;
                });
        },
        listenToPauseEvent(){
        let self=this;            
            EventBus.$on('pause-audio', function(track){
              if(self.player && track.container != self.playerContainer )
            {
                if(self.player.isPlaying())
                {
                    self.player.pause();
                    self.showPlayIcon();
                }
            }
            
        });
        },
        dispatchPauseEvent(){
            //Inform Other Player that you are playing a song and they should pause theirs
                    EventBus.$emit('pause-audio',{'container':this.playerContainer});
        },
        showPlayIcon(){
            this.playerActionClass=['fa', 'fa-play-circle-o'];
        },
        showPauseIcon(){
            this.playerActionClass=['fa', 'fa-pause-circle-o'];
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

