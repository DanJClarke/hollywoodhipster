<template>
    <div class="keyart" id="parallax">
        <parallax-child v-for="(parallax, index) in parallaxData" :key="index" :index="index" :parallax="parallax"></parallax-child>
    </div>
</template>

<script>
import ParallaxChild from './parallaxChildComponent'

export default {
    components:{
        ParallaxChild
    },

    data(){
        return{
            parallaxData: [
                {imgsrc:"hollywood-parallax-1.svg", speed: 0,},
                {imgsrc:"hollywood-parallax-2.svg", speed: 5,},
                {imgsrc:"hollywood-parallax-3.svg", speed: 11,},
                {imgsrc:"hollywood-parallax-4.svg", speed: 16,},
                {imgsrc:"hollywood-parallax-5.svg", speed: 22,},
                {imgsrc:"hollywood-parallax-6.svg", speed: 32,},
                {imgsrc:"hollywood-parallax-7.svg", speed: 32,},
                {imgsrc:"hollywood-parallax-8.svg", speed: 32,}
            ]
        }
    }
}
</script>

<style lang="scss" scoped>
.keyart {
    background:#231F20;
    overflow: hidden;
    padding-bottom: 170%;
    position: relative;
    z-index: -1;
}
</style>
