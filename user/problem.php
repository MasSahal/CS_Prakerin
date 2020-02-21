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
    <link rel="stylesheet" href="../admin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
    <link rel="stylesheet" href="../admin/dist/css/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
    <!-- Font Style -->
    <link rel="stylesheet" href="../admin/fonts/font.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>
        #close{
            color:transparent;
        }
        #close:hover{
            color:darkgray;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <?php include('layouts/header.php');?>

    <!-- end wrapper form-->
    <div class="wrapper">
        <div class="container mb-0 p-5">
            <div class="row justify-content-center mb-4">
                <div class="col text-dark">
                    <h1 style="font-family: 'Nunito', sans-serif;" class="text-center"><b>Selamat Datang di Web Pelayanan Pengaduan</b></h1>
                    <p class="lead text-center"><b>Cs.helper</b> adalah layanan yang bertujuan untuk mengajukan pengaduan masalah.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE jenis_pengaduan='Public'");
                    while ($data = mysqli_fetch_assoc($sql)) {
                        $foto = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$data[id_akun]'");
                        $foto_akun = mysqli_fetch_assoc($foto);
                    ?>
                    <div class="card card-info card-outline card-widget mb-4">
                        <div class="card-header">
                            <div class="user-block">
                                <img class="img-circle" src="../admin/file/user/<?=$foto_akun['foto_akun'];?>" alt="User Image">
                                <span class="username text-primary"><?=$data['nama_pengadu'];?></span>
                                <span class="description"><?=time_elapsed_string($data['tanggal_pengaduan']);?></span>
                            </div>
                            <!-- /.user-block -->
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                                    <i class="far fa-circle"></i></button>
                                <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                            <!-- /.card-tools -->
                        </div>
                        <!-- /.card-header -->
                        <!-- /.card-body -->
                        <div class="card-body">
                            <div class="bg-dark">
                                <center>
                                    <img class="img-fluid pad" src="../admin/file/<?=$data['lampiran_pengaduan'];?>" alt="Photo">
                                </center>
                            </div>
                            <?php
                            $id_kat = $data['id_kategori'];
                            $kat = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$id_kat'");
                            while ($kat2 = mysqli_fetch_array($kat)) {
                                echo"<h3 class='font-weight-bold my-3'>{$kat2['kategori']}</h3>";
                            }
                            ?>
                            <p><?=$data['deskripsi_pengaduan'];?></p>
                        </div>                        
                    </div>
                    <?php } ?>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 px-4" style="position:no-scroll;float:right">
                    <table class="table table-borderless">
                        <thead><tr><th  class="text-center">Filter</th></tr></thead>
                        <tr><td><a href="#" class="btn btn-block btn-default">Sub-menu</a></td></tr>
                        <tr><td><a href="#" class="btn btn-block btn-default">Sub-menu</a></td></tr>
                        <tr><td><a href="#" class="btn btn-block btn-default">Sub-menu</a></td></tr>
                        <tr><td><a href="#" class="btn btn-block btn-default">Sub-menu</a></td></tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

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
    <?php
    function time_elapsed_string($datetime, $full = false) {
        date_default_timezone_set('ASIA/JAKARTA');
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
    
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
    
        $string = array(
            'y' => 'Tahun',
            'm' => 'Bulan',
            'w' => 'Minggu',
            'd' => 'Hari',
            'h' => 'Jam',
            'i' => 'Menit',
            's' => 'Detik',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' yang' : ' yang');
            } else {
                unset($string[$k]);
            }
        }
    
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' lalu' : 'baru saja';
    }
    ?>
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
    <!-- SweetAlert2 -->
    <script src="../admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../admin/plugins/toastr/toastr.min.js"></script>
    <!-- DataTables -->
    <script src="../admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

</body>

</html>

<?php

if (isset($_POST['komen'])) {
    $id_pengaduan = $_POST['id_pengaduan'];
    $id_yg_komen = $_SESSION['akun']['id_akun'];
    $username_yg_komen = $_SESSION['akun']['username_akun'];
    $komentar = $_POST['message'];

    //set default ke jakarta
    date_default_timezone_set('ASIA/JAKARTA');
    $tanggal = date('Y-m-d H:i:s');

    $sql = mysqli_query($koneksi, "INSERT INTO tb_komentar (id_pengaduan, id_akun, username_komentar, komentar, tanggal_komentar) VALUES ('$id_pengaduan','$id_yg_komen','$username_yg_komen','$komentar','$tanggal')");
    if ($sql) {
        echo "<meta http-equiv='refresh' content='0;url=problem.php'>";
    }else{
        echo "<script>Swal.fire({icon: 'error',title: 'Kesalahan'});</script>";
        echo "<meta http-equiv='refresh' content='2;url=problem.php'>";
    }
}
if (isset($_POST['hapus_komentar'])) {
    $id_komen = $_POST['id_komentar'];
    $sql = mysqli_query($koneksi, "DELETE FROM tb_komentar WHERE id_komentar='$id_komen'");
    if ($sql) {
        echo "<script>Swal.fire('Good job!','Berhasil menghapus komentar !','success')</script>";
        $id_komen-=1;
        echo "<meta http-equiv='refresh' content='2;url=problem.php#komentar'>";
    }else{
        echo "<script>Swal.fire({icon: 'error',title: 'Kesalahan'});</script>";
        echo "<meta http-equiv='refresh' content='2;url=problem.php'>";
    }
}
?>