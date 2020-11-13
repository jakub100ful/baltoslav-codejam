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
                            <h5>Majority of respondents work at a company size of 100-500 people, but size doesn't matter.</h5>
                            <h6>We also thought it was important to cover gender of the respondents, because of the well-known divide in the tech industry.</h6>
                            <button class="btn btn-light" @click="demographics = 'pop'; k+= 1" >Population of the company</button>
                            <button class="btn btn-light" @click="demographics = 'gender'; k+= 1" >Gender</button>
                        </div>
                        <div class="card-body">

                                <div class="row" v-if="demographics == 'pop'">
                                    <p class="p-3">The different charts show a range of company sizes. We also found that mental health issues are a systemic problem, and therefore there was no correlation between the company size and substance of mental health issues.</p>
                                    <div class="col">
                                        <test :key="k" />
                                    </div>
                                    <div class="col">
                                        <poppie :key="k"/>
                                    </div>
                                </div>

                                <div class="row" v-if="demographics == 'gender'">
                                    <p class="p-3">Majority of respondents were men, although a substantial amount of women and other gender categories participated in the survey.</p>
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
                                <h5>63.2% of people identified themselves to have had, or think they had a mental health illness at some point.</h5>
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

            <div class="row row-lg-4 justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="card card-transparent">
                        <div class="card-header">
                            <h3 class="text-dark subtitle-text">Talking about mental health removes stigma.</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                "By talking about mental illness on a more regular basis, we as a society will hopefully unveil the false notions that plague this topic. When these myths are debunked, it should help remove the stigma surrounding mental health."
                            </p>
                            <a href="https://www.banyanmentalhealth.com/2018/08/01/why-talking-about-mental-health-is-so-important/">- Banyan Mental Health Program</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-lg-4 d-flex flex-row justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="card card-transparent">
                        <div class="card-header">
                                <h5>Most people have not had a conversation about their mental health, but people are willing to!</h5>
                                <button class="btn btn-light" @click="discussions = 'bar'; k+= 1" >Bar Chart</button>
                                <button class="btn btn-light" @click="discussions = 'pie'; k+= 1" >Pie Chart</button>
                        </div>
                        <div class="card-body">
                            <div class="row" v-if="discussions == 'bar'">
                                <div class="col">
                                    <havediscussedbar/>
                                </div>
                                <div class="col">
                                    <woulddiscussbar/>
                                </div>
                            </div>

                            <div class="row" v-if="discussions == 'pie'">
                                <div class="col">
                                    <havediscussedpie/>
                                </div>
                                <div class="col">
                                    <woulddiscusspie/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row row-lg-4 justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="card card-transparent">
                        <div class="card-header">
                            <h3 class="text-dark subtitle-text">About a third of people did not have access to mental health care benefits.</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <p>A quarter of people did not know if their employer provided any mental health support, infering poor indication from the employer.</p>
                                    <providesbar />
                                </div>
                                <div class="col">
                                    <p>A third of people who received mental health benefits from their employer, did not know how to access them.</p>
                                    <knownbar/>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

            <div class="row row-lg-4 justify-content-md-center">
                <div class="col col-lg-10 m-5">
                    <div class="card card-transparent">
                        <div class="card-header">
                            <h3 class="text-dark subtitle-text">Research has shown that people working in the tech industry are 5 times more likely to suffer from a mental health problem (BIMA, 2019).</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                The rapid growth of the sector with many attractive opportunities, 'long-hours' culture, and a predominantly younger less-experienced workforce all add to this.  
                            </p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="container h-100" id="section-3">
            <div class="row row-lg-4 justify-content-md-center mb-500">
                <div class="col col-lg-10 m-5">
                    <div class="card card-transparent">
                        <div class="card-header">
                            <h3 class="text-dark subtitle-text text-center">It all starts with a conversation.</h3>
                        </div>
                        <div class="card-body">
                            <p>
                                Another study produced by the Mental Health Foundation found 38% of people feared losing their job security and future prospects after speaking up about a mental health problem. Further 17% worried their colleagues would judge them for speaking up about these issues.
                            </p>
                            <h3 class="text-center">And let's not forget!</h3>
                            <h5 class="text-center">Addressing wellbeing at work increases productivity by as much as 12%.</h5>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row row-lg-4 justify-content-md-center mb-500">
                <div class="col col-lg-10 m-5">
                    <div class="card card-transparent">
                        <h5 class="text-dark subtitle-text text-center m-5">Let's start talking about our mental health, so that we can all feel better and produce better work together.</h5>
                    </div>
                </div>
            </div>
            <div class="row align-items-center min-vh-100">
                <div class="col col-lg text-light center-block">
                    <h1 class="text-center display-1 title-text"><a href="https://www.youtube.com/watch?v=oHg5SJYRHA0" style="text-decoration: none;">Thank You:)</a></h1>
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
import Knownbar from './charts/knownbar.vue';

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
        
        components: { card, Navbar, Graph, Woulddiscussbar, Knownbar },
            data() {
                return{
                    data: {},
                    demographics: 'pop',
                    discussions: 'bar',
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