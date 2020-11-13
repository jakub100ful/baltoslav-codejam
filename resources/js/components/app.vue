<template>
    <div class="container-fluid body-container">
        <div class="container h-100 smooth-scroll" id="section-1">
            <div class="row align-items-center min-vh-100">
                <div class="col col-lg shadow-lg text-light center-block">
                    <h1 class="text-center display-1 title-text">Dear Tech Companies...</h1>
                    <h1 class="text-center subtitle-text">we need to have a discussion about mental health</h1>
                </div>
            </div>
        </div>
        <div class="container h-100" id="section-2">
            <div class="row row-lg-4 justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="card p-5 card-transparent">
                        <h3 class="text-dark subtitle-text">We looked at a survey of 1173 people who were asked about mental health issues in the tech industry</h3>
                    </div>
                </div>
            </div>
            <div class="row row-lg-4 d-flex flex-row justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="card card-transparent">
                        <div class="card-header">
                            <h5>Demographics of the people asked</h5>
                            <button class="btn btn-light" @click="demographics = 'pop'; k+= 1" >Population of the company</button>
                            <button class="btn btn-light" @click="demographics = 'gender'; k+= 1" >Gender</button>
                        </div>
                        <div class="card-body">

                                    <div class="row" v-if="demographics == 'pop'">
                                        <div class="col">
                                            <test :key="k" />
                                        </div>
                                        <div class="col">
                                            <poppie :key="k"/>
                                        </div>
                                    </div>

                                <div class="row" v-if="demographics == 'gender'">
                                    <div class="col">
                                        <genderbar :key="k" />
                                    </div>
                                    <div class="col">
                                        <genderpie :key="k"/>
                                    </div>    
                                </div>

                            
                            
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-lg-10 d-flex flex-row justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="row-center">
                        <div class="card">
                            <div class="card-header align-self-center">
                                <h3>63.2% of people identified themselves to have had, or think they had a mental health illness at some point.</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <illammount/>
                                    </div>
                                    <div class="col">
                                        <illnesstypes/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-lg-10 d-flex flex-row justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="row-center">
                        <div class="card">
                            <div class="card-header align-self-center">
                                <h3>Most people have not had a conversation about their mental health, but people are willing to.</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <havediscussedbar/>
                                    </div>
                                    <div class="col">
                                        <woulddiscussbar/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@200;800&display=swap');

.row-m-t{
  margin-top : 50px
}

.body-container {
    background: url("../../../storage/app/public/Clouds.png");
    background-size: 100%;
    background-repeat: no-repeat;
    background-attachment: fixed;
    scroll-behavior: smooth;
}

.title-text {
    font-family: 'Raleway', sans-serif;
    font-weight: 800;
    text-shadow: 2px 2px black;
}

.subtitle-text {
    font-family: 'Raleway', sans-serif;
    font-weight: 200;
}

.card-transparent {
    background-color: rgba(245, 245, 245, 0.9);
}
</style>

<script>
    import * as d3 from 'd3';
    import card from './card.vue';
    import Navbar from './navbar.vue';
    import Graph from './graph.vue';
    import { ref, onMounted, onUnmounted } from 'vue';
import Woulddiscussbar from './charts/woulddiscussbar.vue';

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
        
        components: { card, Navbar, Graph, Woulddiscussbar },
            data() {
                return{
                    data: {},
                    demographics: 'pop',
                    k: 0,

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