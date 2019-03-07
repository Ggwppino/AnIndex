<template>
    <div class='toolt' :style="{'width': '350px'}"><h5 class='titletool'>{{info.name}}</h5>
        <h6 style='text-align: left'>Plot: </h6>
        <p class='plotool'>{{info.plot}}</p>
        <div id="generevue">
            <generate-genere :generes="info.generes"></generate-genere>
        </div>
        <a class='btn btn-outline-info my-3' :href=' "anime/" + info.id_anime'><i class='fas fa-share'></i>Anime</a>
    </div>
</template>

<script>
    export default {
        props:{
            info:{
                type: Object,
                required: true
            }
        }

    }

</script>

