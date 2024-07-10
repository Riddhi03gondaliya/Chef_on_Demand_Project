// Customer ratings chart
var options = {
    series: [{
        name: 'Ratings',
        data: [10,6,12,21,16]
    }],

    colors: ['#0da487'],

    chart: {
        type: 'area',
        // stacked: false,
        height: 285,
    },

    stroke: {
        width: 3,
        curve: 'smooth'
    },
};

var chart = new ApexCharts(document.querySelector("#cust-ratings"), options);
chart.render();

// sales summary chart
var options = {
    series: [{
        name: "Sales",
        data: [15000,21000,18000,25500,27000,24500,31000,37000,31000,28000,32500,35000]
    }],

    chart: {
        type: 'bar',
        height: 290,
    },

    plotOptions: {
        bar: {
            horizontal: false,
            columnWidth: '30%',
            endingShape: 'rounded'
        },
    },

    dataLabels: {
        enabled: false
    },

    stroke: {
        show: true,
        width: 1,
        colors: ['transparent']
    },

    colors: ['#0da487', '#2483e2', '#3d3d3d'],

    xaxis: {
        categories: ['Jan','Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct','Nov','Dec'],
    },

    yaxis: {
        title: {
            show: true,
        }
    },

    fill: {
        opacity: 1
    },

    tooltip: {
        y: {
            formatter: function (val) {
                return "₹ " + val
            }
        }
    },
    legend: {
        show: false,
    },

    responsive: [{
        breakpoint: 991,

        options: {
            chart: {
                height: 300,
            },
        },
    }, ],
};

var chart = new ApexCharts(document.querySelector("#sales-summary"), options);
chart.render();


// Visitors/Customers Chart Start
var options = {
    series: [{
            name: "Visitors",
            data: [45, 52, 38, 24, 33, 58, 64, 92, 106, 76, 84, 72]
        },{
             name: 'Customers',
             data: [11, 18, 24, 27, 18, 32, 38, 45, 35, 52, 61, 70]
         }
    ],
    theme: {
        monochrome: {
            enabled: true,
            color: '#255aee',
            shadeTo: 'light',
            shadeIntensity: 0.65
        }
    },
    chart: {
        height: 310,
        type: 'line',
        zoom: {
            enabled: true
        },
    },
    dataLabels: {
        enabled: false
    },
    stroke: {
        width: [3, 7, 5],
        curve: 'straight',
        dashArray: [0, 8, 5]
    },
    markers: {
        size: 0,
        hover: {
            sizeOffset: 6
        }
    },
    xaxis: {
        categories: ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10', '11', '12'],
    },
    grid: {
        borderColor: '#ddd',
    },
    responsive: [{
        breakpoint: 992,
        options: {
            chart: {
                height: 300,
            },
        },
    }, ],
};

var chart = new ApexCharts(document.querySelector("#visit-cust"), options);
chart.render();


//traffic chart

var generateDayWiseTimeSeries = function (baseval, count, yrange) {
    var i = 0;
    var series = [];
    while (i < count) {
        var x = baseval;
        var y = Math.floor(Math.random() * (yrange.max - yrange.min + 1)) + yrange.min;

        series.push([x, y]);
        baseval += 88400000;
        i++;
    }
    return series;
}

var options = {
    series: [{
        name: 'Referral Traffic',
        data: [30, 42, 30, 23, 27, 47, 56, 81, 99, 67, 79, 69]
    }, ],
    chart: {
        type: 'area',
        height: 310,
        stacked: true,
        events: {
            selection: function (chart, e) {
                console.log(new Date(e.xaxis.min))
            }
        },
    },

    stroke: {
        show: true,
        curve: 'smooth',
        lineCap: 'butt',
        colors: undefined,
        dashArray: 0,
    },

    markers: {
        size: 6,
        colors: '#fff',
        strokeColors: '#747dc6',
        strokeWidth: 4,
        strokeOpacity: 0.9,
        strokeDashArray: 0,
        fillOpacity: 1,
        discrete: [],
        shape: "circle",
        radius: 2,
        offsetX: 0,
        offsetY: 0,
        onClick: undefined,
        onDblClick: undefined,
        showNullDataPoints: true,

        hover: {
            size: undefined,
            sizeOffset: 3
        }
    },

    colors: ['#747dc6'],
    dataLabels: {
        enabled: false
    },

    grid: {
        padding: {
            right: 0,
            bottom: 0,
            left: 0,
            top: 0
        }
    },

    fill: {
        type: 'gradient',
        gradient: {
            opacityFrom: 0.6,
            opacityTo: 0.2,
            shade: 'light',
            type: "vertical",
            // optional, if not defined - uses the shades of same color in series
        }
    },

    legend: {
        position: 'top',
        horizontalAlign: 'left'
    },

    xaxis: {
        categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
    },

    responsive: [{
            breakpoint: 1400,
            options: {
                chart: {
                    height: 210,
                    width: "120%",
                    offsetX: -45,

                },

                legend: {
                    position: 'bottom',
                },

                dataLabels: {
                    textAnchor: 'left',

                    style: {
                        fontSize: '10px',
                    },
                }
            },
        },

        {
            breakpoint: 992,
            options: {
                chart: {
                    height: 210,
                    width: "100%",
                    offsetX: 0,
                },
            },
        },

        {
            breakpoint: 578,
            options: {
                chart: {
                    height: 200,
                    width: "105%",
                    offsetX: -20,
                    offsetY: 10,
                },
            },
        },

        {
            breakpoint: 430,
            options: {
                chart: {
                    width: "108%",
                },
            },
        },

        {
            breakpoint: 330,
            options: {
                chart: {
                    width: "112%",
                },
            },
        },
    ],
};

var chart = new ApexCharts(document.querySelector("#traffic-chart"), options);
chart.render();