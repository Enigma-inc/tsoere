<template>

 

  
</template>
<script>
export default {
    data(){
        return{
            searchword:'',
        }
    },
  methods:{
      search(){
          window.location=`/search?query=${this.searchword}`;
      }
  }
}
</script>

