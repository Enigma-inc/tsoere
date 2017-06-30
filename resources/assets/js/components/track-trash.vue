
<template>
      <button @click="trashTrack()" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-trash-o"></i> Trash </button> 
                                                      
</template>

<script>
export default{    
        props:['trackId'],
        methods:{
                trashTrack(){
                        axios.post(`tracks/${this.trackId}/trash`).then(()=>{
                                ///alert the that job is done
                             console.log("DELETED....");
                             window.location='../profile';
                        });
                }
        }
}
</script>