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
                    <span>Target: <a v-for="target in targets">{{target.name}}</a></span>

                    <div>
                        <span>Categories: </span>
                        <a href="#" v-for="category in categories" style="margin-right: 5px">{{category.name}}</a>
                    </div>

                    <div>
                        <span>Fansubs: </span>
                        <a :href="'../../fansub/'+ fansub.id" v-for="fansub in fansubs" class="pr-2">{{fansub.name}}</a>
                    </div>
                    <div @click="changeplotdiv">
                        <div name="plotdiv" class="plotdiv" v-bind:style="styl" >
                            <p style="text-align:justify;font-size:18px; ">{{anime.plot}}</p>
                        </div>
                        <div v-if="anime.plot.length>590 && styl.control===true" style="font-size:18px; margin-left: 263px; color: #ff1d5e" class="">Read More</div>
                    </div>

                </div>

            </div>
        </div>

        <div class="container my-5 py-4 px-4"
             style="background-color: #1f232d !important; border-radius: 3px">
            <div class="relations">
                <h5>Relations</h5>
                <div v-if="loadrelations">
                    <circles-to-rhombuses-spinner
                            :animation-duration="1200"
                            :circles-num="3"
                            :circle-size="15"
                            color="#ff1d5e"
                    />
                </div>
                <span v-else-if="relations.length == 0">No Relations</span>
                <div class="card-deck">
                    <div class="card my-4 animecard" v-for="(relation,index) in relations" :key="index">
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
