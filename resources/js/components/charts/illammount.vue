

<script>

   import {Pie} from 'vue-chartjs';



    export default {
        extends: Pie,
        data(){
            return{
                data: null,
                nums : [],
                lables: [],
                total: 0,

                options:{
                    cutoutPercentage: 50,
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
                    axios.get('/data/ill').then(rsp=>{
                    console.log(rsp.data);
                    this.data = rsp.data;

                    
                    this.data.forEach(element => {
                        this.nums.push(element.total);
                        this.total += parseInt(element.total);
                    });
                     var newnum = [];

                    this.data.forEach(element => {
                        console.log(element.total);
                        newnum.push((parseInt(element.total) / this.total) * 100);
                    });

                   


                    this.data.forEach(element => {
                        this.lables.push(element.currentlyHasMentalHealthDisorder);
                    });

                    this.nums = newnum;

                    

                

                    
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
