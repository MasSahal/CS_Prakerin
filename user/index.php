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
    <link rel="stylesheet" href="assets/style.css">
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
    <link rel="stylesheet" href="../admin/dist/css/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <?php include('layouts/header.php');?>

    <!-- end wrapper form-->
    <div class="wrapper">
        <div class="jumbotron-fluid mb-0 p-5">
            <div class="row justify-content-center mb-5">
                <div class="col text-light">
                    <h1 style="font-family: 'Nunito', sans-serif;" class=" text-center"><b>Selamat Datang di Web Pelayanan Pengaduan</b></h1>
                    <p class="lead text-center"><b>Cs.helper</b> adalah layanan yang bertujuan untuk mengajukan pengaduan masalah.</p>
                    <hr class="my-4">
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="container">
                        <div class="card p-4 shadow">
                            <form method="post" enctype="multipart/form-data"">
                                <div class=" form-group">
                                <label for="nama">Nama<span style="color:rgb(190, 0, 0)">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan nama" value="<?= $_SESSION['akun']['username_akun']; ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="email">Email<span style="color:rgb(190, 0, 0)">*</span></label>
                            <input type="email" name="email" id="email" class="form-control" placeholder="Masukan email" value="<?= $_SESSION['akun']['email_akun']; ?>" aria-describedby="helpId">
                        </div>
                        <div class="form-group">
                            <label for="masalah">Masalah<span style="color:rgb(190, 0, 0)">*</span></label>
                            <textarea name="masalah" id="masalah" rows="7" class="form-control" placeholder="Masukan permasalahan"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="kategori">Kategori<span style="color:rgb(190, 0, 0)">*</span></label>
                            <select name="kategori" id="kategori" class="form-control select2-purple">
                                <option>Pilih Kategori Permasalahan</option>
                                <?php
                                $sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                                while ($data = mysqli_fetch_assoc($sql)) { ?>
                                    <option value="<?= $data['id_kategori']; ?>"><?= $data['kategori']; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="file">Lampiran<span style="color:rgb(190, 0, 0)">*</span></label>
                            <input type="file" class="form-control-file" id="file" name="file">
                            <small>Maksimal size 2 Mb</small>
                        </div>
                        <div class="col-12">
                            <table class="float-right">
                                <tr>
                                    <td class="pt-2">
                                        <input type="radio" name="jenis" value="Public" checked>
                                        <label>Public</label>&nbsp;
                                    </td>
                                    <td class="pt-2">
                                        <input type="radio" name="jenis" value="Private">
                                        <label>Private</label>
                                    </td>
                                    
                                    <td><button type="submit" name="pengaduan" class="btn btn-info btn-md ml-5"><span>&nbsp; Kirim Pengaduan&nbsp;</span></button></td>
                                </tr>
                            </table>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- wrapper timeline -->
    <div class="wrapper" id="timeline">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="table-responsive">
                        <table class="table table-borderless" cellpadding="0" cellspacing="0">
                            <tr>
                                <td>
                                    <center><img src="img/pengaduan.png" alt="1x24jam.png" width="100"class="thumbnail m-2"></center>
                                </td>
                                <td>
                                    <center><img src="img/tinjau.png" alt="1x24jam.png" width="100"class="thumbnail m-2"></center>
                                </td>
                                <td>
                                    <center><img src="img/1x24.png" alt="1x24jam.png" width="100"class="thumbnail m-2"></center>
                                </td>
                                <td>
                                    <center><img src="img/selesai.png" alt="1x24jam.png" width="100"class="thumbnail m-2"></center>
                                </td>
                            </tr>
                            <tr align="center" class="text-white">
                                <td>
                                    <h5 class="font-weight-bold">Kirim Pengaduan</h5>
                                </td>
                                <td>
                                    <h5 class="font-weight-bold">Laporan Ditinjau</h5>
                                </td>
                                <td>
                                    <h5 class="font-weight-bold">Diproses 1x24 Jam</h5>
                                </td>
                                <td>
                                    <h5 class="font-weight-bold">Selesai</h5>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wrapper timeline -->

    <!-- wrapper about -->
    <div class="wrapper m-5">
        <div class="container-maps" id="maps">
            <h2 class="font-weight-bold text-center mt-3 mb-3">Layanan Tersebar Luas Ke Seluruh Indonesia</h2>
            <img src="img/indonesia.png" width="100%" alt="">
        </div>
    </div>
    <!-- wrapper about -->
    
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

<?php
if (isset($_POST['pengaduan'])) {

    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $masalah = $_POST['masalah'];
    $kategori = $_POST['kategori'];
    $jenis = $_POST['jenis'];

    //replace enter ke tag <br>
    $masalah = str_replace(array("\r\n", "\r", "\n"), "<br/>", $masalah);

    //set default ke jakarta
    date_default_timezone_set('ASIA/JAKARTA');
    $tanggal = date('Y-m-d H:i:s');

    //ambil data kategori
    $sql_kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$kategori'");
    $kategori = mysqli_fetch_assoc($sql_kategori);
    $id_kategori = $kategori['id_kategori'];

    //ambil id_akun dari session saat ini
    $id_akun_saya = $_SESSION['akun']['id_akun'];

    //ekstensi yg diperbolehkan
    $ekstensi_diterima = array('png', 'jpg', 'jpeg', 'jfif');

    //ambil nama data gambar
    $nama_file = $_FILES['file']['name'];

    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));

    $tmp_file = $_FILES['file']['tmp_name'];
    $size_file = $_FILES['file']['size'];

    //jika $ekstensi dan $ekstensi_diterima bernilai sama
    if (in_array($ekstensi, $ekstensi_diterima) === true) {

        //jika file kurang dari sama dengan 2088140 bytes atau 2 mb
        if ($size_file < 2088140) {

            //pindahkan file ke direktori file di admin
            move_uploaded_file($tmp_file, '../admin/file/' . $nama_file);

            $sql = "INSERT into tb_pengaduan (id_kategori, id_akun, nama_pengadu, deskripsi_pengaduan, lampiran_pengaduan, tanggal_pengaduan, jenis_pengaduan)
                        VALUES ('$id_kategori','$id_akun_saya','$nama','$masalah','$nama_file','$tanggal','$jenis')";
            $lapor = mysqli_query($koneksi, $sql);
            if ($lapor) {
                echo "<script>Swal.fire('Good job!','Berhasil mengirim pengaduan !','success')</script>";
                echo "<meta http-equiv='refresh' content='2;url=index.php'>";
            } else {
                echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal mengajukan pengaduan !'});</script>";
                echo "<meta http-equiv='refresh' content='2;url=index.php'>";
            }
        } else {
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'File terlalu besar !'});</script>";
            echo "<meta http-equiv='refresh' content='2;url=index.php'>";
        }
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'File tidak valid !',text: 'Gunakan ekstensi png, jpg dan jpeg'});</script>";
        echo "<meta http-equiv='refresh' content='2;url=index.php'>";
    }
}
?>