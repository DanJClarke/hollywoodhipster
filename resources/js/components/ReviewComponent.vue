<template>
    <div class="review" >
        <blockquote v-if="!errors">
            <p>{{ review.content }}</p>
            <cite>{{ userName }}</cite>
        </blockquote>
        <div v-else  class="callout warning">
            Could not set review to user
        </div>
    </div>
</template>

<script>
export default {
    props:{
        review:{
           default: {},
           type: Object
        },
        reviewId:{
           default: null,
           type: Number
        },
        userId:{
           default: null,
           type: Number
        }
    },

    data(){
        return{
            userName: '',
            errors: false
        }
    },

    mounted(){
        axios.get(`/admin/users/${this.$props.userId}`)
        .then(response => {
            this.userName = response.data[0].name
        })
        .catch(error => {
            this.errors = true;
        });
    }
}
</script>

<style lang="scss" scoped>
blockquote {
    margin: 0 0 1rem;
    padding: 0.5rem 1.25rem 0 1.125rem;
    border-left: 1px solid #444;

    p, cite {
        line-height: 1.6;
        color: #444;
        margin-bottom: 5px;
    }

}
</style>
