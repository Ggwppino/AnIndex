<template>
    <div class="container" id="slotanime">
        <div class="naviAnimeContainer">
            <h2 class="my-3">RECENT ANIME</h2>
            <nav aria-label="Page navigation example" id="navAnime">
                <ul class="pagination pagination-lg justify-content-center">
                    <li class="page-item">
                        <button class="page-link btn-secondary" aria-label="Previous" :disabled="pageNumber === 0"
                                @click="prevPage">
                            <span style="font-size: 20px">&laquo;</span>
                        </button>
                    </li>
                    <li class="page-item">
                        <button class="page-link btn-secondary" aria-label="Next" :disabled="pageNumber >= pageCount -1"
                                @click="nextPage">
                            <span style="font-size: 20px">&raquo;</span>
                        </button>
                    </li>
                </ul>
            </nav>
        </div>


        <div class="card-deck">
            <div class="card my-4 animecard" v-for="(episode,index) in paginatedData" :key="index">
                <div class="displayedimage"
                     :style="'background-image: url(https://picsum.photos/id/' + episode.anime_id + ')'"
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
                <a class="title-anime" :href="'anim/'+ episode.anime_id">{{episode.name}}</a>
                <h4><span class="badge badge-primary episode-anime">Ep {{episode.number}}</span></h4>
                <tooltip-anime id="toolplot" :anime_id="episode.anime_id" ref="child"/>

            </div>
        </div>


    </div>

</template>

<script>
    export default {
        data: function data() {
            return {
                pageNumber: 0
            }
        },
        props: {
            listData: {
                type: Array,
                required: true
            },
            size: {
                type: Number,
                required: false,
                default: 12
            }
        },
        methods: {
            nextPage: function nextPage() {
                this.pageNumber++;
            },
            prevPage: function prevPage() {
                this.pageNumber--;
            }
        },
        computed: {
            pageCount: function pageCount() {
                var l = this.listData.length,
                    s = this.size;
                return Math.floor(l / s);
            },
            paginatedData: function paginatedData() {
                var start = this.pageNumber * this.size,
                    end = start + this.size;
                return this.listData.slice(start, end);
            }
        }
    }
</script>