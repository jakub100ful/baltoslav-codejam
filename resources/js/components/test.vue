<template>
    <div class="container">
        <div>
            test
            dd
        </div>
    </div>
</template>

<script>
    export default {
        data(){
            return{

            }
        },

        methods:{
            getData(){
                    axios.get('/test/data').then(rsp=>{
                    console.log(rsp.data);

                })
            },

            
        },

        mounted() {
            this.getData();

            console.log('Component mounted.')
        }
    }
</script>
