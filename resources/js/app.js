/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./foundation');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('film-parent', require('./components/FilmParentComponent.vue').default);
Vue.component('parallax-parent', require('./components/ParallaxpParentComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#root',
});

var initialval = document.querySelector('[name="rating"]');
var stars = document.querySelectorAll('[data-rating] .star');

if(initialval && initialval.value){
    for(let i = 0; i< stars.length; i++){
        if(stars[i].getAttribute('data-rating') == initialval.value){
            stars[i].classList.add('selected');
            stars[i].parentNode.classList.add('is-voted');
        }
    }
}

for(let i = 0; i< stars.length; i++){
    stars[i].addEventListener('click', function(){
        var siblings = this.parentNode.children;

        for(let j = 0; j< siblings.length; j++){
            siblings[j].classList.remove('selected');
        }

        this.classList.add('selected');
        this.parentNode.classList.add('is-voted');
        initialval.value = this.getAttribute('data-rating');
    });
}
