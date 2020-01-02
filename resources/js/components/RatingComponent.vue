<template>
    <div>
        <div class="rating-block">
            <div class="rating-block-rating">
                <star-rating
                    v-for="index in maxValue"
                    :key="index"
                    :rating="rating"
                    :index="index"
                    :initial-form="initialForm"
                    :enableClick="active"
                    :updateForm="updateForm"
                ></star-rating>
            </div>
        </div>
    </div>
</template>

<script>


import StarRating from './StarComponent'

export default {
    components: {
        StarRating
    },

    props:{
        rating:{
            default: 0
        },
        active:{
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
            maxValue: 5,
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
