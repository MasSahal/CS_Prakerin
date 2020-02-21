<?php
session_start();

include('../koneksi.php');
if (!isset($_SESSION['akun']['email_akun'])) {
    header("../index.php");
} else {
    $profile = $_SESSION['akun']['email_akun'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard | Admin</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Style -->
    <link rel="stylesheet" href="fonts/font.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/"></script>
    <script src="plugins/chart.js/Chart.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('layouts/header.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("layouts/sidebar.php"); ?>
        <!-- End Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0 text-dark">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item active">Dashboard</a></li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->

                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $akun = mysqli_query($koneksi, "SELECT * FROM tb_akun");
                                        $jml_akun = mysqli_num_rows($akun);
                                        echo $jml_akun;
                                        ?>
                                    </h3>

                                    <p>Akun Terhubung</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person"></i>
                                </div>
                                <a href="akun.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $akun = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                                        $jml_akun = mysqli_num_rows($akun);
                                        echo $jml_akun;
                                        ?>
                                    </h3>

                                    <p>Kategori</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <a href="kategori.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $akun = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan");
                                        $jml_akun = mysqli_num_rows($akun);
                                        echo $jml_akun;
                                        ?>
                                    </h3>

                                    <p>Pengaduan</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <a href="pengaduan.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>
                                        <?php
                                        $akun = rand(1, 100);
                                        echo $akun;
                                        ?>
                                    </h3>

                                    <p>Visitors Online</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="card card-success">
                                <div class="card-header">
                                    <h3 class="card-title">Grafik Data Akun</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="akun"></canvas>
                                    <script>
                                        var ctx2 = document.getElementById("akun").getContext('2d');
                                        var myChart2 = new Chart(ctx2, {
                                            type: 'pie',
                                            data: {
                                                labels: ["User", "Admin"],
                                                datasets: [{
                                                    data: [
                                                        <?php
                                                        $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE akses_akun='user'");
                                                        $pending = $sql_pending->num_rows;
                                                        echo $pending;
                                                        ?>,
                                                        <?php
                                                        $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE akses_akun='admin'");
                                                        $pending = $sql_pending->num_rows;
                                                        echo $pending;
                                                        ?>
                                                    ],
                                                    backgroundColor: [
                                                        '#61d4b3',
                                                        '#fdd365'
                                                    ],
                                                    borderColor: [
                                                        '#61d4b3',
                                                        '#fdd365'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    ticks: {
                                                        beginAtZero: false
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="card card-info">
                                <div class="card-header">
                                    <h3 class="card-title">Grafik Data Pengaduan</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="akun2"></canvas>
                                    <script>
                                        var ctx3 = document.getElementById("akun2").getContext('2d');
                                        var myChart3 = new Chart(ctx3, {
                                            type: 'doughnut',
                                            data: {
                                                labels: ["Terverifikasi", "Diproses", "Dalam Penanganan", "Selesai"],
                                                datasets: [{
                                                    data: [
                                                        <?php
                                                        $sql_pending1 = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Terverifikasi'");
                                                        $pending1 = $sql_pending1->num_rows;
                                                        echo $pending1;
                                                        ?>,
                                                        <?php
                                                        $sql_pending2 = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Diproses'");
                                                        $pending2 = $sql_pending2->num_rows;
                                                        echo $pending2;
                                                        ?>,
                                                        <?php
                                                        $sql_pending3 = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Dalam Penanganan'");
                                                        $pending3 = $sql_pending3->num_rows;
                                                        echo $pending3;
                                                        ?>,
                                                        <?php
                                                        $sql_pending4 = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Selesai'");
                                                        $pending4 = $sql_pending4->num_rows;
                                                        echo $pending4;
                                                        ?>
                                                    ],
                                                    backgroundColor: [
                                                        '#eb7070',
                                                        '#fec771',
                                                        '#64e291',
                                                        '#e6e56c'
                                                    ],
                                                    borderColor: [
                                                        '#eb7070',
                                                        '#fec771',
                                                        '#64e291',
                                                        '#e6e56c'
                                                    ],
                                                    borderWidth: 1
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    ticks: {
                                                        beginAtZero: false
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col">
                            <div class="card card-secondary">
                                <div class="card-header">

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <center>
                                        <h4 class="my-2">Data Grafik Riwayat Pengaduan</h4>
                                        <div class="col-lg-8 col-md-8 col-sm-10">
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
                                </div>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.row -->

                    <!-- Main row -->
                    <div class="row">
                        <?php
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $cari = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE nama_akun LIKE '%" . $search . "%'");

                            while ($data = mysqli_fetch_array($cari)) {

                        ?>
                                <!-- Left col -->
                                <section class="col-lg-7 connectedSortable">
                                    <!-- Main content -->
                                    <div class="content">
                                        <div class="container-fluid">
                                            <div class="card card-primary card-outline">
                                                <div class="card-header">
                                                    <h5 class="card-title m-0">Daftar Kategori Saat Ini</h5>
                                                </div>
                                                <div class="card-body">
                                                    <?php echo $data['nama_akun']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.content -->
                                    <?php var_dump($_SESSION); ?>

                                    <!-- /.card -->
                                </section>
                        <?php
                            }
                        }
                        ?>
                        <!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-5 connectedSortable">

                            <!-- /.card -->
                        </section>
                        <!-- right col -->
                    </div>
                    <!-- /.row (main row) -->
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://massahalofficial.site">Mas Sahal</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
</body>

</html>