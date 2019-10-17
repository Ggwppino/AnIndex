/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
const axios = require('axios');

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

Vue.component('new-episodes', require("./components/Pages/NewEpisodes.vue").default);
Vue.component('anime-info', require("./components/Shared/AnimeInfo.vue").default);
Vue.component('Layout', require("./components/Shared/Layout.vue").default);
Vue.component('Login', require("./components/Pages/Login.vue").default);
Vue.component('Register', require("./components/Pages/Register.vue").default);
Vue.component('anime', require("./components/Pages/Anime.vue").default);
Vue.component('fansub', require("./components/Pages/Fansub.vue").default);
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
        axios.get('getList-api')
            .then(response => {
                pagination.animes = response.data;
                console.log(pagination.animes);
            })
            .catch(function (error) {
                console.log(error);
            });
    }
});

const login = new Vue({
    el: '#login',
    mounted() {
        console.log("mounted!")
    }
});

const register = new Vue({
    el: '#register',
    mounted() {
        console.log("mounted!")
    }
});

const pagination_anime_node = new Vue({
    el: '#paginationanime',
    data: {
        anime_node: ""
    }
});

const pagination_fansub = new Vue({
    el:'#paginationfansub',
    data:{
        fansub: ""
    }
});







