

<script>

   import {HorizontalBar} from 'vue-chartjs';



    export default {
        extends: HorizontalBar,
        data(){
            return{
                data: null,
                nums : [],
                lables: [],

                options:{
                    
                   tooltips:{
                        
                   },
                   legend: {
                        labels: {
                            // This more specific font property overrides the global property
                            fontColor: 'black'
                        }
                    }
                }



            }
        },

        props:{
            styles:{
                "color": "red"
            }
        },

        methods:{
            getData(){
                    axios.get('/data/illtypes').then(rsp=>{
                    console.log(rsp.data);
                    this.data = rsp.data;

                    this.data.forEach(element => {
                        this.nums.push(element.total);
                    });

                    this.data.forEach(element => {
                        this.lables.push(Object.keys(element));
                    });

                    this.lables = [
                        "Anxiety Disorder",
                        "Mood Disorder (Depression)",
                        "Psychotic Disorder (Schizophrenia)",
                        "Eating Disorder (Anorexia Bulimia etc)",
                        "Attention Deficit Disorder",
                        "Obsessive-Compulsive Disorder",
                        "Post-traumatic Stress Disorder",
                        "Stress Response Syndromes",
                        "Dissociative Disorder",
                        "Substance Use Disorder",
                        "Addictive Disorder",
                    
                    ]
                    

                

                    
                    this.renderC();



                })
            },

            renderC(){

                let d = {
                    labels: this.lables,
                    lineTension: 5,
                    borderWidth: 100,
                    borderColor: '#F2A727',
                    pointBackgroundColor: '#F2A727',
                    backgroundColor: 'transparent',
                    datasets:[{
                        data: this.nums,
                        label: "Different types of illness",
                        backgroundColor: [
                            "#5c53c6",
                            "#59dafb",
                            "#510013",
                            "#aa7bff",
                            "#e8597c",
                            "#0054c9",
                            "#ff85ee",
                            "#2a1b4d",
                            "#9da4ff",
                            "#676b9e",
                            "#676b9e"
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)',
                            'rgba(153, 102, 255, 1)',
                            'rgba(255, 159, 64, 1)'
                        ],
                    }]
                }

                console.log('Component render.')
                
                this.renderChart(d,this.options);

            }

            

            
        },

        

        


        mounted() {

            this.getData();

           

            console.log('Component mounted.')
        },
        
    }
</script>
