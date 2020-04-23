<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template>
    <div class="my-4">
        <div class="container">
            <div style="">
                <div class="m-4" style="width:215px; display:inline; float:left">
                    <div style="width:215px;height:300px"><img src="https://picsum.photos/215/300"></div>
                    <div class="btn btn-dark mt-2" style="width:100%;background-color: #ff1d5e">Add to list</div>
                </div>
                <div style="display:inline;padding-top: 3rem !important; width:600px">
                    <h3 style="padding-top: 6rem !important">{{anime.name}}</h3>
                    <span v-if="anime.status == 0">Status: Ongoing</span>
                    <span v-else-if="anime.status == 1">Status: Finished</span>
                    <span v-else-if="anime.status == 2">Status: Paused</span>
                    <span v-else>Error</span>
                    <br/>
                    <span>Target: <a v-for="target in anime.targets">{{target.name}}</a></span>

                    <div>
                        <span>Categories: </span>
                        <a href="#" v-for="category in anime.categories" style="margin-right: 5px">
                            {{category.name}}
                        </a>
                    </div>

                    <div>
                        <span>Fansubs: </span>
                        <a :href="'../../fansub/'+ fansub.id" v-for="fansub in anime.fansubs" class="pr-2">
                            {{fansub.name}}
                        </a>
                    </div>
                    <div @click="changeplotdiv">
                        <div name="plotdiv" class="plotdiv" v-bind:style="styl">
                            <p style="text-align:justify;font-size:18px; ">{{anime.plot}}</p>
                        </div>
                        <div v-if="anime.plot.length>590 && styl.control===true"
                             style="font-size:18px; margin-left: 263px; color: #ff1d5e" class="">Read More
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <div class="container my-5 py-4 px-4"
             style="background-color: #1f232d !important; border-radius: 3px">
            <div class="relations">
                <h5>Relations</h5>
                <span v-if="anime.relations.length == 0">No Relations</span>
                <div class="card-deck">
                    <div class="card my-4 animecard" v-for="(relation,index) in anime.relations" :key="index">
                        <a class="displayedimage" :href="'/anime/' + relation.id"
                           :style="'background-image: url(https://picsum.photos/215/300)'">
                            <div style="background-color: rgba(31,35,45,0.7); height: 30%; position:absolute; bottom:0; width:100%; text-align: center">
                                <span style="color:#ff1d5e;font-size: small">{{sequel(relation.sequel)}}</span></div>
                        </a>

                    </div>
                </div>

            </div>
            <div id="slotanime" class="mt-5">
                <h5>Episodes</h5>
                <span v-if="anime.episodes.length == 0">No Episodes</span>
                <div class="card-deck">
                    <div class="card my-4 animecard" v-for="(episode,index) in anime.episodes" :key="index">
                        <a class="displayedimage" :href="'/anime/'+anime.id+'/episode/' + episode.number"
                             :style="'background-image: url(https://picsum.photos/260)'">
                        </a>
                        <h4><span class="badge badge-primary episode-anime">Ep {{episode.number}}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {SelfBuildingSquareSpinner} from 'epic-spinners';
    import {CirclesToRhombusesSpinner} from 'epic-spinners';

    export default {
        props: {
            anime: Object
        },
        data: function () {
            return {
                styl: {
                    height: '169px',
                    overflow: 'hidden',
                    control: true
                }
            }
        },
        methods: {
            changeplotdiv: function () {
                if (this.styl.height === 'auto') this.styl.height = '165px';
                else this.styl.height = 'auto';
                this.styl.control = !this.styl.control;
            },
            sequel: function (sequel) {
                if (sequel == 0) return "Main";
                else if (sequel == 1) return "Sequel";
                else if (sequel == 2) return "Prequel";
                else if (sequel == 3) return "Side";
                else if (sequel == 4) return "Alternative";
                else return "error";
            }
        },
        mounted() {
            console.log("mounted anime page");
            const vm = this;

        }
    }
</script>