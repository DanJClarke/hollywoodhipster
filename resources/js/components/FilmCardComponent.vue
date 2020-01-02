<template>
    <div class="small-12 medium-6 large-3 columns">
        <div class="film-card">
            <div>
                <img :src="`uploads/${ film.imgsrc }`" :alt="`${ film.title } poster`"/>
            </div>
            <div class="movie-details">
                <header>
                    <h2>{{ film.title }}</h2>
                    <rating v-if="ratings.length > 0" :rating="`${ratings | averageRating}`"></rating>
                </header>
                <dl class="overview">
                    <dt>Released:</dt>
                    <dd> {{ film.release_date | Year  }} </dd>
                    <dt>Director:</dt>
                    <dd> {{ film.director.name }} </dd>
                    <dt>Budget:</dt>
                    <dd> {{ film.budget | currency }} </dd>
                    <dt>Genres:</dt>
                    <dd><span v-for="genre,key in film.genres">{{ film.genres[key].name }}, </span></dd>
                </dl>
                <details>
                    <summary><h3>Plot</h3></summary>
                    <p>{{ film.plot }}</p>
                </details>
            </div>
             <reviews :filmId="filmId" :initialReviews="film.reviews" :updateRating="updateRating"></reviews>
        </div>

    </div>
</template>

<script>
import moment from 'moment'

import Reviews from './ReviewsComponent'
import Rating from './RatingComponent'

export default {
    components: {
        Reviews, Rating
    },

    data() {
       return{
           ratings: this.$props.film.rating.map(({rating}) => rating) || [],
           rating: 0
       }
    },

    filters: {
        currency(budget){
            let BudgeToString = budget.toString();
            let i = (BudgeToString.length > 3) ? BudgeToString.length % 3 : 0;
            return  (i ? BudgeToString.substr(0, i) + ',' : '') + BudgeToString.substr(i).replace(/(\d{3})(?=\d)/g, "$1" + ',')
        },

        Year(date){
            return moment(date).format('YYYY')
        },


        averageRating(ratings){
            if(ratings.length > 0){
                const reducer = (accumulator, currentValue) => accumulator + currentValue;
                return Math.floor(this.ratings.reduce(reducer)/this.ratings.length);
            }
            return 0;
        }
    },

    props:{
        film:{
            default: {},
            type: Object
        },
        filmId:{
            default: null,
            type: Number
        },
    },

    methods:{
         updateRating(value){
          this.rating = value;
          this.ratings.push(value);
        }
    },

    computed:{
        averageRating(){
            const reducer = (accumulator, currentValue) => accumulator + currentValue;
            return Math.floor(this.ratings.reduce(reducer)/this.ratings.length);
        }
    },
}
</script>

<style lang="scss" scoped>
@import './resources/sass/utilities/_mixins.scss';

.film-card{
    background: #444;
    overflow: hidden;
    @include border-radii(20px, 80px, 20px, 20px);
    @include box-shadow(0px, 0px ,20px, rgba(221, 142, 142,.15));

    img {
        max-height: 400px;
        object-fit: cover;
        object-position: 0 50%;
        width: 100%;
    }
}

details{
   margin-top: 15px;

    h3{
        display: inline-block;
        font-size: 25px;
        transform: translateY(4px);
    }
}

.movie-details{
    padding: 0px 15px 15px 15px;
    position: relative;

    &:after{
        content:'';
        background: #444;
        display: block;
        height: 70px;
        left: 50%;
        position: absolute;
        top:26px;
        transform: translate(-50%, -50%) rotate(7deg);
        width: 200%;
        z-index:0;
        @media(max-width:639px){
            transform: translate(-50%, -50%) rotate(4deg);
        }
    }

    header{
        max-width: 66.666%;

        h2{
            display: table;
            font-size: 44px;
            margin-top: -35px;
            padding-bottom: 10px;
            position: relative;
            text-shadow: 0px 0px 20px rgba(221, 142, 142,.5);
            z-index:1;

            &:after{
                background-color: #fff;
                bottom:0;
                content:'';
                display: block;
                height: 1px;
                left:0;
                position: absolute;
                width: 100%;
            }
        }
    }

    .overview{
        font-size: 0.85rem;
        margin:0;
        padding-top: 5px;

        dt{
            display: none;
        }
        dd{
            display: inline;

            &:after{
                content:'|';
                display: inline-block;
                padding: 5px;
            }

            &:last-of-type{
                &:after{
                    content:'';
                    padding: 0px;
                }
            }
        }
    }
}
</style>
