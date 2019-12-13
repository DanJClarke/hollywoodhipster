<template>
    <div class="keyart_layer parallax" :id="`keyart-${ index }`" :data-speed="parallax.speed" :style="`transform: translate3d(0px, ${ yPos }px, 0px)`">
        <img :src="`/img/parallax/${ parallax.imgsrc }`" :alt="`parallax image ${index }`" />
    </div>
</template>

<script>
export default {

    props: {
        index:{
           default: null,
           type: Number
        },
        parallax:{
           default: {},
           type: Object,
        }
    },

    data(){
        return {
            yPos:  0,
        }
    },

    created() {
        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    },

    mounted(){
        this.handleScroll();
    },

    methods:{
        handleScroll(){
            this.yPos =  -(window.pageYOffset * this.$props.parallax.speed / 100);
        }
    }
}
</script>

<style lang="scss" scoped>



.keyart_layer {
    background-position: top center;
    background-repeat: no-repeat;
    background-size: auto 80vw;
    height: 100%;
    position: absolute;
    width: 100%;

    img{
        width: 100%;
    }

    &.parallax {
        position: fixed;
    }

    @media(min-width: 1250px){
        background-position: top center;
        background-repeat: no-repeat;
        background-size: auto 1000px;
        width: 100%;
    }
}
</style>
