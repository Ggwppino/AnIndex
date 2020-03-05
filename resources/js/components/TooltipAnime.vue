<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template>

    <div class='toolt'>
        <div v-if="anime == 0">
            Loading...
        </div>
        <div v-else>
            <h5 class='titletool'>{{anime.name}}</h5>
            <h6 style='text-align: left'>Plot: </h6>
            <p class='plotool'>{{anime.plot}}</p>
            <div style='text-align: left; font-size:12px' class='my-3'>
                <span style='font-size:15px'>Status: </span>
                <a :href="'status/'+ anime.status">{{getAnimeStatus(anime.status)}} </a>
            </div>
            <div style='text-align: left;font-size:12px' class='my-3'>
                <span style='font-size:15px'>Target: </span>
                <a v-for="target in targets" :href="'target/'+ target.id">{{target.name}} </a>
            </div>
            <div style='text-align: left;font-size:12px' class='my-3'>
                <span style='font-size:15px'>Categories: </span>
                <a v-for="category in categories" :href="'category/'+ category.id">{{category.name}} </a>
            </div>
            <a class='btn btn-outline-info my-3' :href=' "anime/" + anime.id '><i class='fas fa-share'></i>Anime</a>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                anime: [],
                categories: [],
                targets:[],
                loading: true
            }
        },
        props: {
            anime_id: Number
        },
        methods: {
            getAnime: function () {
                if (this.loading == true) {
                    var vm = this;
                    axios.get('getAnime-api/' + vm.anime_id).then(response => {
                        vm.anime = response.data;
                    });
                    axios.get('getTarget-api/'+ vm.anime_id).then(response =>{
                        vm.targets = response.data;
                    });
                    axios.get('getCategories-api/' + vm.anime_id).then(response => {
                        vm.loading = false;
                        vm.categories = response.data;
                    });
                }
            },
            getAnimeStatus: function (status){
                switch(status){
                    case 0: return "Ongoing";
                    case 1: return "Finished";
                    case 2: return "Paused";
                    default: return "Error";
                }
            }
        }


    }

</script>

