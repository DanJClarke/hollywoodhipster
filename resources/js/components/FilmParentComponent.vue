<template>
    <div id="filmParent">
        <div v-if="filmList.length > 0">
            <film-card  v-for="film in filmList" :filmId="film.id" :key="film.id" :film="film"></film-card>
        </div>
        <div v-else  class="callout warning">
            No films in the database
        </div>
    </div>
</template>

<script>
import FilmCard from './filmCardComponent'

export default {
    components: {
        FilmCard
    },

    data(){
        return{
            filmList:[],
        }
    },

    mounted() {
        axios.get('/film-data')
             .then(response => {
                this.filmList = response.data
             })
    }
}
</script>
