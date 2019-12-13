<template>
    <div class="reviews" :name="filmId">
        <div v-if="reviews.length > 0">
            <details open>
                <summary><h3>Reviews</h3></summary>
                <review v-for="review in reviews" :reviewId="review.id" :key="review.id" :userId="review.user_id" :review="review"></review>
            </details>
        </div>
        <div :class="['callout', 'success' , {'warning': hasError}]" v-show="reviewStatus" v-model="reviewStatus" v-text="reviewStatus"></div>
        <review-form :filmId="filmId" @submittedReview="updateReviews" @submittedRating="updateRating" @status="updateStatus"></review-form>
    </div>
</template>

<script>
import Review from './reviewComponent'
import ReviewForm from './reviewFormComponent'

export default {
    components: {
        Review,
        ReviewForm
    },

    props: {
        filmId:{
           default: null,
           type: Number
        },
        initialReviews:{
           default: [],
           type: Array
        }
    },

    data(){
        return{
            reviews: this.initialReviews,
            reviewContent:'',
            reviewStatus:'',
            hasError: false,
            userHasReviewed: false,
            rating: null
        }
    },

    methods:{
        updateReviews(value){
            this.reviewContent = value;
            this.reviews.push({
                content: this.reviewContent,
                user_id: 2,
            });
        },

        updateRating(value){
            this.rating = value;
            this.$emit('updateRating',this.rating);
        },

        updateStatus(status){
            this.hasError = status.errorFlag || this.hasError;
            this.reviewStatus = status.message;
            this.userHasReviewed = status.hasReviewedFlag || this.userHasReviewed;
        }
    }
}
</script>

<style lang="scss" scoped>
.reviews{
    background: #ccc;
    padding: 1px 15px 15px 15px ;
    position: relative;

    details{
        margin-top: 15px;
        color: #444;
        h3{
            display: inline-block;
            font-size: 25px;
            transform: translateY(4px);
            color: #444;
        }
    }
}
</style>
