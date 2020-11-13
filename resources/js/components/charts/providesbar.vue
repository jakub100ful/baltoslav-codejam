

<script>

   import {Bar} from 'vue-chartjs';



    export default {
        extends: Bar,
        data(){
            return{
                data: null,
                nums : [],
                lables: [],

                options:{
                   tooltips:{
                        
                   }
                }



            }
        },

        methods:{
            getData(){
                    axios.get('/data/concerns').then(rsp=>{
                    console.log(rsp.data);
                    this.data = rsp.data;



                    

                    this.nums  = [
                        this.data.provides["I don't know"],
                        this.data.provides["No"],
                        this.data.provides["Not eligible for coverage / NA"],
                        this.data.provides["Yes"]
                    ]

                    
                    this.lables = [
                        "I don't know",
                        "No",
                        "Not eligible for coverage / NA",
                        "Yes",
                    ]

                    

                    
                    this.renderC();



                })
            },

            renderC(){

                let d = {
                    labels: this.lables,
                    lineTension: 0,
                    borderWidth: 1,
                    borderColor: '#F2A727',
                    pointBackgroundColor: '#F2A727',
                    backgroundColor: 'transparent',
                    datasets:[{
                        data: this.nums,
                        label: "Does your employer provide mental health care benefits",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)'
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
