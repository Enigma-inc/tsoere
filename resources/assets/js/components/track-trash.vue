
<template>
      <div>
        <a v-if="!deleted" @click="trashTrack()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-trash-o"></i> Trash </a> 
        <a v-if="deleted" @click="unTrashTrack()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-recycle"></i> Restore </a> 
        <a v-if="downloadable && !deleted" @click="disableDownloads()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-recycle"></i> Disable Downloads </a> 
        <a v-if="!downloadable && !deleted" @click="enableDownloads()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-recycle"></i> Enable Downloads </a> 

      </div>
                                                      
</template>

<script>
export default{    
        props:['track'],
        data(){
                return{
                        deleted:false,
                        downloadable:1
                }
        },
        mounted(){
                this.deleted= this.track.deleted_at !=null;
                this.downloadable=this.track.downloadable==1;
                //console.log(this.downloadable)
        },
        methods:{
                trashTrack(){
                        axios.post(`tracks/${this.track.id}/trash`).then(()=>{
                                ///alert the that job is done
                             window.location='../profile';
                        });
                },
                unTrashTrack(){
                       axios.post(`tracks/${this.track.id}/untrash`).then(()=>{
                                ///alert the that job is done
                             window.location='../profile';
                        });
                },
                disableDownloads(){
                        axios.post(`tracks/${this.track.id}/disableDownloads`).then(()=>{
                                ///alert the that job is done
                             window.location='../profile';
                        });
                },
                enableDownloads(){
                        axios.post(`tracks/${this.track.id}/enableDownloads`).then(()=>{
                                ///alert the that job is done
                             window.location='../profile';
                        });
                }
        }
}
</script>