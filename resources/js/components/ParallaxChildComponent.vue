<template>
    <div class="keyart_layer parallax" :id="`keyart-${ index }`" :data-speed="parallax.speed" :style="`transform: translate3d(0px, ${ yPos }px, 0px)`">
        <img :src="`/img/parallax/${ parallax.imgsrc }`" :alt="`parallax image ${index }`" />
    </div>
</template>

<script>
export default {
    props: ['parallax', 'index'],

    data(){
        return {
            yPos:  0,
        }
    },

    methods:{
        handleScroll(){
            this.yPos =  -(window.pageYOffset * this.$props.parallax.speed / 100);
        }
    },

    created() {
        window.addEventListener('scroll', this.handleScroll);
    },

    destroyed() {
        window.removeEventListener('scroll', this.handleScroll);
    }
}
</script>

<style lang="scss" scoped>
.keyart_layer {
    height: 100%;
    background-position: top center;
    background-size: auto 80vw;
    background-repeat: no-repeat;
    width: 100%;
    position: absolute;

    img{
        width: 100%;
    }

    &.parallax {
        position: fixed;
    }

    @media(min-width: 1250px){
        background-position: top center;
        background-size: auto 1000px;
        background-repeat: no-repeat;
        width: 100%;
    }
}
</style>
