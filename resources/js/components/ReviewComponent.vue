<template>
    <div class="review" >
        <blockquote>
            {{ review.content }}
            <cite>{{ userName }}</cite>
        </blockquote>
        <hr>
    </div>
</template>

<script>
export default {
    props: {
        userId:{
           type: Number,
           default: null
        },
        reviewId:{
           type: Number,
           default: null
        },
         review:{
           type: Object,
           default: {}
        }
    },

    data(){
        return{
            userName: '',
        }
    },

    mounted() {
        axios.get(`/admin/users/${this.$props.userId}`)
        .then(response => this.userName = response.data[0].name)
    }
}
</script>
