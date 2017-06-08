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
                window.location.href = `../download/${this.track.id}`;
              //axios.post(`../download/${this.track.id}`).then(response=>{

            //  });
            }
        }
    }
</script>