<template>
    <div id="filmParent">
        <film-card v-for="film in filmList" :filmId="film.id" :key="film.id" :film="film"></film-card>
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
        axios.get('/film-data').then(response => this.filmList = response.data);
    }
}
</script>
