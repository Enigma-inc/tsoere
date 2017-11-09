<template>
     <li>
        <a :href="item.slug" v-for="(item,index) in menu" :key="index">
            <div class="gui-icon"><i class="fa fa-music " ></i></div>
            <span class="title">{{item.name}}</span>
        </a>
    </li>
</template>

<script>
export default {
    data(){
        return {
            menu:[
                {name:'Hip Hop',slug:'hip-hop'},
                {name:'Famo',slug:'famo'},
                {name:'Jazz',slug:'jazz'}
            ],
            rotation:['fa-rotate-90','fa-rotate-180','fa-rotate-270','fa-rotate-360']

        }
    },
    computed:{
        rotateIcon(){
            return this.rotation[Math.floor(Math.random() * this.rotation.length)]
        }
    }
}
</script>

<style>

</style>
