<template>
    <div class="small-12 medium-6 large-3 columns flex film-card" style="padding: 10px;">
        <div style="background: grey;">
            <div>
                <img :src="`uploads/${ film.imgsrc }`" :alt="`${ film.title } poster`"/>
            </div>
            <h2>{{ film.title }}</h2>
                <ul>
                <li>Released: {{ film.release_date | Year  }}</li>
                <li>Director: {{ film.director.name }}</li>
                <li>Budget: ${{ film.budget | currency }}</li>
                <li>Genres: <span v-for="genre,key in film.genres">{{ film.genres[key].name }}, </span></li>
            </ul>
        </div>
    <reviews :filmId="filmId"></reviews>
    </div>
</template>

<script>
import Reviews from './reviewsComponent'
import moment from 'moment'

    export default {

        name: 'FilmCard',

        components: {
            Reviews
        },

        props: ['film', 'filmId'],

        filters: {
            Year(date){
               return moment(date).format('YYYY')
            },

            currency(budget){
               let BudgeToString = budget.toString();
               let i = (BudgeToString.length > 3) ? BudgeToString.length % 3 : 0;
               return  (i ? BudgeToString.substr(0, i) + ',' : '') + BudgeToString.substr(i).replace(/(\d{3})(?=\d)/g, "$1" + ',')
            }
        }
    }
</script>
