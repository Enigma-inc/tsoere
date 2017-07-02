
<template>
 <div class="update-links text-center"> 
      <a data-toggle="modal" @click="showtTitleEditModal" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-pencil-square-o"></i> Edit Title</a>
       <a data-toggle="modal" @click="showtArtworkEditModal" class="btn btn-xs btn-accent btn-flat"><i class="fa fa-camera"></i> Change Artwork </a>
       
        <a v-if="!deleted" @click="trashTrack()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-trash-o"></i> Trash </a> 
        <a v-if="deleted" @click="unTrashTrack()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-recycle"></i> Restore </a> 
        <a v-if="downloadable && !deleted" @click="disableDownloads()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-times"></i> Disable Downloads </a> 
        <a v-if="!downloadable && !deleted" @click="enableDownloads()" class="btn btn-xs btn-accent btn-flat margin-bottom-5"><i class="fa fa-check"></i> Enable Downloads </a> 

      </div>
                                                      
</template>

<script>
export default{    
        props:['track'],
        data(){

                return{
                        editTitleModalId:'',
                        editArtworkModalId:'',
                        deleted:false,
                        downloadable:1
                }
        },
        mounted(){
                this.editTitleModalId='#Title-edit-'+this.track.id;
                this.editArtworkModalId='#Artwork-edit-'+this.track.id;
                this.deleted= this.track.deleted_at !=null;
                this.downloadable=this.track.downloadable==1;
                console.log(this.downloadable)
        },
        methods:{
                showtTitleEditModal(){
                        $(this.editTitleModalId).modal('show');
                },
                showtArtworkEditModal(){
                        $(this.editArtworkModalId).modal('show');
                },
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
<style lang="scss" scoped>
.btn-xs{
        font-size: 10px;
}
</style>
