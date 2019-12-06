<template>
    <div style="background: #eee;">
        <h3>Review yourself</h3>
        <textarea width="100%" rows="5" v-model="reviewContent"></textarea>
        <button class="button" @click="submitted()">submit</button>

    </div>
</template>

<script>


    export default {

        name: 'ReviewForm',
        props: ['filmId'],

        data(){
            return {
                reviewContent:''
            }
        },

        methods:{
            submitted(event){
                if(this.reviewContent !=''){
                  this.$emit('submitted', this.reviewContent);
                   this.reviewContent ='';
                }


                //submit(requestType, url){
               // axios[requestType](url, this.data())
               //     .then(this.onSuccess.bind(this))
                //    .catch(this.onFail.bind(this))
           // }
            }
        }
    }
</script>
