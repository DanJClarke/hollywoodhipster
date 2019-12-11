<template>
    <div :class="['star', {'selected': showStar}]" @click="setRating">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="37" viewBox="0 0 40 37">
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
            default: null,
            type: Number
        },
    },

    computed:{
        showStar(){
            return this.$props.rating >= this.$props.index;
        }
    },

    methods:{
        setRating(){
            this.$emit('setRating', this.index);
        }
    }
}
</script>

<style lang="scss" scoped>

@import './resources/sass/_variables.scss';
.star {
    cursor: pointer;
    stroke: $rating-color;

    &.selected {
        polygon {
            fill: $rating-color;
        }
    }
}
</style>
