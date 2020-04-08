$(document).ready(function() {
    $('#orders').DataTable();
} );

/**
 * Order obj
 *
 * @constructor
 */
function Order() {

    this.graphBuild = function (urlSearchParams) {
        doAjaxCall('orders/graph/build?' + urlSearchParams, 'GET', [], function (response) {
            let chartLabels = response.data.labels;
            let chartDate = response.data.datasets.date;
            let chartProfit = response.data.datasets.profit;
            /* large line chart */
            let chLine = document.getElementById("chLine");
            let chartData = {
                labels: chartLabels,
                datasets: [
                    {
                        data: chartDate,
                    },
                    {
                        data: chartProfit,
                    }
                ]
            };

            if (chLine) {
                new Chart(chLine, {
                    type: 'line',
                    data: chartData,
                    options: {
                        scales: {
                            yAxes: [{
                                ticks: {
                                    beginAtZero: false
                                }
                            }]
                        },
                        legend: {
                            display: false
                        }
                    }
                });
            }
        }, function (response) {});
    };
}

Order = new Order();

let urlParams = new URLSearchParams(window.location.search);
Order.graphBuild(urlParams.toString());
