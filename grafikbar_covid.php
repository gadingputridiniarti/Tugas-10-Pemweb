<?php
include('koneksi.php');
$label =
["India","Japan","S.Korea","Turkey","Vietnam","Taiwan","Iran","Indonesia","Malaysia","Israel"];
for($negara = 1;$negara < 11; $negara++){
$query = mysqli_query($koneksi,"select totalcase from tb_covid where id_covid='$negara'");
$row = $query->fetch_array();
$jumlah_produk[] = $row['totalcase'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Grafik Covid  - Bar Chart</title>
    <script type="text/javascript" src="Chart.js"></script>
</head>

<body>
    <div style="width: 800px;height: 800px">
        <canvas id="myChart"></canvas>
    </div>

    <script>
    var ctx = document.getElementById("myChart").getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?php echo json_encode($label); ?>,
            datasets: [{
                label: 'Grafik Total Cases Covid-19',
                data: <?php echo json_encode($jumlah_produk); ?>,
				backgroundColor: ['rgba(255, 99, 132, 0.2)',
					'rgba(255, 255, 0,0.2)',
					'rgba(51, 51, 0, 0.2)',
					'rgba(255, 206, 86, 0.2)',
					'rgba(75, 192, 192, 0.2)',
                    'rgba(20, 4, 160, 0.2)',
                    'rgba(0, 51, 102,0.2)',
                    'rgba(128, 0, 0, 0.2)',
                    'rgba(50, 96, 17, 0.2)',
                    'rgba(255, 102, 153,0.2)',
                    'rgba(153, 51, 51,0.2)'
					],
					borderColor: [
                    'rgba(255, 255, 0,0.2)',
					'rgba(51, 51, 0, 1,0.2)',
					'rgba(255, 206, 86, 1)',
					'rgba(75, 192, 192, 1)',
                    'rgba(20, 4, 160, 0.2)',
                    'rgb(0, 51, 102,0.2)',
                    'rgba(128, 0, 0, 0.2)',
                    'rgba(50, 96, 17, 0.2)',
                    'rgba(255, 102, 153,0.2)',
                    'rgba(153, 51, 51,0.2)'
					],
                borderWidth: 1
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
    </script>
</body>

</html>