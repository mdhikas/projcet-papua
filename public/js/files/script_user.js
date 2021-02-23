var ipk_user = document.getElementById('chart-ipk-user').getContext('2d');
var ipk = new Chart(ipk_user, {
    type: 'line',
    data: {
        labels: ['20181', '20182', '20191', '20192', '20201', '2022'],
        datasets: [{
            label: 'IPK',
            data: [3.26, 3.57, 3.54, 3.55, 3.61, 3.53],
            backgroundColor: [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            // borderWidth: 1
            fill: false,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: false
                }
            }]
        }
    }
});