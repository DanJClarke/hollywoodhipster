<template>
    <div class="review-form">
        <h3>Review yourself</h3>
        <textarea width="100%" rows="5" v-model="reviewContent"></textarea>
        <button class="button" @click="submitted()">submit</button>
    </div>
</template>

<script>
export default {
    props: ['filmId'],

    data(){
        return {
            reviewContent:''
        }
    },

    methods:{
        submitted(event){s
            if(this.reviewContent !=''){
                this.$emit('submitted', this.reviewContent);
                this.reviewContent ='';
            }
            //submit(requestType, url){
            //  axios[requestType](url, this.data())
            //      .then(this.onSuccess.bind(this))
            //      .catch(this.onFail.bind(this))
            //}
        }
    }
}
</script>

<style lang="scss" scoped>
.review-form {
    background: #eee;
}
</style>

