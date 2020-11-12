<template>
    <div class="container">
        <div class="row justify-content-center">

        </div>
    </div>
</template>

<script>
    import * as d3 from 'd3';

    export default {
        name: "PackChart",
        props: {
            data: Object
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
