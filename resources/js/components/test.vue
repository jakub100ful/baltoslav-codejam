

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

                    this.nums = [
                        this.data[0].total,
                        this.data[1].total,
                        this.data[3].total,
                        this.data[5].total,
                        this.data[2].total,
                        this.data[4].total,
                        this.data[6].total,
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
                        label: "Size of company the person works at",
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
