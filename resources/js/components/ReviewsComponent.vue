<template>
    <div class="reviews" :name="filmId">
        <div v-if="reviews.length > 0" id="reviews" >
            <h3>Reviews</h3>
            <review v-for="review in reviews" :reviewId="review.id" :key="review.id" :userId="review.user_id" :review="review"></review>
        </div>
        <div :class="['callout', 'success' , {'warning': hasError}]" v-show="reviewStatus" v-model="reviewStatus" v-text="reviewStatus"></div>
        <review-form :filmId="filmId" @submitted="updateReviews" @status="updateStatus"></review-form>
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
        }
    },

    data(){
        return{
            reviews: [],
            reviewContent:'',
            reviewStatus:'',
            hasError: false,
            userHasReviewed: false
        }
    },

    mounted() {
        axios.get(`/reviews/${this.$props.filmId}`)
             .then(response => this.reviews = response.data);
    },

    methods:{
        updateReviews(value){
            this.reviewContent = value;
            this.reviews.push({
                content: this.reviewContent,
                user_id: 2,
            });
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
    background: #eee;
}
</style>
