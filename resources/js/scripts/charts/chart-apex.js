/*=========================================================================================
    File Name: chart-apex.js
    Description: Apexchart Examples
    ----------------------------------------------------------------------------------------
    Item Name: Vuexy  - Vuejs, HTML & Laravel Admin Dashboard Template
    Author: PIXINVENT
    Author URL: http://www.themeforest.net/user/pixinvent
==========================================================================================*/

$(function () {
    'use strict';

    var $primary_light = '#A9A2F6';
    var flatPicker = $('.flat-picker'),
        isRtl = $('html').attr('data-textdirection') === 'rtl',
        chartColors = {
            column: {
                series1: '#826af9',
                series2: '#d2b0ff',
                bg: '#f8d3ff'
            },
            success: {
                shade_100: '#7eefc7',
                shade_200: '#06774f'
            },
            donut: {
                series1: '#ffe700',
                series2: '#00d4bd',
                series3: '#826bf8',
                series4: '#2b9bf4',
                series5: '#FFA1A1'
            },
            area: {
                series3: '#ccc',
                series2: '#7eefc7',
                series1: '#FFA1A1'
            }
        };

    // heat chart data generator
    function generateDataHeat(count, yrange) {
        var i = 0;
        var series = [];
        while (i < count) {
            var x = 'w' + (i + 1).toString();
            var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

            series.push({
                x: x,
                y: y
            });
            i++;
        }
        return series;
    }

    // Init flatpicker
    if (flatPicker.length) {
        var date = new Date();
        flatPicker.each(function () {
            $(this).flatpickr({
                mode: 'range',
                defaultDate: ['2019-05-01', '2019-05-10']
            });
        });
    }

    // Area Chart
    // --------------------------------------------------------------------
    var areaChartEl = document.querySelector('#line-area-chart'),
        areaChartConfig = {
            chart: {
                height: 300,
                type: 'area',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: false,
                curve: 'straight'
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            colors: [chartColors.area.series3, chartColors.area.series2, chartColors.area.series1],
            series: [
                {
                    name: 'Kopējais skaits',
                    data: [100, 120, 90, 170, 130, 160, 140, 240, 220, 180, 270, 280, 375]
                },
                {
                    name: 'Strādājošo skaits',
                    data: [60, 80, 70, 110, 80, 100, 90, 180, 160, 140, 200, 220, 275]
                },
                {
                    name: 'Nedarbojošo skaits',
                    data: [2, 4, 10, 15, 5, 30, 35, 50, 51, 60, 30, 46, 60]
                }
            ],
            xaxis: {
                categories: [
                    '7/12',
                    '8/12',
                    '9/12',
                    '10/12',
                    '11/12',
                    '12/12',
                    '13/12',
                    '14/12',
                    '15/12',
                    '16/12',
                    '17/12',
                    '18/12',
                    '19/12',
                    '20/12'
                ]
            },
            fill: {
                opacity: 1,
                type: 'solid'
            },
            tooltip: {
                shared: false
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof areaChartEl !== undefined && areaChartEl !== null) {
        var areaChart = new ApexCharts(areaChartEl, areaChartConfig);
        areaChart.render();
    }

    //DASHBOARD AREA CHART
    var dashboardAreaChartEl = document.querySelector('#line-area-chart-dashbord'),

        areaChartConfig = {
            chart: {
                height: 300,
                type: 'area',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                curve: 'straight'
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            colors: [chartColors.area.series3, chartColors.area.series2, chartColors.area.series1],
            series: [
                {
                    name: 'Ražotā jauda',
                    data: [0, 0, 0, 0, 0, 25, 75, 125, 200, 250, 300, 350, 300, 250, 200, 125, 75, 25, 0, 0, 0, 0, 0, 0]
                    // data: JSON.parse(dashboardAreaChartEl.getAttribute('data-series-1')) || [0,0,0,0, 0, 25, 75, 125, 200,250,300, 350, 300, 250, 200, 125,75,25,0,0,0,0,0,0]
                },
                {
                    name: 'Padeve tīklam',
                    data: [0, 0, 0, 0, 0, 25, 75, 125, 200, 250, 300, 350, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0]
                    // data: JSON.parse(dashboardAreaChartEl.getAttribute('data-series-2')) || [0,0,0,0, 0, 25, 75, 125, 200,250,300, 350, 0, 0, 0, 0,0,0,0,0,0,0,0,0]
                },
                {
                    name: 'Bateriju uzlāde',
                    data: [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 350, 300, 250, 200, 125, 75, 25, 0, 0, 0, 0, 0, 0]
                    // data: JSON.parse(dashboardAreaChartEl.getAttribute('data-series-3')) || [0,0,0,0, 0, 0, 0, 0, 0,0,0, 350, 300, 250, 200, 125,75,25,0,0,0,0,0,0]
                }
            ],
            xaxis: {
                categories: [
                    '01:00',
                    '02:00',
                    '03:00',
                    '04:00',
                    '05:00',
                    '06:00',
                    '07:00',
                    '08:00',
                    '09:00',
                    '10:00',
                    '11:00',
                    '12:00',
                    '13:00',
                    '14:00',
                    '15:00',
                    '16:00',
                    '17:00',
                    '18:00',
                    '19:00',
                    '20:00',
                    '21:00',
                    '22:00',
                    '23:00',
                    '00:00'
                ]
            },
            fill: {
                opacity: 0,
                type: 'solid'
            },
            tooltip: {
                shared: false
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof dashboardAreaChartEl !== undefined && dashboardAreaChartEl !== null) {
        var areaChart = new ApexCharts(dashboardAreaChartEl, areaChartConfig);
        areaChart.render();
    }

    // Column Chart
    // --------------------------------------------------------------------
    var columnChartEl = document.querySelector('#column-chart'),
        columnChartConfig = {
            chart: {
                height: 400,
                type: 'bar',
                stacked: true,
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '15%',
                    colors: {
                        backgroundBarColors: [
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg
                        ],
                        backgroundBarRadius: 10
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            colors: [chartColors.column.series1, chartColors.column.series2],
            stroke: {
                show: true,
                colors: ['transparent']
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            series: [
                {
                    name: 'Apple',
                    data: [90, 120, 55, 100, 80, 125, 175, 70, 88, 180]
                },
                {
                    name: 'Samsung',
                    data: [85, 100, 30, 40, 95, 90, 30, 110, 62, 20]
                }
            ],
            xaxis: {
                categories: ['7/12', '8/12', '9/12', '10/12', '11/12', '12/12', '13/12', '14/12', '15/12', '16/12']
            },
            fill: {
                opacity: 1
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof columnChartEl !== undefined && columnChartEl !== null) {
        var columnChart = new ApexCharts(columnChartEl, columnChartConfig);
        columnChart.render();
    }
    // Dashboard Column Chart
    // --------------------------------------------------------------------
    var dashboardColumnChartEl = document.querySelector('#dashboard-column-chart'),
        columnChartConfig = {
            chart: {
                height: 400,
                type: 'bar',
                stacked: true,
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '30%',
                    colors: {
                        backgroundBarColors: [
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg,
                            chartColors.column.bg
                        ],
                        backgroundBarRadius: 10
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            colors: [chartColors.column.series1, chartColors.column.series2],
            stroke: {
                show: true,
                colors: ['transparent']
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            series: [
                {
                    name: 'Ražotā jauda',
                    data: [90, 140, 250]
                    // data: JSON.parse(dashboardAreaChartEl.getAttribute('data-generated-series')) || [90, 140, 250]
                },
                {
                    name: 'Padeve tīklam',
                    data: [85, 100, 195]
                    // data: JSON.parse(dashboardAreaChartEl.getAttribute('data-consumption-series')) || [85, 100, 195 ]
                }
            ],
            xaxis: {
                categories: ['6/2022', '7/2022', '8/2022']
            },
            fill: {
                opacity: 1
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof dashboardColumnChartEl !== undefined && dashboardColumnChartEl !== null) {
        var columnChart = new ApexCharts(dashboardColumnChartEl, columnChartConfig);
        columnChart.render();
    }

    // Scatter Chart
    // --------------------------------------------------------------------
    var scatterChartEl = document.querySelector('#scatter-chart'),
        scatterChartConfig = {
            chart: {
                height: 400,
                type: 'scatter',
                zoom: {
                    enabled: true,
                    type: 'xy'
                },
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                }
            },
            legend: {
                show: true,
                position: 'top',
                horizontalAlign: 'start'
            },
            colors: [window.colors.solid.warning, window.colors.solid.primary, window.colors.solid.success],
            series: [
                {
                    name: 'Angular',
                    data: [
                        [5.4, 170],
                        [5.4, 100],
                        [6.3, 170],
                        [5.7, 140],
                        [5.9, 130],
                        [7.0, 150],
                        [8.0, 120],
                        [9.0, 170],
                        [10.0, 190],
                        [11.0, 220],
                        [12.0, 170],
                        [13.0, 230]
                    ]
                },
                {
                    name: 'Vue',
                    data: [
                        [14.0, 220],
                        [15.0, 280],
                        [16.0, 230],
                        [18.0, 320],
                        [17.5, 280],
                        [19.0, 250],
                        [20.0, 350],
                        [20.5, 320],
                        [20.0, 320],
                        [19.0, 280],
                        [17.0, 280],
                        [22.0, 300],
                        [18.0, 120]
                    ]
                },
                {
                    name: 'React',
                    data: [
                        [14.0, 290],
                        [13.0, 190],
                        [20.0, 220],
                        [21.0, 350],
                        [21.5, 290],
                        [22.0, 220],
                        [23.0, 140],
                        [19.0, 400],
                        [20.0, 200],
                        [22.0, 90],
                        [20.0, 120]
                    ]
                }
            ],
            xaxis: {
                tickAmount: 10,
                labels: {
                    formatter: function (val) {
                        return parseFloat(val).toFixed(1);
                    }
                }
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof scatterChartEl !== undefined && scatterChartEl !== null) {
        var scatterChart = new ApexCharts(scatterChartEl, scatterChartConfig);
        scatterChart.render();
    }

    // Line Chart
    // --------------------------------------------------------------------
    var lineChartEl = document.querySelector('#line-chart'),
        lineChartConfig = {
            chart: {
                height: 400,
                type: 'line',
                zoom: {
                    enabled: false
                },
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    data: [280, 200, 220, 180, 270, 250, 70, 90, 200, 150, 160, 100, 150, 100, 50]
                }
            ],
            markers: {
                strokeWidth: 7,
                strokeOpacity: 1,
                strokeColors: [window.colors.solid.white],
                colors: [window.colors.solid.warning]
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                curve: 'straight'
            },
            colors: [window.colors.solid.warning],
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                padding: {
                    top: -20
                }
            },
            tooltip: {
                custom: function (data) {
                    return (
                        '<div class="px-1 py-50">' +
                        '<span>' +
                        data.series[data.seriesIndex][data.dataPointIndex] +
                        '%</span>' +
                        '</div>'
                    );
                }
            },
            xaxis: {
                categories: [
                    '7/12',
                    '8/12',
                    '9/12',
                    '10/12',
                    '11/12',
                    '12/12',
                    '13/12',
                    '14/12',
                    '15/12',
                    '16/12',
                    '17/12',
                    '18/12',
                    '19/12',
                    '20/12',
                    '21/12'
                ]
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof lineChartEl !== undefined && lineChartEl !== null) {
        var lineChart = new ApexCharts(lineChartEl, lineChartConfig);
        lineChart.render();
    }

    // Bar Chart
    // --------------------------------------------------------------------
    var barChartEl = document.querySelector('#bar-chart'),
        barChartConfig = {
            chart: {
                height: 400,
                type: 'bar',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '30%',
                    endingShape: 'rounded'
                }
            },
            grid: {
                xaxis: {
                    lines: {
                        show: false
                    }
                },
                padding: {
                    top: -15,
                    bottom: -10
                }
            },
            colors: window.colors.solid.info,
            dataLabels: {
                enabled: false
            },
            series: [
                {
                    data: [700, 350, 480, 600, 210, 550, 150]
                }
            ],
            xaxis: {
                categories: ['MON, 11', 'THU, 14', 'FRI, 15', 'MON, 18', 'WED, 20', 'FRI, 21', 'MON, 23']
            },
            yaxis: {
                opposite: isRtl
            }
        };
    if (typeof barChartEl !== undefined && barChartEl !== null) {
        var barChart = new ApexCharts(barChartEl, barChartConfig);
        barChart.render();
    }

    // Candlestick Chart
    // --------------------------------------------------------------------
    var candlestickEl = document.querySelector('#candlestick-chart'),
        candlestickChartConfig = {
            chart: {
                height: 400,
                type: 'candlestick',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            series: [
                {
                    data: [
                        {
                            x: new Date(1538778600000),
                            y: [150, 170, 50, 100]
                        },
                        {
                            x: new Date(1538780400000),
                            y: [200, 400, 170, 330]
                        },
                        {
                            x: new Date(1538782200000),
                            y: [330, 340, 250, 280]
                        },
                        {
                            x: new Date(1538784000000),
                            y: [300, 330, 200, 320]
                        },
                        {
                            x: new Date(1538785800000),
                            y: [320, 450, 280, 350]
                        },
                        {
                            x: new Date(1538787600000),
                            y: [300, 350, 80, 250]
                        },
                        {
                            x: new Date(1538789400000),
                            y: [200, 330, 170, 300]
                        },
                        {
                            x: new Date(1538791200000),
                            y: [200, 220, 70, 130]
                        },
                        {
                            x: new Date(1538793000000),
                            y: [220, 270, 180, 250]
                        },
                        {
                            x: new Date(1538794800000),
                            y: [200, 250, 80, 100]
                        },
                        {
                            x: new Date(1538796600000),
                            y: [150, 170, 50, 120]
                        },
                        {
                            x: new Date(1538798400000),
                            y: [110, 450, 10, 420]
                        },
                        {
                            x: new Date(1538800200000),
                            y: [400, 480, 300, 320]
                        },
                        {
                            x: new Date(1538802000000),
                            y: [380, 480, 350, 450]
                        }
                    ]
                }
            ],
            xaxis: {
                type: 'datetime'
            },
            yaxis: {
                tooltip: {
                    enabled: true
                },
                opposite: isRtl
            },
            grid: {
                xaxis: {
                    lines: {
                        show: true
                    }
                },
                padding: {
                    top: -23
                }
            },
            plotOptions: {
                candlestick: {
                    colors: {
                        upward: window.colors.solid.success,
                        downward: window.colors.solid.danger
                    }
                },
                bar: {
                    columnWidth: '40%'
                }
            }
        };
    if (typeof candlestickEl !== undefined && candlestickEl !== null) {
        var candlestickChart = new ApexCharts(candlestickEl, candlestickChartConfig);
        candlestickChart.render();
    }

    // Heat map chart
    // --------------------------------------------------------------------
    var heatmapEl = document.querySelector('#heatmap-chart'),
        heatmapChartConfig = {
            chart: {
                height: 350,
                type: 'heatmap',
                parentHeightOffset: 0,
                toolbar: {
                    show: false
                }
            },
            plotOptions: {
                heatmap: {
                    enableShades: false,

                    colorScale: {
                        ranges: [
                            {
                                from: 0,
                                to: 10,
                                name: '0-10',
                                color: '#b9b3f8'
                            },
                            {
                                from: 11,
                                to: 20,
                                name: '10-20',
                                color: '#aba4f6'
                            },
                            {
                                from: 21,
                                to: 30,
                                name: '20-30',
                                color: '#9d95f5'
                            },
                            {
                                from: 31,
                                to: 40,
                                name: '30-40',
                                color: '#8f85f3'
                            },
                            {
                                from: 41,
                                to: 50,
                                name: '40-50',
                                color: '#8176f2'
                            },
                            {
                                from: 51,
                                to: 60,
                                name: '50-60',
                                color: '#7367f0'
                            }
                        ]
                    }
                }
            },
            dataLabels: {
                enabled: false
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            grid: {
                padding: {
                    top: -25
                }
            },
            series: [
                {
                    name: 'SUN',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'MON',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'TUE',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'WED',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'THU',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'FRI',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                },
                {
                    name: 'SAT',
                    data: generateDataHeat(24, {
                        min: 0,
                        max: 60
                    })
                }
            ],
            xaxis: {
                labels: {
                    show: false
                },
                axisBorder: {
                    show: false
                },
                axisTicks: {
                    show: false
                }
            }
        };
    if (typeof heatmapEl !== undefined && heatmapEl !== null) {
        var heatmapChart = new ApexCharts(heatmapEl, heatmapChartConfig);
        heatmapChart.render();
    }

    // Radialbar Chart
    // --------------------------------------------------------------------
    var radialBarChartEl = document.querySelector('#radialbar-chart'),
        radialBarChartConfig = {
            chart: {
                height: 350,
                type: 'radialBar'
            },
            colors: [chartColors.donut.series1, chartColors.donut.series2, chartColors.donut.series4],
            plotOptions: {
                radialBar: {
                    size: 185,
                    hollow: {
                        size: '25%'
                    },
                    track: {
                        margin: 15
                    },
                    dataLabels: {
                        name: {
                            fontSize: '2rem',
                            fontFamily: 'Montserrat'
                        },
                        value: {
                            fontSize: '1rem',
                            fontFamily: 'Montserrat'
                        },
                        total: {
                            show: true,
                            fontSize: '1rem',
                            label: 'Comments',
                            formatter: function (w) {
                                return '80%';
                            }
                        }
                    }
                }
            },
            grid: {
                padding: {
                    top: -35,
                    bottom: -30
                }
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            stroke: {
                lineCap: 'round'
            },
            series: [80, 50, 35],
            labels: ['Comments', 'Replies', 'Shares']
        };
    if (typeof radialBarChartEl !== undefined && radialBarChartEl !== null) {
        var radialChart = new ApexCharts(radialBarChartEl, radialBarChartConfig);
        radialChart.render();
    }

    // Radar Chart
    // --------------------------------------------------------------------
    var radarChartEl = document.querySelector('#radar-chart'),
        radarChartConfig = {
            chart: {
                height: 400,
                type: 'radar',
                toolbar: {
                    show: false
                },
                parentHeightOffset: 0,
                dropShadow: {
                    enabled: false,
                    blur: 8,
                    left: 1,
                    top: 1,
                    opacity: 0.2
                }
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            yaxis: {
                show: false
            },
            series: [
                {
                    name: 'iPhone 11',
                    data: [41, 64, 81, 60, 42, 42, 33, 23]
                },
                {
                    name: 'Samsung s20',
                    data: [65, 46, 42, 25, 58, 63, 76, 43]
                }
            ],
            colors: [chartColors.donut.series1, chartColors.donut.series3],
            xaxis: {
                categories: ['Battery', 'Brand', 'Camera', 'Memory', 'Storage', 'Display', 'OS', 'Price']
            },
            fill: {
                opacity: [1, 0.8]
            },
            stroke: {
                show: false,
                width: 0
            },
            markers: {
                size: 0
            },
            grid: {
                show: false,
                padding: {
                    top: -20,
                    bottom: -20
                }
            }
        };
    if (typeof radarChartEl !== undefined && radarChartEl !== null) {
        var radarChart = new ApexCharts(radarChartEl, radarChartConfig);
        radarChart.render();
    }

    // Donut Chart
    // --------------------------------------------------------------------
    var donutChartEl = document.querySelector('#donut-chart'),
        donutChartConfig = {
            chart: {
                height: 350,
                type: 'donut'
            },
            legend: {
                show: true,
                position: 'bottom'
            },
            labels: ['Operational', 'Networking', 'Hiring', 'R&D'],
            series: [85, 16, 50, 50],
            colors: [
                chartColors.donut.series1,
                chartColors.donut.series5,
                chartColors.donut.series3,
                chartColors.donut.series2
            ],
            dataLabels: {
                enabled: true,
                formatter: function (val, opt) {
                    return parseInt(val) + '%';
                }
            },
            plotOptions: {
                pie: {
                    donut: {
                        labels: {
                            show: true,
                            name: {
                                fontSize: '2rem',
                                fontFamily: 'Montserrat'
                            },
                            value: {
                                fontSize: '1rem',
                                fontFamily: 'Montserrat',
                                formatter: function (val) {
                                    return parseInt(val) + '%';
                                }
                            },
                            total: {
                                show: true,
                                fontSize: '1.5rem',
                                label: 'Operational',
                                formatter: function (w) {
                                    return '31%';
                                }
                            }
                        }
                    }
                }
            },
            responsive: [
                {
                    breakpoint: 992,
                    options: {
                        chart: {
                            height: 380
                        }
                    }
                },
                {
                    breakpoint: 576,
                    options: {
                        chart: {
                            height: 320
                        },
                        plotOptions: {
                            pie: {
                                donut: {
                                    labels: {
                                        show: true,
                                        name: {
                                            fontSize: '1.5rem'
                                        },
                                        value: {
                                            fontSize: '1rem'
                                        },
                                        total: {
                                            fontSize: '1.5rem'
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            ]
        };
    if (typeof donutChartEl !== undefined && donutChartEl !== null) {
        var donutChart = new ApexCharts(donutChartEl, donutChartConfig);
        donutChart.render();
    }

    // Site Traffic Chart
    // ----------------------------------
    var trafficChart;
    var trafficChartOptions;
    var lineAreaChart5 = document.querySelector('#dashboard-line-area-chart-5');

    trafficChartOptions = {
        chart: {
            height: 200,
            type: 'line',
            dropShadow: {
                enabled: true,
                top: 5,
                left: 0,
                blur: 4,
                opacity: 0.1
            },
            toolbar: {
                show: false
            },
            sparkline: {
                enabled: true
            },
            grid: {
                show: false,
                padding: {
                    left: 0,
                    right: 0
                }
            }
        },
        colors: [window.colors.solid.primary],
        dataLabels: {
            enabled: true,
            offsetX: 0,
            offsetY: 0,
            style: {
                fontSize: '14px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                fontWeight: 'bold',
                colors: ["#A9A2F6"]
            },
            background: {
                enabled: true,
                padding: 4,
                borderRadius: 2,
                borderWidth: 1,
                borderColor: '#A9A2F6',
                opacity: 0.9,

            },
        },
        stroke: {
            curve: 'smooth',
            width: 5
        },
        fill: {
            type: 'gradient',
            gradient: {
                shadeIntensity: 1,
                gradientToColors: [$primary_light],
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100, 100, 100]
            }
        },
        series: [
            {
                name: 'Ražošanas jauda',
                data: [150, 200, 125, 225, 200, 250]
                // data: JSON.parse(dashboardAreaChartEl.getAttribute('data-series-3')) || [150, 200, 125, 225, 200, 250]
            }
        ],
        xaxis: {
            labels: {
                show: false
            },
            axisBorder: {
                show: false
            }
        },
        yaxis: [
            {
                y: 0,
                offsetX: 0,
                offsetY: 0,
                padding: {left: 0, right: 0}
            }
        ],
        tooltip: {
            x: {show: false}
        }
    };
    trafficChart = new ApexCharts(lineAreaChart5, trafficChartOptions);
    trafficChart.render();

    var $goalOverviewChart = document.querySelector('#goal-overview-radial-bar-chart-dashboard');
    var goalChartOptions
    var $goalStrokeColor2 = '#51e5a8';
    var $strokeColor = '#ebe9f1';
    var $textHeadingColor = '#5e5873';
    var goalChart
    goalChartOptions = {
        chart: {
            height: 245,
            type: 'radialBar',
            sparkline: {
                enabled: true
            },
            dropShadow: {
                enabled: true,
                blur: 3,
                left: 1,
                top: 1,
                opacity: 0.1
            }
        },
        colors: [$goalStrokeColor2],
        plotOptions: {
            radialBar: {
                offsetY: -10,
                startAngle: -150,
                endAngle: 150,
                hollow: {
                    size: '77%'
                },
                track: {
                    background: $strokeColor,
                    strokeWidth: '50%'
                },
                dataLabels: {
                    name: {
                        show: false
                    },
                    value: {
                        color: $textHeadingColor,
                        fontSize: '2.86rem',
                        fontWeight: '600'
                    }
                }
            }
        },
        fill: {
            type: 'gradient',
            gradient: {
                shade: 'dark',
                type: 'horizontal',
                shadeIntensity: 0.5,
                gradientToColors: [window.colors.solid.success],
                inverseColors: true,
                opacityFrom: 1,
                opacityTo: 1,
                stops: [0, 100]
            }
        },
        series: [83],
        stroke: {
            lineCap: 'round'
        },
        grid: {
            padding: {
                bottom: 30
            }
        }
    };
    goalChart = new ApexCharts($goalOverviewChart, goalChartOptions);
    goalChart.render();
});
