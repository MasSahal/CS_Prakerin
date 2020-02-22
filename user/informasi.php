<?php
session_start();
include('../koneksi.php');
include('security_user.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Informasi | Cs Helper</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <link rel="stylesheet" href="../admin/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/style.css">
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
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
    <!-- Font Style -->
    <link rel="stylesheet" href="../admin/fonts/font.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <style>

    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <?php include('layouts/header.php'); ?>
        
    <!-- wrapper kategori masalah -->
    <div class="wrapper">
        <div class="container p-5">
            <div class="col text-center mb-5">
                <h1 style="font-family: 'Nunito', sans-serif;"><b>Mading Informasi Terkini</b></h1>
            </div>
            <div class="row">
                <div class="col-8">
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_informasi ORDER BY tanggal_info DESC");
                    while ($data = mysqli_fetch_assoc($sql)) {
                        $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$data[id_akun]'");
                        $data2 = mysqli_fetch_assoc($sql2);
                    ?>
                        <div class="card <?php if($data['jenis_info']=='Penting'){ echo 'card-warning';} else if($data['jenis_info']=='Darurat'){ echo 'card-danger';}else{echo'card-secondary';}?> card-outline card-info mb-4">
                            <div class="card-header">
                                <div class="user-block">
                                    <img class="img-circle" src="../admin/file/user/<?= $data2['foto_akun']; ?>" alt="User Image">
                                    <span class="username text-primary"><?= $data2['username_akun']; ?></span>
                                    <span class="description"><?php
                                        if ($data['status_info'] == 'Diperbarui') {
                                            echo $data['status_info'] . " - ";
                                        }
                                        echo time_elapsed_string($data['tanggal_info']);
                                        ?></span>
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
                            <div class="card-body p-4">
                                <?= $data['info']; ?>
                            </div>
                            <?php if ($data['jenis_info'] == 'Penting') { ?>
                                <div class="card-footer">
                                    <span class="text-warning font-weight-bold">Informasi Penting !</span>
                                </div>
                            <?php } elseif ($data['jenis_info'] == 'Darurat') { ?>
                                <div class="card-footer">
                                    <span class="text-danger font-weight-bold">Informasi Darurat !</span>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } ?>
                </div>
                <div class="col-4">
                    <div class="text-body mb-5 mt-2">
                        <h2 class="font-weight-bold text-center text-black-50">Kategori Masalah</h2>
                    </div>
                    <?php
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                    while ($data = mysqli_fetch_assoc($sql)) {
                    ?>
                        <div class="card card-outline card-success hover mb-4 m-2 collapsed-card">
                            <div class="card-header">
                                <h5 class="card-title font-weight-bold text-black-50"><?= $data['kategori']; ?></h5>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <p><?= $data['subjek_kategori']; ?></p>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <!-- wrapper kategori masalah -->

    <!-- wrapper about -->
    <div class="wrapper bg-gradient-light">

    </div>
    <!-- wrapper about -->
    <?php
    function time_elapsed_string($datetime, $full = false)
        {
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

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
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