<?php
session_start();
error_reporting(0);
include('../koneksi.php');
$profile = $_SESSION['akun']['email_akun'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Costumer Service</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
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
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper" id="content">
            <!-- Content Header -->
            <!-- <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Pengaduan - Terverfikasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Pengaduan - Terverifikasi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </!-->
            <?php

            if (isset($_GET['page'])) {
                $page = $_GET['page'];

                switch (@$page) {
                    case 'detail':
                        include('proses/detail_pengajuan.php');
                        break;
                    case 'balas':
                        include('proses/balas_pengajuan.php');
                        break;
                    case 'hapus':
                        include('proses/hapus_pengajuan.php');
                        break;
                    case 'selesai':
                        include('proses/selesai_pengajuan.php');
                        break;

                    default:
                        echo "";
                        break;
                }

            ?>
                <div class="content">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Daftar Pengaduan - Diproses</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="table1">
                                                <thead class="text-light bg-info">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Lampiran</th>
                                                        <th>Tgl Pengaduan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Dalam Penanganan' AND id_pengaduan!=$data[id_pengaduan]");
                                                    $no = 0;
                                                    while ($data = mysqli_fetch_assoc($query)) {

                                                        //pilih kat sesuai id kategori
                                                        $sql_kat = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$data[id_kategori]'");
                                                        $kat = mysqli_fetch_assoc($sql_kat);
                                                    ?>
                                                        <tr>
                                                            <td><?= $no += 1; ?></td>
                                                            <td><?= $data['nama_pengadu']; ?></td>
                                                            <td><?= $kat['kategori']; ?></td>
                                                            <td><img src="../admin/file/<?= $data['lampiran_pengaduan']; ?>" alt="<?= $data['lampiran_pengaduan']; ?>" width="100"></td>
                                                            <td><?= date('D, M Y', strtotime($data['tanggal_pengaduan'])); ?></td>
                                                            <form method="post">
                                                                <td>
                                                                <a href="?page=selesai&id=<?= $data['id_pengaduan']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Selesaikan Sekarang!"><i class="fa fa-check"></i></a>

                                                                <input type="hidden" name="id" value="<?=$data['id_pengaduan'];?>">
                                                                <button type="submit" name="hapus" onclick="return confirm('Yakin Ingin Menghapus Ini?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-alt"></i></button>
                                                                
                                                                <a href="?page=detail&id=<?= $data['id_pengaduan']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya"><i class="fa fa-angle-right"></i></a>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            <?php } elseif (!isset($_GET['page'])) { ?>
                <section class="content-header">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col-sm-6">
                                <h1>Pengaduan - Diproses</h1>
                            </div>
                            <div class="col-sm-6">
                                <ol class="breadcrumb float-sm-right">
                                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                                    <li class="breadcrumb-item"><a href="pengaduan_ver.php">Pengaduan - Diproses</a></li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /.container-fluid -->
                </section> <!-- Main content -->
                <div class="content">
                    <div class="container-fluid">
                        <div class="row mb-2">
                            <div class="col">
                                <div class="card card-primary card-outline">
                                    <div class="card-header">
                                        <h5 class="card-title m-0">Daftar Pengaduan</h5>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-hover table-striped" id="table1">
                                                <thead class="text-light bg-info">
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama</th>
                                                        <th>Kategori</th>
                                                        <th>Lampiran</th>
                                                        <th>Tgl Pengaduan</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>

                                                    <?php
                                                    $query = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE status_pengaduan='Dalam Penanganan'");
                                                    $no = 0;
                                                    while ($data = mysqli_fetch_assoc($query)) {

                                                        //pilih kat sesuai id kategori
                                                        $sql_kat = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$data[id_kategori]'");
                                                        $kat = mysqli_fetch_assoc($sql_kat);
                                                    ?>
                                                        <tr>
                                                            <td><?= $no += 1; ?></td>
                                                            <td><?= $data['nama_pengadu']; ?></td>
                                                            <td><?= $kat['kategori']; ?></td>
                                                            <td><img src="../admin/file/<?= $data['lampiran_pengaduan']; ?>" alt="<?= $data['lampiran_pengaduan']; ?>" width="100"></td>
                                                            <td><?= date('D, M Y', strtotime($data['tanggal_pengaduan'])); ?></td>
                                                            <form method="post">
                                                                <td>
                                                                <a href="?page=selesai&id=<?= $data['id_pengaduan']; ?>" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="bottom" title="Selesaikan Sekarang!"><i class="fa fa-check"></i></a>

                                                                <input type="hidden" name="id" value="<?=$data['id_pengaduan'];?>">
                                                                <button type="submit" name="hapus" onclick="return confirm('Yakin Ingin Menghapus Ini?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-alt"></i></button>
                                                                
                                                                <a href="?page=detail&id=<?= $data['id_pengaduan']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya"><i class="fa fa-angle-right"></i></a>
                                                                </td>
                                                            </form>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.content -->
            <?php } ?>
        </div>
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
        $(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function() {
            $("#table1").DataTable();
            $("#table2").DataTable();
            $('#table3').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>
<?php
if (isset($_POST['hapus'])) {
    $id_hapus = $_POST['id'];


    //hapus gambar
    $sqli = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id_hapus'");
    $dataa = mysqli_fetch_assoc($sqli);

    chdir("file/");
    chown($dataa['lampiran_pengaduan'], 'root');
    $dat = unlink(chdir("file/") . $dataa['lampiran_pengaduan']);

    $hapusi = mysqli_query($koneksi, "DELETE FROM tb_pengaduan WHERE id_pengaduan='$id_hapus'");
    
    //hapus komentar yg nyangkut dgn id_pengaduan
    mysqli_query($koneksi, "DELETE FROM tb_balasan WHERE id_pengaduan='$id_hapus'");

    if ($hapusi) {
        echo "<script>Swal.fire('Good job!','Berhasil Menghapus Pengajuan !','success')</script>";
        echo "<meta http-equiv='refresh' content='1;url=problems_ver.php'>";
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menghapus Pengajuan !'});</script>";
        echo "<meta http-equiv='refresh' content='1;url=problems_ver.php'>";
    }
}
?>