<template>
    <div>
        <div class="rating-block">
            <div class="rating-block-rating">
                <star-rating v-for="index in maxValue" :rating="rating" :key="index" :index="index" :initial-form="initialForm" @setRating="updateRating" :enableClick="active"></star-rating>
            </div>
        </div>
        <input type="hidden" name="rating" min="1" max="5" :value="rating" >
    </div>
</template>

<script>
import StarRating from './StarComponent'

export default {
    components: {
        StarRating
    },

    props:{
        initialRating:{
            default: 0,
            type: Number
        },
        active:{
            default: false,
            type: Boolean
        },
        initialForm:{
            default: false,
            type: Boolean
        }
    },

    data(){
        return{
            rating: this.initialRating,
            maxValue: 5
        }
    },

    methods:{
        updateRating(value){
            this.rating = value;
            if(this.$props.initialForm){
                 this.$emit('updateRating', value);
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.rating-block {
  padding: 2px 0px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  position: relative;
  z-index: 11;

    .rating-block-rating {
        display: flex;
    }
}
</style>
