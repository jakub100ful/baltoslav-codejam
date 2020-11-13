<template>
    <div class="container-fluid">
        <div class="row row-lg-4 align-items-center h-100">
            <div class="col col-lg">
                <h1 class="text-center display-1">Dear Tech Companies...</h1>
                <h1 class="text-center">We need to have a discussion about mental health.</h1>
            </div>
        </div>
        <div class="row row-lg-4 justify-content-md-center">
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>67% of people identified themselves to have had a mental health illness at some point</h5>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg-4 d-flex flex-row justify-content-md-center">
            <div class="col col-lg-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Company Populations</h5>
                    </div>
                    <div class="card-body">
                        <test />
                    </div>
                </div>
            </div>
        </div>
        <div class="row row-lg-4 d-flex flex-row justify-content-md-center">
            <div class="col col-lg-6">
                <div class="row-center">
                    <div class="card">
                        <div class="card-header align-self-center">
                            <h3>67% of people identified themselves to have had a mental health illness at some point</h3>
                        </div>
                        <div class="card-body">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.row-m-t{
  margin-top : 50px
}
</style>

<script>
    import * as d3 from 'd3';
    import card from './card.vue';
    import Navbar from './navbar.vue';
    import Graph from './graph.vue';
    import { ref, onMounted, onUnmounted } from 'vue';

    export default {
        setup() {
            const foreground = ref(null);
            const background = ref(null)

            return {
                foreground,
                background
            }

            onMounted(() => {
                document.addEventListener('scroll', handleScroll)
            })

            onUnmounted(() => {
                document.removeEventListener('scroll', handleScroll)
            })

            const handleScroll = (evt) => {

                const scrollY = window.scrollY
                const maxBackgroundSize = 120;
                const backgroundSize = ((scrollY) / (maxBackgroundSize - 100)) // increases as user scrolls

                // zoom the background at a slower rate
                background.value.style.transform = 'scale(' + (100 + backgroundSize * .4) / 100 + ')'
                foreground.value.style.transform = 'scale(' + (100 + backgroundSize) / 100 + ')' 
            }
        },
        
        components: { card, Navbar, Graph },
            data() {
                return{
                    data: {},
                }
            },

            mounted() {
                console.log('Component mounted.');
                this.getData();
            },

            methods:{
                getData(){
                        axios.get('/data/pop').then(rsp=>{
                        this.data = rsp.data;
                        
                    })
                },

                
            },
            computed: {
                myStyles () {
                    return {height: '99px'}
                }
            }
            
        }
</script>