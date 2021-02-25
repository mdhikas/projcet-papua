var jml_mahasiswa = document.getElementById('chart-mhs').getContext('2d');
var nil_mahasiswa = document.getElementById('chart-nil').getContext('2d');
var ipk_mahasiswa = document.getElementById('chart-ipk').getContext('2d');

var jumlah = new Chart(jml_mahasiswa, {
    type: 'line',
    data: {
        labels: ['2016', '2017', '2018', '2019', '2020', '2021'],
        datasets: [{
            label: 'Jumlah Mahasiswa/i Papua',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)'
            ],
            // borderWidth: 1
            fill: false,
        }]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

var nilai = new Chart(nil_mahasiswa, {
    type: 'bar',
    data: {
        labels: ['2016', '2017', '2018', '2019', '2020', '2021'],
        datasets: [{
            label: 'Jumlah Mahasiswa/i Papua',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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
                    beginAtZero: true
                }
            }]
        }
    }
});

var ipk = new Chart(ipk_mahasiswa, {
    type: 'pie',
    data: {
        labels: ['2016', '2017', '2018', '2019', '2020', '2021'],
        datasets: [{
            label: 'Jumlah Mahasiswa/i Papua',
            data: [12, 19, 3, 5, 2, 3],
            backgroundColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
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
                    beginAtZero: true
                }
            }]
        }
    }
});