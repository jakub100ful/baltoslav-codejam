

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
                    axios.get('/data/ever').then(rsp=>{
                    console.log(rsp.data);
                    this.data = rsp.data;



                    var total = this.data.WouldDisscuss["Yes"]+this.data.WouldDisscuss["No"]+this.data.WouldDisscuss["Maybe"] 

                    this.nums  = [
                        Math.round((this.data.WouldDisscuss["Yes"]/total)*100),
                        Math.round((this.data.WouldDisscuss["No"]/total)*100),
                        Math.round((this.data.WouldDisscuss["Maybe"]/total)*100)
                    ]

                    

                    
                    this.lables = [
                        "Yes",
                        "No",
                        "Maybe"
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
                        label: "Has discussed mental health with employer",
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(255, 206, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(255, 159, 64, 0.2)'
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
