<?php
include('koneksi.php');
$india = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='India'");
$korsel = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Korea Selatan'");
$turkey = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Turkey'");
$vietnam = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Vietnam'");
$japan = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Japan'");
$iran = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Iran'");
$indo = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Indonesia'");
$malay = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Malaysia'");
$thai = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Thailand'");
$israel = mysqli_query($conn, "SELECT * FROM tb_covid WHERE negara='Israel'");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>GRAFIK LINE COVID-19</title>
    <script src="Chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <style type="text/css">
        body {
            padding-top: 2%;
        }

        .container {
            width: 1400px;
            height: 625px;
        }
    </style>
</head>

<body>

    <center><h2>LAPORAN GRAFIK LINE COVID-19</h2></center>
    <br>
    <div class="container">
        <canvas id="linechart" width="100" height="100"></canvas>
    </div>

</body>
</html>

<script  type="text/javascript">
var ctx = document.getElementById("linechart").getContext("2d");
var data = {
            labels: ["Total Case","Total Death","Total Recover","Active cases", "Total Test"],
            datasets: [
                {
                    label: "India",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: " #ffb3b3",
                    borderColor: " #ffb3b3",
                    pointHoverBackgroundColor: " #ffb3b3",
                    pointHoverBorderColor: " #ffb3b3",
                    data: [<?php while ($p = mysqli_fetch_array($india)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Korea Selatan",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#4d80b3",
                    borderColor: "#4d80b3",
                    pointHoverBackgroundColor: "#4d80b3",
                    pointHoverBorderColor: "#4d80b3",
                    data: [<?php while ($p = mysqli_fetch_array($korsel)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totaltest'] . '",';}?>]
                },
                {
                    label: "Turkey",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#06f9f9",
                    borderColor: "#06f9f9",
                    pointHoverBackgroundColor: "#06f9f9",
                    pointHoverBorderColor: "#06f9f9",
                    data: [<?php while ($p = mysqli_fetch_array($turkey)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Vietnam",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#06f9bc",
                    borderColor: "#06f9bc",
                    pointHoverBackgroundColor: "#06f9bc",
                    pointHoverBorderColor: "#06f9bc",
                    data: [<?php while ($p = mysqli_fetch_array($vietnam)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Japan",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#80f20d",
                    borderColor: "#80f20d",
                    pointHoverBackgroundColor: "#80f20d",
                    pointHoverBorderColor: "#80f20d",
                    data: [<?php while ($p = mysqli_fetch_array($japan)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Iran",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#ac5380",
                    borderColor: "#ac5380",
                    pointHoverBackgroundColor: "#ac5380",
                    pointHoverBorderColor: "#ac5380",
                    data: [<?php while ($p = mysqli_fetch_array($iran)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Indonesia",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#f2f20d",
                    borderColor: "#f2f20d",
                    pointHoverBackgroundColor: "#f2f20d",
                    pointHoverBorderColor: "#f2f20d",
                    data: [<?php while ($p = mysqli_fetch_array($indo)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Malaysia",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#f2800d",
                    borderColor: "#f2800d",
                    pointHoverBackgroundColor: "#f2800d",
                    pointHoverBorderColor: "#f2800d",
                    data: [<?php while ($p = mysqli_fetch_array($malay)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Thailand",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#bcf906",
                    borderColor: "#bcf906",
                    pointHoverBackgroundColor: "#bcf906",
                    pointHoverBorderColor: "#bcf906",
                    data: [<?php while ($p = mysqli_fetch_array($thai)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                },
                {
                    label: "Israel",
                    fill: false,
                    lineTension: 0.1,
                    backgroundColor: "#00394d",
                    borderColor: "#00394d",
                    pointHoverBackgroundColor: "#00394d",
                    pointHoverBorderColor: "#00394d",
                    data: [<?php while ($p = mysqli_fetch_array($israel)) { echo '"' . $p['totalcase'] . '","' . $p['totaldeath'] . '","' . $p['totalrecover'] . '","' . $p['activecase'] . '","' . $p['totalcase'] . '",';}?>]
                }
                ]
        };

var myBarChart = new Chart(ctx, {
            type: 'line',
            data: data,
            options: {
            responsive:true,
            maintainAspectRatio: false,
            legend: {
            display: true
            },
            barValueSpacing: 20,
            scales: {
            yAxes: [{
                ticks: {
                    min: 0,
                }
            }],
            xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                        }
                    }]
            }
        }
        });
</script>