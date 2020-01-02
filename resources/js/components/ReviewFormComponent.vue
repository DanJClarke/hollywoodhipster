<template>
    <div class="review-form">
        <h3>Leave a review </h3>
        <label for="rating">Rating (optional)
            <rating :updateRating="updateRating" :initial-rating="0" :rating="rating" :initial-form="true" :active="true" :updateForm="updateForm"></rating>
        </label>
        <label for="content">Review
            <textarea width="100%"  name="content" rows="5" v-model="reviewContent"></textarea>
        </label>
        <button class="button" @click="submitted()">submit </button>
    </div>
</template>

<script>
import Rating from './RatingComponent'

export default {
    components: {
        Rating
    },

    props:{
        filmId:{
           default: null,
           type: Number
        },
        updateRating: {
            type: Function
        }
    },

    data(){
        return {
            reviewContent:'',
            userId:2,
            rating: null
        }
    },

    methods:{
        updateForm(value){
            this.rating = value;
        },

        submitted(event){
            if(this.reviewContent !=''){
                axios.post(`/manage-reviews`, {
                    'content': this.reviewContent,
                    'film_id': this.$props.filmId,
                    'user_id': this.userId

                }).then(response => {
                   this.$emit('submittedReview', this.reviewContent);
                   this.$emit('status', {
                       message: response.data,
                       hasReviewedFlag: true
                    });
                })

                .catch(error => {
                   if(error.response.status === 500){
                    this.$emit('status', {
                       message: 'You have already reviewed this film',
                       errorFlag: true
                    });
                   }
                });
            }

            if(this.rating != null){

                axios.post(`/manage-rating`, {
                    'rating': this.rating,
                    'film_id': this.$props.filmId,
                    'user_id': this.userId

                }).then(response => {
                   this.updateRating(this.rating);
                   this.$emit('status', {
                       message: response.data,
                       hasReviewedFlag: true
                    });
                }).catch(error => {
                    if(error.response.status === 500){
                        this.$emit('status', {
                        message: 'You have already rated this film',
                        errorFlag: true
                        });
                    }
                });
            }
        },
    }
}
</script>

<style lang="scss" scoped>
.review-form{
    margin-top: 15px;
    h3, label{
        color: #444;
    }

    label[for="rating"]{
        width: 66.666%;
    }

    .button{
        background: #7C55AD;
    }
}
</style>
