<?php
session_start();

include('../koneksi.php');
include('security_admin.php');

$tgl_awal = $_GET['awal'];
$tgl_akhir = $_GET['akhir'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE tanggal_pengaduan BETWEEN '$tgl_awal' AND '$tgl_akhir' ORDER BY tanggal_pengaduan ASC");
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Costumer Service</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="file/favicon.png">
>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="container">
            <div class="info text-center my-4">
                <h2 class="font-weight-bold">Laporan Pengaduan <?= date('d/m/Y', strtotime($tgl_awal)); ?> Sampai <?= date('d/m/Y', strtotime($tgl_akhir)); ?></h2>
            </div>
            <table class="table table-striped" id="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Tgl Pengaduan</th>
                        <th>Status Pengaduan</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    while ($data = mysqli_fetch_assoc($sql)) { ?>
                        <tr>
                            <td><?= $no += 1; ?></td>
                            <td><?= $data['nama_pengadu']; ?></td>
                            <?php $sql_kat = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$data[id_kategori]'");
                            $kat = mysqli_fetch_assoc($sql_kat);
                            ?>
                            <td><?= $kat['kategori']; ?></td>
                            <td><?= date('D, d M Y', strtotime($data['tanggal_pengaduan'])); ?></td>
                            <td><?= $data['status_pengaduan']; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
                <a href="print.php?awal=<?= $tgl_awal; ?>&akhir=<?= $tgl_akhir; ?>"></a>
            </table>
        </div>
    </div>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <script>
        window.print(); 
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    </script>
</body>

</html>