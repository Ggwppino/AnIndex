/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const axios =require('axios');

window.Vue = require('vue');

vueTippy = require('vue-tippy');
Vue.use(vueTippy);




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('tooltip-anime', require("./components/TooltipAnime.vue").default);
Vue.component('print-anime', require("./components/TryPagination.vue").default);
Vue.component('generate-genere', require("./components/TooltipGeneres.vue").default);
//Vue.component('example-component', require("./components/ExampleComponent.vue").default);
// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const pagination = new Vue({
    el: '#pagination',
    data: {
        animes: []
    },
    mounted() {
        axios.get('getlist')
            .then(response => {
                pagination.animes=response.data;
            })
            .catch(function (error) {
                console.log(error);
            });
    }
});








