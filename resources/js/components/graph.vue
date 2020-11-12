<template>
    <div class="container">
        <div class="row justify-content-center">
            <h1>Circle Pack in D3</h1>
            <h2>{{ msg }}</h2>

            <svg
                :height='height'
                :width='width'
            >
        </div>
    </div>
</template>

<script>
    import * as d3 from 'd3';

    export default {
        name: "PackChart",
        props: {
            data: Object
        },
        watch: {
            data: function(newData) {
                this.drawChart(newData);
            }
        },
        methods: {
            drawChart: function(data) {
            let arcs = d3.pie()
                .sort(null)
                .value(function(d) { return d.value; })
                (data)
            let block = this.pieG.selectAll(".arc")
                .data(arcs)
            block.select('path').attr('d', this.arc)
            let newBlock = block
                .enter()
                .append("g")
                .classed("arc", true)
            newBlock.append("path")
                .attr("d", this.arc)
                .attr("id", function(d, i) { return "arc-" + i })
                .attr("stroke", "gray")
                .attr("fill", d => d3.interpolateCool(Math.random()))
            newBlock.append("text")
                .attr("dx", 10)
                .attr("dy", -5)
                .append("textPath")
                .attr("xlink:href", function(d, i) { return "#arc-" + i; })
                .text(function(d) { return d.data.name })
            }
        },
        data() {
            return {
                msg: "Chart Component",
                height: 600,
                width: 600
            };
        },
        created() {
            this.colourScale = d3
                .scaleOrdinal()
                .range(["#5EAFC6", "#FE9922", "#93C464", "#75739F"]);
        },
        mounted() {
            let svg = d3.select(this.$el);
            let width = +svg.attr('width');
            let height = +svg.attr('height');
            let margin = { top:20, left:0, bottom:30, right:0 };
            let chartWidth = width - (margin.left + margin.right);
            let chartHeight = height - (margin.top + margin.bottom);
            this.chartLayer = svg
            .append('g')
            .attr(
                "transform",
                `translate(${margin.left}, ${margin.top})`
            );
            this.arc = d3.arc()
            .outerRadius(chartHeight / 2)
            .innerRadius(chartHeight / 4)
            .padAngle(0.03)
            .cornerRadius(8)
            this.pieG = this.chartLayer
            .append("g")
            .attr(
                "transform",
                `translate(${chartWidth / 2}, ${chartHeight / 2})`
            )
            this.drawChart(this.data);
        }
    }
</script>
