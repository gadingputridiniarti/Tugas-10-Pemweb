<?php
include('koneksi.php');
$label = ["India","Korea Selatan","Turkey","Vietnam","Japan","Iran","Indonesia","Malaysia","Thailand","Israel"];

for($bulan = 1;$bulan < 11;$bulan++)
{
	$query = mysqli_query($conn,"SELECT sum(totalcase) AS jumlah FROM tb_covid WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_produk[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++)
{
	$query = mysqli_query($conn,"SELECT sum(totaldeath) AS jumlah FROM tb_covid WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_produk1[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++)
{
	$query = mysqli_query($conn,"SELECT sum(totalrecover) AS jumlah FROM tb_covid WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_produk2[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++)
{
	$query = mysqli_query($conn,"SELECT sum(activecase) AS jumlah FROM tb_covid WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_produk3[] = $row['jumlah'];
}

for($bulan = 1;$bulan < 11;$bulan++)
{
	$query = mysqli_query($conn,"SELECT sum(totaltest) AS jumlah FROM tb_covid WHERE id_covid='$bulan'");
	$row = $query->fetch_array();
	$jumlah_produk4[] = $row['jumlah'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Membuat Grafik Menggunakan Chart JS</title>
	<script type="text/javascript" src="Chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
        <style>
            body {
                padding-top: 1%;
            }
        .container {
            width: 1400px;
            height: 650px;
            }
        </style>
</head>
<body>
    <center><h2>GRAFIK BAR KASUS COVID-19</h2><center>
        <br>
	<center><div class="container">
		<canvas id="myChart"></canvas>
	</div><center>

	<script>
		var ctx = document.getElementById("myChart").getContext('2d');
		var myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: <?php echo json_encode($label); ?>,
				datasets: [{
					label: 'Total Case COVID-19',
					data: <?php echo json_encode($jumlah_produk); ?>,
					backgroundColor: ['rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)'
					
					],
					borderColor: ['rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)',
					'rgba(255, 179, 179, 0.2)'
					],
					borderWidth: 1
				},{
					label: 'Total Death COVID-19',
					data: <?php echo json_encode($jumlah_produk1); ?>,
					backgroundColor: [
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)',
					'rgba(255, 140, 102, 0.2)'
					
					],
					borderColor: [
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)',
					'rgba(255, 140, 102, 1)'
					],
					borderWidth: 1
				},{
					label: 'Total recover COVID-19',
					data: <?php echo json_encode($jumlah_produk2); ?>,
					backgroundColor: [
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)',
					'rgba(255, 255, 102, 0.2)'
					],
					borderColor: [
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)',
					'rgba(255, 255, 102, 1)'
					],
					borderWidth: 1
				},{
					label: 'Active Cases COVID-19',
					data: <?php echo json_encode($jumlah_produk3); ?>,
					backgroundColor: [
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)',
					'rgba(102, 217, 255, 0.2)'
					],
					borderColor: [
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)',
					'rgba(102, 217, 255, 1)'
					],
					borderWidth: 1
				},{
					label: 'Total Test COVID-19',
					data: <?php echo json_encode($jumlah_produk4); ?>,
					backgroundColor: [
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)',
					'rgba(255, 102, 217, 0.2)'
					],
					borderColor: [
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)',
					'rgba(255, 102, 217, 1)'
					
					],
					borderWidth: 1
				}]
			},
			options: {
				responsive:true,
				maintainAspectRatio: false,
				scales: {
					yAxes: [{
						ticks: {
							beginAtZero:true
						}
					}]
				}
			}
		});
	</script>
</body>
</html>