
<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template>

    <div class='toolt'>
        <div v-if="anime == 0">
            <self-building-square-spinner
                    :animation-duration="6000"
                    :size="40"
                    color="#ff1d5e"
            />
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
                <a v-for="target in anime.targets" :href="'../../target/'+ target.id">{{target.name}} </a>
            </div>
            <div style='text-align: left;font-size:12px' class='my-3'>
                <span style='font-size:15px'>Categories: </span>
                <a v-for="category in anime.categories" :href="'../../category/'+ category.id">{{category.name}} </a>
            </div>
            <a class='btn btn-outline-info my-3 anime-link-info' :href=' "../../anime/" + anime.id '><i class='fas fa-share'></i>Anime</a>
        </div>
    </div>
</template>

<script>
    import {SelfBuildingSquareSpinner} from 'epic-spinners'

    export default {
        data() {
            return {
                anime: Object,
                loading: false,
                check: false
            }
        },
        components: {
            SelfBuildingSquareSpinner
        },
        props: {
            anime_id: Number
        },
        methods: {
            getAnime: function () {
                if (this.check == false) {

                    this.loading = true;
                    var vm = this;
                    axios.get('../../getAnimeInfo-api/' + vm.anime_id).then(response => {
                        vm.anime = response.data;
                        vm.loading = false;
                        vm.check = true;
                    });
                }
            },
            getAnimeStatus: function (status) {
                switch (status) {
                    case 0:
                        return "Ongoing";
                    case 1:
                        return "Finished";
                    case 2:
                        return "Paused";
                    default:
                        return "Error";
                }
            }
        }


    }

</script>

