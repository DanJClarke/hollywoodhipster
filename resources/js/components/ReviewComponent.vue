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

        name: 'Review',

        props: ['review', 'reviewId', 'userId'],

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
