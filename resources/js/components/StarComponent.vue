<template>
    <div :class="['star', {'initial-review-form': initialForm}, {'selected': showStar}]" @click="e => enableClick && setRating(e)">
        <svg xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 40 37">
            <polygon fill="none" points="272 30 260.244 36.18 262.489 23.09 252.979 13.82 266.122 11.91 272 0 277.878 11.91 291.021 13.82 281.511 23.09 283.756 36.18" transform="translate(-252)"/>
        </svg>
    </div>
</template>

<script>
export default {
    props:{
        index:{
            default: null,
            type: Number
        },
        rating:{
            default: null
        },
        enableClick:{
            default: false,
            type: Boolean
        },
        initialForm:{
            default: false,
            type: Boolean
        },
        updateForm:{
            type: Function
        }
    },

    data(){
        return{
            initialReview: this.$props.initialForm
        }
    },

    computed:{
        showStar(){
            return this.$props.rating >= this.$props.index;
        }
    },

    methods:{
        setRating(){
            this.updateForm(this.index)
        }
    }
}
</script>

<style lang="scss" scoped>
@import './resources/sass/utilities/_variables.scss';

.star {
    cursor: pointer;
    stroke: $primary-brand-color;
    stroke-width: 2;
    width: 20%;
    height: auto;
    padding: 2px;

    svg{
        width: 100%;
        height: 100%;
    }

    &.selected {
        polygon {
            fill: $primary-brand-color;
        }
    }

    &.initial-review-form{
         stroke: $secondary-brand-color;

         &.selected {
            polygon {
                fill: $secondary-brand-color;
            }
        }
    }
}
</style>
