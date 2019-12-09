<template>
    <div class="keyart_layer parallax"
         :id="`keyart-${ index }`"
         :data-speed="parallax.speed"
         :style="`transform: translate3d(0px, ${ yPos }px, 0px)`">
        <img :src="`/img/parallax/${ parallax.imgsrc }`"
             :alt="`parallax image ${index }`" />
    </div>
</template>

<script>

    export default {

        name: 'ParallaxChild',

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
