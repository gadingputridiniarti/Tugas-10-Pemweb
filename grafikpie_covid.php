<?php
include('koneksi.php');
$data = mysqli_query($koneksi,"select * from tb_covid");
while($row = mysqli_fetch_array($data)){
	$nama_case[] = $row['negara'];
	
	$query = mysqli_query($koneksi,"select totalcase from tb_covid where id_covid='".$row['id_covid']."'");
	$row = $query->fetch_array();
	$jumlah_case[] = $row['totalcase'];
}
?>
<!doctype html>
<html>

<head>
	<title>Pie Chart</title>
	<script type="text/javascript" src="Chart.js"></script>
</head>

<body>
	<div id="canvas-holder" style="width:50%">
		<canvas id="chart-area"></canvas>
	</div>
	<script>
		var config = {
			type: 'pie',
			data: {
				datasets: [{
					data:<?php echo json_encode($jumlah_case); ?>,
					backgroundColor: [
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
                    'rgba(0, 51, 102,0.2)',
                    'rgba(128, 0, 0, 0.2)',
                    'rgba(50, 96, 17, 0.2)',
                    'rgba(255, 102, 153,0.2)',
                    'rgba(153, 51, 51,0.2)'
					],
					label: 'Presentase Penjualan Barang'
				}],
				labels: <?php echo json_encode($nama_case); ?>},
			options: {
				responsive: true
			}
		};

		window.onload = function() {
			var ctx = document.getElementById('chart-area').getContext('2d');
			window.myPie = new Chart(ctx, config);
		};

		document.getElementById('randomizeData').addEventListener('click', function() {
			config.data.datasets.forEach(function(dataset) {
				dataset.data = dataset.data.map(function() {
					return randomScalingFactor();
				});
			});

			window.myPie.update();
		});

		var colorNames = Object.keys(window.chartColors);
		document.getElementById('addDataset').addEventListener('click', function() {
			var newDataset = {
				backgroundColor: [],
				data: [],
				label: 'New dataset ' + config.data.datasets.length,
			};

			for (var index = 0; index < config.data.labels.length; ++index) {
				newDataset.data.push(randomScalingFactor());

				var colorName = colorNames[index % colorNames.length];
				var newColor = window.chartColors[colorName];
				newDataset.backgroundColor.push(newColor);
			}

			config.data.datasets.push(newDataset);
			window.myPie.update();
		});

		document.getElementById('removeDataset').addEventListener('click', function() {
			config.data.datasets.splice(0, 1);
			window.myPie.update();
		});
	</script>
</body>
</html>