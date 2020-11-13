

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
                per: 0,



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
                    axios.get('/data/pop').then(rsp=>{
                    console.log(rsp.data);
                    this.data = rsp.data;

                    this.data.forEach(element => {
                        this.nums.push(element.total);
                    });

                    this.data.forEach(element => {
                        this.lables.push(element.employeeCount);
                    });

                    this.lables = [
                        "Self Employed", 
                        "1-5",
                        "6-25",
                        "26-100",
                        "100-500",
                        "500-1000",
                        "more than 1000",
                    ];
                    

                    this.data.forEach(element => {
                        this.total += parseInt(element.total);
                    });

                    var newdata = [];

                    this.data.forEach(element => {
                    
                        newdata.push(Math.round( (element.total/this.total) * 100));
                        this.per += Math.floor( (element.total/this.total) * 100);
                    });

                    this.nums = [
                        newdata[0],
                        newdata[1],
                        newdata[3],
                        newdata[5],
                        newdata[2],
                        newdata[4],
                        newdata[6],
                    ];

                   
                    

                

                    
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
                            'rgba(255, 99, 132, 0.8)',
                            'rgba(54, 162, 235, 0.8)',
                            'rgba(255, 206, 86, 0.8)',
                            'rgba(75, 192, 192, 0.8)',
                            'rgba(153, 102, 255, 0.8)',
                            'rgba(255, 159, 64, 0.8)',
                            'rgba(242, 140, 70, 0.8)'
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
