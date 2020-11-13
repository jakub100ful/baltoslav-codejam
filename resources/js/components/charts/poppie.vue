

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
                    let total = 0;

                    this.data.forEach(element => {
                        total += parseInt(element.total);
                    });

                    this.data.forEach(element => {
                        element.total =  Math.floor( (element.total/total) * 100);
                    });

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
