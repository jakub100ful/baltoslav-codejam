

<script>

   import {Pie} from 'vue-chartjs';



    export default {
        extends: Pie,
        data(){
            return{
                data: null,
                nums : [],
                lables: [],

                options:{
                    cutoutPercentage: 50,
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



                    var total = this.data.knowCare["No"] + this.data.knowCare["Yes"];

                    this.nums  = [
                       
                        Math.round((this.data.knowCare["No"]/total)*100),
                        
                        Math.round((this.data.knowCare["Yes"]/total)*100),
                    ]

                    
                    this.lables = [
                      
                        "No",
                     
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
