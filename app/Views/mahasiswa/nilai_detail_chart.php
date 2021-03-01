<script type="text/javascript">
    var dtNilai = '<?= $dtNilai ?>';
    var nilai = document.getElementById('chart-nilai-mhs').getContext('2d');
    var objNilai = JSON.parse(dtNilai);
    var dtLabel = [];
    var dtData = [];
    for (var i = 0; i < objNilai.length; i++) {
        dtLabel.push(objNilai[i].semester);
        dtData.push(parseFloat(objNilai[i].ips));
    }
    var nil = new Chart(nilai, {
        type: 'line',
        data: {
            labels: dtLabel,
            datasets: [{
                label: 'IPK',
                data: dtData,
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
</script>