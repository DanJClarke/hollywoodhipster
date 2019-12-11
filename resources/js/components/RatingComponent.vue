<template>
    <div>
        <div class="rating-block">
            <div class="rating-block-rating">
                <star-rating v-for="index in maxValue" :rating="rating" :key="index" :index="index" @setRating="updateRating"></star-rating>
            </div>
        </div>
        <input type="hidden" name="rating" min="1" max="5" :value="rating" >
    </div>
</template>

<script>
import StarRating from './starComponent'

export default {
    components: {
        StarRating
    },

    props:{
        initialRating:{
            default: null,
            type: Number
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
        }
    }
}
</script>

<style lang="scss" scoped>
.rating-block {
  padding: 2px 5px;
  display: flex;
  align-items: center;
  justify-content: space-between;

    .rating-block-rating {
        display: flex;
    }
}
</style>
