// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#858796';

// Area Chart Example
document.addEventListener('DOMContentLoaded', function() {
  var ctx = document.getElementById("kompre1Chart").getContext("2d");

  var data = {
      labels: [],
      datasets: [{
          label: "Detak Jantung",
          lineTension: 0.3,
          backgroundColor: "rgba(255, 103, 0, 0.38)",
          borderColor: "rgba(255, 103, 0, 1)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(255, 66, 0, 1)",
          pointBorderColor: "rgba(255, 66, 0, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [0, 0, 0, 0, 0, 0, 0]
      }, 
      // {
      //     label: "Piezo",
      //     lineTension: 0.3,
      //     backgroundColor: "rgba(255, 0, 0, 0.22)",
      //     borderColor: "rgba(198, 0, 0, 0.8)",
      //     pointRadius: 3,
      //     pointBackgroundColor: "rgba(255, 0, 0, 0.94)",
      //     // pointBorderColor: "rgba(78, 115, 223, 1)",
      //     pointHoverRadius: 3,
      //     pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      //     pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      //     pointHitRadius: 10,
      //     pointBorderWidth: 2,
      //     data: [0, 0, 0, 0, 0, 0, 0]
      // }
    ]
  };

  var options = {
      animation: false,
      // Boolean - If we want to override with a hard coded scale
      scaleOverride: true,
      // ** Required if scaleOverride is true **
      // Number - The number of steps in a hard coded scale
      scaleSteps: 10,
      // Number - The value jump in the hard coded scale
      scaleStepWidth: 10,
      // Number - The scale starting value
      scaleStartValue: 0,
      maintainAspectRatio: false,
      layout: {
      
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 10
          }
        }],
        yAxes: [{
    
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: true
      },

  };

  var myLineChart = new Chart(ctx, {
      type: 'line',
      data: data,
      options: options
  });

  

function fetchDataFromDatabase() {
    fetch('fetch.php')
        .then(response => response.json())
        .then(data => {
            updateChart(myLineChart, data);
        })
        .catch(error => console.error('Error:', error));
}

function updateChart(chart, newData) {
    // Keep only the latest 7 entries
    var latestData = newData.slice(-7);

    chart.data.labels = latestData.map(entry => entry.date);

    chart.data.datasets.forEach(function (dataset, index) {
        if (index === 0) {
            dataset.data = latestData.map(entry => entry.bpms);
        } 
    });

    chart.update();
}

setInterval(fetchDataFromDatabase, 2000); // Update every 2 seconds

});


// Area Chart Example
document.addEventListener('DOMContentLoaded', function() {
  var ctx2 = document.getElementById("kompre2Chart").getContext("2d");

  var data = {
      labels: [],
      datasets: [{
          label: "Tingkat Stress",
          lineTension: 0.3,
          backgroundColor: "rgba(0, 82, 255, 0.33)",
          borderColor: "rgba(0, 82, 255, 0.8)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(0, 81, 255, 1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
          pointHoverBorderColor: "rgba(78, 115, 223, 1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [0, 0, 0, 0, 0, 0, 0]
      }, 
      // {
      //     label: "Piezo",
      //     lineTension: 0.3,
      //     backgroundColor: "rgba(177, 179, 0, 0.33)",
      //     borderColor: "rgba(177, 179, 0, 0.8)",
      //     pointRadius: 3,
      //     pointBackgroundColor: "rgba(177, 179, 0, 0.1)",
      //     pointHoverRadius: 3,
      //     pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      //     pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      //     pointHitRadius: 10,
      //     pointBorderWidth: 2,
      //     data: [0, 0, 0, 0, 0, 0, 0]
      // }
    ]
  };

  var options = {
      animation: false,
      // Boolean - If we want to override with a hard coded scale
      scaleOverride: true,
      // ** Required if scaleOverride is true **
      // Number - The number of steps in a hard coded scale
      scaleSteps: 10,
      // Number - The value jump in the hard coded scale
      scaleStepWidth: 10,
      // Number - The scale starting value
      scaleStartValue: 0,
      maintainAspectRatio: false,
      layout: {
      
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 10
          }
        }],
        yAxes: [{
    
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: true
      },

  };

  var myLineChart = new Chart(ctx2, {
      type: 'line',
      data: data,
      options: options
  });

  

  function fetchDataFromDatabase() {
    fetch('fetch.php')
        .then(response => response.json())
        .then(data => {
            updateChart(myLineChart, data);
        })
        .catch(error => console.error('Error:', error));
}

function updateChart(chart, newData) {
    // Keep only the latest 7 entries
    var latestData = newData.slice(-7);

    chart.data.labels = latestData.map(entry => entry.date);

    chart.data.datasets.forEach(function (dataset, index) {
        if (index === 0) {
            dataset.data = latestData.map(entry => entry.gsrs);
        } 
    });

    chart.update();
}

setInterval(fetchDataFromDatabase, 2000); // Update every 2 seconds

});

