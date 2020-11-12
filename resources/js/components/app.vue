<template>
    <div class="container">
        <div>
            <navbar/>
        </div>
        <div class="row p-3">
            <card class="col-sm" headerText="Mental Health in Tech" bodyContent="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquet ultrices malesuada. Aliquam aliquam, lacus at elementum tristique, dui erat posuere leo, at molestie ante ex et ante. Ut fermentum, odio ut feugiat consequat, felis ligula cursus neque, ac porta mi risus nec sem. Pellentesque cursus tempor justo. Proin porta interdum metus vitae molestie. Aenean euismod molestie est in faucibus. Aliquam id neque consequat, elementum orci vitae, volutpat sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque at tincidunt dolor, ac auctor massa. Integer quis lectus tempor, feugiat neque non, cursus nulla. Aliquam tincidunt faucibus lorem, eget sagittis turpis luctus non. Proin in fermentum mi. Nulla facilisi. Vestibulum vitae arcu augue. Proin magna tellus, commodo eget vulputate commodo, tempor eu orci."/>
            <card class="col-sm" headerText="Mental Health" bodyContent="Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent aliquet ultrices malesuada. Aliquam aliquam, lacus at elementum tristique, dui erat posuere leo, at molestie ante ex et ante. Ut fermentum, odio ut feugiat consequat, felis ligula cursus neque, ac porta mi risus nec sem. Pellentesque cursus tempor justo. Proin porta interdum metus vitae molestie. Aenean euismod molestie est in faucibus. Aliquam id neque consequat, elementum orci vitae, volutpat sapien. Interdum et malesuada fames ac ante ipsum primis in faucibus. Pellentesque at tincidunt dolor, ac auctor massa. Integer quis lectus tempor, feugiat neque non, cursus nulla. Aliquam tincidunt faucibus lorem, eget sagittis turpis luctus non. Proin in fermentum mi. Nulla facilisi. Vestibulum vitae arcu augue. Proin magna tellus, commodo eget vulputate commodo, tempor eu orci."/>
            <div class="col-sm">
                <graph :data="data"/>
            </div>
        </div>
    </div>
</template>

<script>
    import * as d3 from 'd3';
    import card from './card.vue';
    import Navbar from './navbar.vue';
import Graph from './graph.vue';

    export default {
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
    }
</script>