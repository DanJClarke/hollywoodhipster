<template>
    <div class="review" >
        <blockquote v-if="errors">
            {{ review.content }}
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
