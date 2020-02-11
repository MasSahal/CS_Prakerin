<?php $koneksi = new mysqli('localhost','root','','db_customer_service');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- ChartJS -->
    <script src="plugins/chart.js"></script>
    <script src="plugins/chart.js"></script>
    <script src="plugins/chart.js/chart.min.js"></script>
    <title>Document</title>
</head>
<body>
  <div class="card-body">
  <?php
                        $sql_pending = $koneksi->query("SELECT * FROM tb_pengaduan");
                        $pending = $sql_pending->num_rows;
                        echo $pending;
                        ?>
    <center>
        <h4 class="my-2">Data Grafik Riwayat Pengaduan</h4>
        <div class="col-lg-6 col-md-6 col-sm-10">
            <canvas id="myChart"></canvas>
        </div>
    </center>
    <script>
        var ctx = document.getElementById("myChart").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["Terverifikasi", "Diproses", "Dalam Penanganan", "Selesai"],
                datasets: [{
                    label: 'Status',
                    data: [
                        <?php
                        $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Terverifikasi'");
                        $pending = $sql_pending->num_rows;
                        echo $pending;
                        ?>,
                        <?php
                        $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Diproses'");
                        $pending = $sql_pending->num_rows;
                        echo $pending;
                        ?>,
                        <?php
                        $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Dalam Penanganan'");
                        $pending = $sql_pending->num_rows;
                        echo $pending;
                        ?>,
                        <?php
                        $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Selesai'");
                        $pending = $sql_pending->num_rows;
                        echo $pending;
                        ?>
                    ],
                    backgroundColor: [
                        'rgb(255, 99, 132)',
                        'rgb(54, 162, 235)',
                        'rgb(255, 206, 86)',
                        'rgb(153, 102, 255)'
                    ],
                    borderColor: [
                        'rgba(255,99,132,1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(153, 102, 255, 1)'
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
</>
</body>
</html>