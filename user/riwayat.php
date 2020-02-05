<?php
session_start();
include('../koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Costumer Service</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../admin/sweetalert2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../admin/plugins/toastr/toastr.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <script src="assets/dist/chart.js"></script>
    <script src="assets/dist/chart.min.js"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include('layouts/header.php'); ?>
        <!-- /.navbar -->
        <div class="container">
            <?php
            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                switch ($page) {
                    case 'batalkan':
                        include('proses/detail_riwayat.php');
                        break;
                    
                    case 'detail':
                        include('proses/detail_riwayat.php');
                        break;
                    
                    default:
                        echo"";
                        break;
                } 
                
            }else if(!isset($_GET['page'])){
            
            ?>
                <div class="row">
                    <div class="col-12">
                        <h3 style="font-family: 'Nunito', sans-serif;" class="text-center mt-3"><b>Riwayat Pengaduan</b></h3>
                        <hr>
                    </div>
                </div>
                <div class="table">
                    <table class="table table-bordered table-hover" id="table">
                        <thead class="bg-light">
                            <tr>
                                <th>No</th>
                                <th>Kategori</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;
                            $id_profile = $_SESSION['akun']['id_akun'];
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_kategori ON tb_pengaduan.id_kategori=tb_kategori.id_kategori WHERE id_akun='$id_profile'");
                            while ($data = mysqli_fetch_array($sql)) {
                            ?>
                                <tr>
                                    <td><?= $no += 1; ?></td>
                                    <td><?= $data['kategori']; ?></td>
                                    <td>
                                        <?= "Pukul " . date('H:i:s - D d, M Y', strtotime($data['tanggal_pengaduan'])); ?>
                                    </td>
                                    <td><?= $data['status_pengaduan']; ?></td>
                                    <td>
                                        <?php if ($data['status_pengaduan'] == "Terverifikasi") { ?>
                                            <button type="submit" name="batalkan" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Btalkan Pengaduan"><i class="fa fa-times"></i></button>
                                        <?php }else{ ?>
                                            <button type="submit" class="btn btn-sm btn-secondary disabled"><i class="fa fa-times"></i></button>
                                        <?php } ?>
                                            <a href="?page=detail&id=<?=$data['id_pengaduan'];?>" class="btn btn-sm btn-primary"><i class="fa fa-angle-right" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
                <div class="container-fluid mt-5">
                    <div class="justify-content-center my-4">
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
                                        label: '# of Votes',
                                        data: [
                                            <?php
                                            $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Terverifikasi' AND id_akun='$id_profile'");
                                            $pending = $sql_pending->num_rows;
                                            echo $pending;
                                            ?>,
                                            <?php
                                            $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Diproses' AND id_akun='$id_profile'");
                                            $pending = $sql_pending->num_rows;
                                            echo $pending;
                                            ?>,
                                            <?php
                                            $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Dalam Penanganan' AND id_akun='$id_profile'");
                                            $pending = $sql_pending->num_rows;
                                            echo $pending;
                                            ?>,
                                            <?php
                                            $sql_pending = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Selesai' AND id_akun='$id_profile'");
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

            <!-- /.content-wrapper -->

            <!-- back to top-->
            <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                <i class="fas fa-chevron-up text-white"></i>
            </a>
            <!-- back to top-->

            <!-- wrapper footer -->
            <div class="wrapper">
                <div class="container">
                    <footer class="py-4 text-center border-top mt-5">
                        <strong>Copyright &copy; 2014-2019 <a href="http://massahalofficial.site">Mas Sahal</a>.</strong>
                        All rights reserved.
                        <div class="float-right d-sm-inline-block">
                            <b>Version</b> 1.0
                        </div>
                    </footer>
                </div>
            </div>
            <!-- wrapper footer -->

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
    <!-- ./wrapper -->
    
    <!-- jQuery -->
    <script src="../admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../admin/plugins/sparklines/sparkline.js"></script>
    <script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../admin/plugins/moment/moment.min.js"></script>
    <script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../admin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../admin/dist/js/demo.js"></script>
    <!-- tooltip pooper -->
    <script src="../admin/popper/popper.min.js"></script>
    <!-- DataTables -->
    <script src="../admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function() {
            $("#table").DataTable();
        });
    </script>
    <script>
        $(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>

</body>

</html>