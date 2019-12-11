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
        }
    },

    mounted(){
        axios.get(`/admin/users/${this.$props.userId}`)
        .then(response => this.userName = response.data[0].name)
    }
}
</script>
