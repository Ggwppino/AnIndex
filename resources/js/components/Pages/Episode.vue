
<!--
  -
  - Copyright (c) 2020 Ggwppino.
  -->

<template>
    <div class="my-4">
        <div class="container my-5 py-4 px-4"
             style="background-color: #1f232d !important; border-radius: 3px">
            <div id="slotanime" class="mt-5">
                <h5>Episode $</h5>
                <div v-if="loadepisodes">
                    <self-building-square-spinner
                            :animation-duration="6000"
                            :size="40"
                            color="#ff1d5e"
                    />
                </div>
                <span v-else-if="episodes.length == 0">No Episodes</span>
                <div class="card-deck">
                    <div class="card my-4 animecard" v-for="(episode,index) in episodes" :key="index">
                        <div class="displayedimage"
                             :style="'background-image: url(https://picsum.photos/260)'">
                        </div>
                        <h4><span class="badge badge-primary episode-anime">Ep {{episode.number}}</span></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
