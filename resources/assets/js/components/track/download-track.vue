<script>
    export default{
        props:['inputTrack'],
        data(){
            return{
                track:{}
            }
        },
        mounted(){
            this.track=JSON.parse(this.inputTrack);
        },
        methods:{
            download(){
              axios.get(`../tracks/download/${this.track.id}`).then(response=>{

              });
            }
        }
    }
</script>