document.addEventListener('DOMContentLoaded', function() {
  var ctx3 = document.getElementById("kompre3Chart").getContext("2d");

  var data = {
      labels: [],
      datasets: [{
          label: "Kontraksi Otot",
          lineTension: 0.3,
          backgroundColor: "rgba(0,209, 73, 0.33)",
          borderColor: "rgba(0,209, 73, 0.8)",
          pointRadius: 3,
          pointBackgroundColor: "rgba(0,209, 73,1)",
          pointHoverRadius: 3,
          pointHoverBackgroundColor: "rgba(0,209, 73,1)",
          pointHoverBorderColor: "rgba(0,209, 73,1)",
          pointHitRadius: 10,
          pointBorderWidth: 2,
          data: [0, 0, 0, 0, 0, 0, 0]
      }, 
      // {
      //     label: "Piezo",
      //     lineTension: 0.3,
      //     backgroundColor: "rgba(177, 179, 0, 0.33)",
      //     borderColor: "rgba(177, 179, 0, 0.8)",
      //     pointRadius: 3,
      //     pointBackgroundColor: "rgba(177, 179, 0, 0.1)",
      //     pointHoverRadius: 3,
      //     pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
      //     pointHoverBorderColor: "rgba(78, 115, 223, 1)",
      //     pointHitRadius: 10,
      //     pointBorderWidth: 2,
      //     data: [0, 0, 0, 0, 0, 0, 0]
      // }
    ]
  };

  var options = {
      animation: false,
      // Boolean - If we want to override with a hard coded scale
      scaleOverride: true,
      // ** Required if scaleOverride is true **
      // Number - The number of steps in a hard coded scale
      scaleSteps: 10,
      // Number - The value jump in the hard coded scale
      scaleStepWidth: 10,
      // Number - The scale starting value
      scaleStartValue: 0,
      maintainAspectRatio: false,
      layout: {
      
      },
      scales: {
        xAxes: [{
          time: {
            unit: 'date'
          },
          gridLines: {
            display: false,
            drawBorder: false
          },
          ticks: {
            maxTicksLimit: 10
          }
        }],
        yAxes: [{
    
          gridLines: {
            color: "rgb(234, 236, 244)",
            zeroLineColor: "rgb(234, 236, 244)",
            drawBorder: false,
            borderDash: [2],
            zeroLineBorderDash: [2]
          }
        }],
      },
      legend: {
        display: true
      },

  };

  var myLineChart = new Chart(ctx3, {
      type: 'line',
      data: data,
      options: options
  });

  

  function fetchDataFromDatabase() {
    fetch('fetch.php')
        .then(response => response.json())
        .then(data => {
            updateChart(myLineChart, data);
        })
        .catch(error => console.error('Error:', error));
}

function updateChart(chart, newData) {
    // Keep only the latest 7 entries
    var latestData = newData.slice(-7);

    chart.data.labels = latestData.map(entry => entry.date);

    chart.data.datasets.forEach(function (dataset, index) {
        if (index === 0) {
            dataset.data = latestData.map(entry => entry.emgs);
        } 
    });

    chart.update();
}

setInterval(fetchDataFromDatabase, 2000); // Update every 2 seconds

});


