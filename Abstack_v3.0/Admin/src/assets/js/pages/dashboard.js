/**
 * Theme: Abstack - Responsive Bootstrap 5 Admin Dashboard
 * Author: Coderthemes
 * Module/App: Dashboard
 */




// chart Revenue
var options = {
    series: [
        {
            name: "Revenue",
            data: [50, 85, 60, 100, 70, 45, 90, 75]
        }
    ],
    chart: {
        height: 45,
        type: "area",
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },

    },
    // colors: ["#348cd4"],
    colors: [getComputedStyle(document.documentElement).getPropertyValue('--abstack-success').trim()], // Using CSS variable for color

    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.1,
            stops: [0, 90, 100]
        }
    },
    tooltip: {
        enabled: false
    },
    dataLabels: {
        enabled: false
    },
    grid: {
        show: false
    },
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
    },
    yaxis: {
        show: false
    },
    stroke: {
        curve: "smooth",
        width: 1
    }
};

var chart = new ApexCharts(document.querySelector("#chart-revenue"), options);
chart.render();


// products chart
var options = {
    series: [
        {
            name: "Expenses",
            data: [30, 60, 35, 80, 50, 25, 70, 55]
        }
    ],
    chart: {
        height: 45,
        type: "area",
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },

    },
    // colors: ["#348cd4"],
    colors: [getComputedStyle(document.documentElement).getPropertyValue('--abstack-primary').trim()],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.1,
            stops: [0, 90, 100]
        }
    },
    tooltip: {
        enabled: false
    },
    dataLabels: {
        enabled: false
    },
    grid: {
        show: false
    },
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
    },
    yaxis: {
        show: false
    },
    stroke: {
        curve: "smooth",
        width: 1
    }
};

var chart = new ApexCharts(document.querySelector("#chart-products"), options);
chart.render();


// customers chart
var options = {
    series: [
        {
            name: "Investments",
            data: [20, 40, 25, 50, 35, 15, 45, 30]

        }
    ],
    chart: {
        height: 45,
        type: "area",
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },

    },
    // colors: ["#348cd4"],
    colors: [getComputedStyle(document.documentElement).getPropertyValue('--abstack-danger').trim()],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.1,
            stops: [0, 90, 100]
        }
    },
    tooltip: {
        enabled: false
    },
    dataLabels: {
        enabled: false
    },
    grid: {
        show: false
    },
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
    },
    yaxis: {
        show: false
    },
    stroke: {
        curve: "smooth",
        width: 1
    }
};

var chart = new ApexCharts(document.querySelector("#chart-customers"), options);
chart.render();


// profit chart
var options = {
    series: [
        {
            name: "Savings",
            data: [40, 70, 50, 90, 60, 35, 80, 65]
        }
    ],
    chart: {
        height: 45,
        type: "area",
        sparkline: {
            enabled: true
        },
        animations: {
            enabled: false
        },
    },
    // colors: ["#348cd4"],
    colors: [getComputedStyle(document.documentElement).getPropertyValue('--abstack-warning').trim()],
    fill: {
        type: "gradient",
        gradient: {
            shadeIntensity: 1,
            opacityFrom: 0.5,
            opacityTo: 0.1,
            stops: [0, 90, 100]
        }
    },
    tooltip: {
        enabled: false
    },
    dataLabels: {
        enabled: false
    },
    grid: {
        show: false
    },
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
    },
    yaxis: {
        show: false
    },
    stroke: {
        curve: "smooth",
        width: 1
    }
};

var chart = new ApexCharts(document.querySelector("#chart-profit"), options);
chart.render();


//
// Statistics CHART
//
///
var colors = ["#777edd", "#0acf97", "#fa5c7c", "#f9bc0b"];
var dataColors = $("#statistics-chart").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}

var options = {
    series: [{
        name: "Open Campaign",
        type: "bar",
        data: [89.25, 98.58, 68.74, 108.87, 77.54, 84.03, 51.24, 28.57, 92.57, 42.36, 88.51, 36.57]
    }],
    chart: {
        height: 310,
        type: "line",
        toolbar: {
            show: false
        }
    },
    stroke: {
        width: 0,
        curve: 'straight'
    },
    plotOptions: {
        bar: {
            columnWidth: "60%",
            barHeight: "70%",
            borderRadius: 5,
            borderRadiusApplication: 'end',
        },
    },
    xaxis: { categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"] },
    colors: colors
}

var chart = new ApexCharts(
    document.querySelector("#statistics-chart"),
    options
);

chart.render();

//
// REVENUE AREA CHART
//
///
var colors = ["#777edd", "#0acf97", "#fa5c7c", "#f9bc0b"];
var dataColors = $("#revenue-chart").data('colors');
if (dataColors) {
    colors = dataColors.split(",");
}
var options = {
    series: [
        {
            name: "Conversion Rate",
            data: [45, 60, -20, 60, 0, 45, -80, 65, -30, 58], // Example data
        },
        {
            name: "Average Sale Value",
            data: [-80, 60, 80, -40, 15, 60, -40, 80, -50, 2], // Example data
        },
    ],
    // chart: {
    //     height: 350,
    //     type: "line",
    // },

    chart: {
        height: 300,
        type: 'line',
        zoom: {
            enabled: false
        },
        toolbar: { show: false }
    },
    stroke: {
        width: [4, 4],
        curve: "smooth",
        dashArray: [0, 8], // Solid for first line, dashed for second
    },
    dataLabels: {
        enabled: false,
    },
    markers: {
        size: 5,
    },
    colors: colors,
    legend: {
        position: "top",
    },
    xaxis: {
        categories: [
            "January",
            "February",
            "March",
            "April",
            "May",
            "June",
            "July",
            "August",
            "September",
            "October",
        ],
    },
    tooltip: {
        shared: true,
        intersect: false,
    },
};
var chart = new ApexCharts(
    document.querySelector("#revenue-chart"),
    options
);

chart.render();