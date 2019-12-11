<template>
    <div class="review-form">
        <h3>Review yourself</h3>
        <textarea width="100%"  name="content" rows="5" v-model="reviewContent"></textarea>
        <button class="button" @click="submitted()">submit</button>
    </div>
</template>

<script>
export default {
    props: {
        filmId:{
           type: Number,
           default: null
        }
    },

    data(){
        return {
            reviewContent:'',
        }
    },

    methods:{
        submitted(event){
            if(this.reviewContent !=''){
                axios.post(`/manage-reviews`, {
                    'content': this.reviewContent,
                    'film_id': this.$props.filmId,
                    'user_id': 2
                }).then(response => {
                   this.$emit('submitted', this.reviewContent);
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
                this.reviewContent ='';
            }
        }
    }
}
</script>

<style lang="scss" scoped>
.review-form {
    background: #eee;
}
</style>

