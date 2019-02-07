<template>
    <div style='text-align: left;font-size:12px' class='my-3' >
        <span style='font-size:15px'>Generes: </span>
        <a v-for="genere in generes" :href="'generes/'+ genere.id">{{genere.name}} </a>
    </div>

</template>
<script>
    export default {
        props:{
            generes:{
                type: Array,
                required: true
            }
        }
    }
</script>