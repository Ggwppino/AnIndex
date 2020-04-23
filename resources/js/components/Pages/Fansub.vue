<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template>
    <div class="my-4">
        <div class="container" style="height: 400px">
            <div class="m-4" style="width:215px; display:inline; float:left">
                <div style="width:215px;height:300px; background-color: #ff1d5e">
                    <img src="https://picsum.photos/215/300">
                </div>
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

            <div class="relations">
                <h5>Fansubber</h5>
                <span v-if="!fansub.fansubbers">No Fansubber</span>
                <div class="card-deck">
                    <div class="card my-4 animecard" v-for="(fansubber,index) in fansub.fansubbers" :key="index">
                        <a class="displayedimage" :href="'/user/' + fansubber.user_id"
                           :style="'background-image: url(https://picsum.photos/215/300)'">
                            <div style="background-color: rgba(31,35,45,0.7); height: 30%; position:absolute; bottom:0; width:100%; text-align: center">
                                <div style="color:#ff1d5e; font-size: small;overflow:hidden; white-space: nowrap;  text-overflow: ellipsis; ">
                                    {{fansubber.user.name}}
                                </div>
                            </div>
                        </a>

                    </div>
                </div>

            </div>


            <div id="slotanime" class="">
                <div v-if="fansub.episodes" class="mb-5">
                    <h5>Recent works</h5>
                    <div class="card-deck">
                        <div class="card my-4 animecard" v-for="(episode,indexx) in fansub.episodes" :key="indexx">
                            <a class="displayedimage" :href="'/anime/' + episode.anime_id + '/episode/' + episode.number"
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
                            </a>
                            <a class="title-anime" :href="'/anime/'+ episode.anime_id">{{episode.name}}</a>
                            <h4><span class="badge badge-primary episode-anime">Ep {{episode.number}}</span></h4>
                            <anime-info id="toolplotepisode" :anime_id="episode.anime_id" ref="childepisode"/>

                        </div>
                    </div>

                </div>
                <h5>Animes</h5>
                <span v-if="fansub.animes.length == 0">No Animes</span>
                <div class="card-deck">
                    <div class="card my-4 animecard" v-for="(anime,index) in fansub.animes" :key="index">
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
    export default {
        props: {
            fansub: Object
        },
        data: function () {
            return {
                loadanimes: true
            }
        },
        mounted() {
            console.log("mounted anime page");
        }
    }
</script>