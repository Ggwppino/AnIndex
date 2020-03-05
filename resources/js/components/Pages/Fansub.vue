
<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template>
    <div class="my-4">
        <div class="container" style="height: 400px">
                <div class="m-4" style="width:215px; display:inline; float:left">
                    <div style="width:215px;height:300px; background-color: #ff1d5e"><img src="https://picsum.photos/215/300"></div>
                    <div class="btn btn-dark mt-2" style="width:100%;background-color: #ff1d5e">Follow</div>
                </div>
                <div style="display:inline;padding-top: 3rem !important; width:600px">
                    <h3 style="padding-top: 6rem !important">{{fansub.name}}</h3>
                    <a :href="fansub.mainlink">Homepage</a>
                    <br/>
                </div>
        </div>

        <div class="container my-5 py-4 px-4"
             style="background-color: #1f232d !important; border-radius: 3px">
            <div id="slotanime" class="">
                <div v-if="lastworks" class="mb-5">
                    <h5>Recent works</h5>
                    <div class="card-deck">
                        <div class="card my-4 animecard" v-for="(episode,indexx) in lastworks" :key="indexx">
                            <div class="displayedimage"
                                 :style="'background-image: url(https://picsum.photos/260)'"
                                 v-tippy="{
                            html: '#toolplotepisode',
                            arrow: false,
                            placement: 'right-start',
                            delay : [800,0],
                            interactive: true,
                            zIndex: 1019,
                            reactive : true,
                            duration : 300,
                            theme : 'matherial'}" @mouseover="$refs.childepisode[indexx].getAnime()"
                            >
                            </div>
                            <a class="title-anime" :href="'../../anime/'+ episode.anime_id">{{episode.name}}</a>
                            <h4><span class="badge badge-primary episode-anime">Ep {{episode.number}}</span></h4>
                            <anime-info id="toolplotepisode" :anime_id="episode.anime_id" ref="childepisode"/>

                        </div>
                    </div>

                </div>
                <h5>Animes</h5>
                <div v-if="loadanimes">
                    <self-building-square-spinner
                            :animation-duration="6000"
                            :size="40"
                            color="#ff1d5e"
                    />
                </div>
                <span v-else-if="animes.length == 0">No Animes</span>
                <div class="card-deck">
                    <div class="card my-4 animecard" v-for="(anime,index) in animes" :key="index">
                        <div class="displayedimage"
                             :style="'background-image: url(https://picsum.photos/260)'"
                             v-tippy="{
                            html: '#toolplot',
                            arrow: false,
                            placement: 'right-start',
                            delay : [800,0],
                            interactive: true,
                            zIndex: 1019,
                            reactive : true,
                            duration : 300,
                            theme : 'matherial'}" @mouseover="$refs.child[index].getAnime()"
                        >
                        </div>
                        <a class="title-anime" :href="'../../anime/'+ anime.id">{{anime.name}}</a>
                        <anime-info id="toolplot" :anime_id="anime.id" ref="child"/>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {SelfBuildingSquareSpinner} from 'epic-spinners';

    export default {
        props: {
            fansub: Object
        },
        components: {
            SelfBuildingSquareSpinner,
        },
        data: function () {
            return {
                animes: [],
                lastworks: [],
                loadanimes: true
            }
        },
        mounted() {
            console.log("mounted anime page");
            const vm = this;
            axios.get('../../getAnimes-api/' + this.fansub.id)
                .then(response => {
                    vm.loadanimes= false;
                    vm.animes = response.data;
                })
                .catch(function () {
                    console.log("error");
                });
            axios.get('../../getLastWorks-api/'+ this.fansub.id)
                .then(response =>{
                    vm.lastworks= response.data;
                })
                .catch(function(){
                    console.log("error");
                });
        }
    }
</script>