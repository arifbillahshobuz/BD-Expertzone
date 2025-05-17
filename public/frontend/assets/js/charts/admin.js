if (jQuery(".admin-chart-02").length) {
  const options = {
    series: [{
      name: 'Total Account',
      data: [42, 30, 25, 40, 57, 71, 86, 71, 108]
    }],
    colors: ["#50b5ff"],
    chart: {
      height: '100%',
      type: 'line',
      toolbar: {
        show: false
      },
    },
    forecastDataPoints: {
      count: 2,
    },
    stroke: {
      width: 3,
    },
    grid: {
      show: true,
      strokeDashArray: 7,
    },
    markers: {
      size: 6,
      colors: '#FFFFFF',
      strokeColors: ["#50b5ff"],
      strokeWidth: 2,
      strokeOpacity: 0.9,
      strokeDashArray: 0,
      fillOpacity: 0,
      shape: "circle",
      radius: 2,
      offsetX: 0,
      offsetY: 0,
    },
    xaxis: {
      categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep'],
      labels: {
        style: {
          colors: '#7E8B9A',
        }
      },
      axisBorder: {
        show: false,
      },
      axisTicks: {
        show: false,
      },
      tooltip: {
        enabled: false,
      }
    },
    yaxis: {
      labels: {
        style: {
          colors: '#7E8B9A',
        }
      },
    }
  };

  const chart = new ApexCharts(document.querySelector(".admin-chart-02"), options);
  chart.render();
  
  // Dark Mode Options
  document.addEventListener("theme_scheme", (e) => {
    chart.updateOptions({
      tooltip: {
        theme: e.detail.value.value
      },
      xaxis: {
        labels: {
          style: {
            colors: e.detail.value.value == 'dark' ? "#d7dbdf" : '#7E8B9A',
          }
        },
      },
      yaxis: {
        labels: {
          style: {
            colors: e.detail.value.value == 'dark' ? "#d7dbdf" : '#7E8B9A',
          }
        },
      }
    })
  });

  document.addEventListener('ColorChange', (e) => {
    const newOpt = { colors: [e.detail.detail1, e.detail.detail2], }
    chart.updateOptions(newOpt)
  })
}
if (document.querySelectorAll('#admin-chart-03').length) {
  const options = {
    series: [74, 60],
    chart: {
      height: 200,
      type: 'radialBar',
    },
    colors: ["#50b5ff", "#d592ff"],
    plotOptions: {
      radialBar: {
        inverseOrder: false,
        endAngle: 360,
        hollow: {
          margin: 5,
          size: '50%',
          background: 'transparent',
          imageWidth: 150,
          imageHeight: 150,
          imageClipped: true,
          position: 'front',
          dropShadow: {
            enabled: false,
            blur: 3,
            opacity: 0.5
          }
        },
        track: {
          show: true,
          background: '#f2f2f2',
          strokeWidth: '70%',
          opacity: 1,
          margin: 6,
          dropShadow: {
            enabled: false,
            blur: 3,
            opacity: 0.5
          }
        },
        dataLabels: {
          show: true,
          name: {
            show: true,
            fontSize: '16px',
            fontWeight: 600,
            offsetY: -10
          },
          value: {
            show: true,
            color: '#2B2D42',
            fontSize: '14px',
            fontWeight: 400,
            offsetY: 16,
            formatter: function (val) {
              return val + '%'
            }
          },
        }
      }
    },
    labels: ['Male', 'Female'],
  };
  const chart = new ApexCharts(document.querySelector("#admin-chart-03"), options);
  chart.render();

  // Dark Mode Options
  document.addEventListener("theme_scheme", (e) => {
    chart.updateOptions({
      plotOptions: {
        radialBar: {
          dataLabels: {
            value: {
              color: e.detail.value.value == 'dark' ? '#ffffff' : '#2B2D42',
            }
          }
        }
      }
    })
  });

  document.addEventListener('ColorChange', (e) => {
    const newOpt = { colors: [e.detail.detail1, e.detail.detail2], }
    chart.updateOptions(newOpt)
  })
}

if (document.querySelectorAll('#admin-chart-06').length) {
  var options = {
    series: [65, 35],
    chart: {
      width: 350,
      type: 'pie',
    },
    legend: {
      show: true,
      position: 'bottom',
      horizontalAlign: 'center'
    },
    labels: ['Likes', 'Followers'],
    // legend: {
    //   labels: {
    //     colors: '#2B2D42',
    //   }
    // },
    responsive: [{
      breakpoint: 480,
      options: {
        chart: {
          width: 200
        },
        legend: {
          show: false
        }
      }
    }]
  };

  var chart = new ApexCharts(document.querySelector("#admin-chart-06"), options);
  chart.render();

  // Dark Mode Options
  document.addEventListener("theme_scheme", (e) => {
    chart.updateOptions({
      legend: {
        labels: {
          colors: e.detail.value.value == 'dark' ? '#ffffff' : '#2B2D42',
        }
      },
    })
  });
}