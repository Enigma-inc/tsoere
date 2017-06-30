<template>
      <button @click="untrashTrack()" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-trash-o"></i> UnTrash </button> 
                                                      
</template>

<script>
export default{    
        props:['trackId'],
        methods:{
                untrashTrack(){
                        axios.post(`tracks/${this.trackId}/untrash`).then(()=>{
                                ///alert the that job is done
                             console.log("Recycled...");
                             window.location='../profile';
                        });
                }
        }
}
</script>