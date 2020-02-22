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
    <title>Akun | Cs Helper</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <link rel="stylesheet" href="assets/style_akun.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../admin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
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
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <?php include('layouts/header.php'); ?>
    <div class="wrapper">
        <div class="container">
            <!-- wrapper akun saya-->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <?php
                $id_profile = $_SESSION['akun']['id_akun'];
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$id_profile'");
                $data = mysqli_fetch_assoc($sql);
                ?>
                <div class="widget-user-header text-white" id="bg-user">
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="../admin/file/user/<?=$data['foto_akun'];?>" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row justify-content-center">
                        <div class="col-16 text-center mb-4">
                            <?php
                            if (isset($_GET['username'])) { ?>
                                <form method="post">
                                    <div class="form-group">
                                        <table>
                                            <tr>
                                                <td>
                                                    <input type="text" name="username" id="username" class="form-control-sm" value="<?= $data['username_akun']; ?>">
                                                </td>
                                                <td>
                                                    <input type="submit" class="btn btn-sm btn-outline-secondary">
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </form>
                            <?php } else if (!isset($_GET['username'])) { ?>
                                <table>
                                    <tr>
                                        <td><a href="?username"><i class="fa fa-edit"></i></a></td>
                                        <td>
                                            <h2 class="widget-user-username pr-4"><?= $data['username_akun']; ?></h2>
                                        </td>
                                    </tr>
                                </table>

                            <?php } ?>
                            <h5 class="widget-user-desc">Customer</h5>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">
                                    <?php
                                    $pengaduan = mysqli_query($koneksi,"SELECT * FROM tb_pengaduan WHERE id_akun='$id_profile'");
                                    echo mysqli_num_rows($pengaduan);
                                    ?>
                                </h5>
                                <span class="description-text">PENGAJUAN</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">
                                    <?php
                                    $otw = mysqli_query($koneksi,"SELECT * FROM tb_pengaduan WHERE id_akun='$id_profile' AND status_pengaduan!='Terverifikasi' AND status_pengaduan!='Selesai'");
                                    echo mysqli_num_rows($otw);
                                    ?>
                                </h5>
                                <span class="description-text">SEDANG DIPROSES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">
                                    <?php
                                    $selesai = mysqli_query($koneksi,"SELECT * FROM tb_pengaduan WHERE id_akun='$id_profile' AND status_pengaduan='Selesai'");
                                    echo mysqli_num_rows($selesai);
                                    ?>
                                </h5>
                                <span class="description-text">SELESAI</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <div class="card card-light collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Motto</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-12">
                        <a href="?motto#motto"><h3 style="font-family: 'Nunito', sans-serif;" class="text-center text-dark my-2" id="motto"><b>Motto</b></h3></a>
                        <hr>
                    </div>
                    <?php if (isset($_GET['motto'])) { ?>
                        <form method="post">
                            <textarea name="motto_saya" rows="7"class="form-control"><?=str_replace("<br/>","\n", $data['motto_akun']); ?></textarea>
                            <button type="submit" name="ubah_motto" class="btn btn-sm btn-info my-3">Simpan</button>
                        </form>
                    <?php } else{ ?>
                        <p><?=$data['motto_akun']; ?></p>
                    <?php } ?>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Profile Akun</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body" id="profilesaya">
                    <div class="row p-4">
                        <div class="col-12">
                            <h3 style="font-family: 'Nunito', sans-serif;" class="text-center my-2"><b>Profile Saya</b></h3>
                            <hr>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <table class="table table-borderless">
                                <!-- field table bagian telepon -->
                                <?php
                                if (isset($_GET['telepon'])) {
                                ?>
                                    <tr id="border-right">
                                        <th>Telepon</th>
                                        <td>:</td>
                                        <form method="post">
                                            <td>
                                                <span>+62 </span><input type="number" min="1" name="telepon" id="telepon" value="<?= $data['telepon_akun']; ?>" class="form-control-sm">
                                                <input type="submit" class="btn btn-sm btn-outline-secondary" name="ok_telepon" value="Ok">
                                            </td>
                                        </form>
                                    </tr>
                                <?php } else if (!isset($_GET['telepon'])) { ?>
                                    <tr>
                                        <th><a href="?telepon#profilesaya"><i class="fa fa-edit"></i></a> Telepon</th>
                                        <td>:</td>
                                        <td><?= $data['telepon_akun']; ?></td>
                                    </tr>
                                <?php } ?>
                                <tr>

                                    <!-- field table bagian email -->
                                    <?php
                                    if (isset($_GET['email'])) {
                                    ?>
                                <tr id="border-right">
                                    <th>E-mail</th>
                                    <td>:</td>
                                    <form method="post">
                                        <td>
                                            <input type="email" id="email" name="email" value="<?= $data['email_akun']; ?>" class="form-control-sm">
                                            <input type="submit" class="btn btn-sm btn-outline-secondary" name="ok_email" value="Ok">
                                        </td>
                                    </form>
                                </tr>
                            <?php } else if (!isset($_GET['email'])) { ?>
                                <tr>
                                    <th><a href="?email#profilesaya"><i class="fa fa-edit"></i></a> E-mail</th>
                                    <td>:</td>
                                    <td><?= $data['email_akun']; ?></td>
                                </tr>
                            <?php } ?>

                            <tr>
                                <th><i class="fa fa-edit" onclick="Swal.fire({icon: 'warning',title: 'Akses Dilarang !'});"></i> Status</th>
                                <td>:</td>
                                <td><?= $data['status_akun']; ?></td>
                            </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th><i class="fa fa-edit" onclick="Swal.fire({icon: 'warning',title: 'Akses Dilarang !'});"></i> Registrasi Akun</th>
                                    <td>:</td>
                                    <td><?= $data['registrasi_akun']; ?></td>
                                </tr>
                                <tr>
                                    <th><i class="fa fa-edit" data-toggle="modal" data-target="#gantipw"></i> Passowrd</th>
                                    <td>:</td>
                                    <td><a href="#" data-toggle="modal" data-target="#gantipw" class="text-link">Ganti Password</a></td>
                                </tr>

                                <!-- field table bagian Alamat -->
                                <?php
                                if (isset($_GET['alamat'])) {
                                ?>
                                    <tr id="border-right">
                                        <th>Alamat</th>
                                        <td>:</td>
                                        <form method="post">
                                            <td>
                                                <input type="email" min="1" name="alamat" id="alamat" value="<?= $data['alamat_akun']; ?>" class="form-control-sm">
                                                <input type="submit" class="btn btn-sm btn-outline-secondary" name="ok_alamat" value="Ok">
                                            </td>
                                        </form>
                                    </tr>
                                <?php } else if (!isset($_GET['alamat'])) { ?>
                                    <tr>
                                        <th><a href="?alamat#profilesaya"><i class="fa fa-edit"></i></a> Alamat</th>
                                        <td>:</td>
                                        <td><?= $data['alamat_akun']; ?></td>
                                    </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end wrapper akun saya -->

            <!-- Modal Ganti Pw-->
            <div class="modal fade" id="gantipw" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Ganti Password</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="passlama">Password Lama</label>
                                    <input type="text" name="passlama" id="passlama" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="passbaru">Password Baru</label>
                                    <input type="text" name="passbaru" id="passbaru" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="passbaru2">Ulangi Password Baru</label>
                                    <input type="text" name="passbaru2" id="passbaru2" class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Minimal 10 Karakter</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" name="gantipassword" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- wrapper footer -->
    <div class="wrapper">
        <div class="container">
            <footer class="py-4 text-center border-top mt-5">
                <strong>Copyright &copy; 2014 - <?= date('Y'); ?> <a href="index.php">CS Helper</a>.</strong>
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

</body>

</html>
<?php
if (isset($_POST['ok_telepon'])) {
    $telepon = $_POST['telepon'];

    if ($telepon == $data['telepon_akun']) {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'No telepon sudah terdaftar !'});</script>";
        echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#profilesaya'>";
    } else {
        $ubh_telepon = mysqli_query($koneksi, "UPDATE tb_akun SET telepon_akun='$telepon' WHERE id_akun='$data[id_akun]'");

        if (!$ubh_telepon) {
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal ubah no telepon !'});</script>";
            echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#profilesaya'>";
        } else {
            echo "<script>Swal.fire('Good job!','Berhasil ubah no telepon !','success')</script>";
            echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#profilesaya'>";
        }
    }
}

if (isset($_POST['ok_email'])) {
    $email = $_POST['email'];

    if ($email == $data['email_akun']) {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Email sudah terdaftar !'});</script>";
        echo "<meta http-equiv='refresh' content='0;url=akun_saya.php#profilesaya'>";
    } else {
        $ubh_email = mysqli_query($koneksi, "UPDATE tb_akun SET email_akun='$email' WHERE id_akun='$data[id_akun]'");

        if (!$ubh_email) {
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal ubah email !'});</script>";
        } else {
            echo "<script>Swal.fire('Good job!','Berhasil ubah email !','success')</script>";
            echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#profilesaya'>";
        }
    }
}

if (isset($_POST['ok_alamat'])) {
    $alamat = $_POST['alamat'];
    $ubh_email = mysqli_query($koneksi, "UPDATE tb_akun SET alamat_akun='$alamat' WHERE id_akun='$data[id_akun]'");

    if (!$ubh_alamat) {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal ubah alamat !'});</script>";
    } else {
        echo "<script>Swal.fire('Good job!','Berhasil ubah alamat !','success')</script>";
        echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#profilesaya'>";
    }
}

if (isset($_POST['gantipassword'])) {
    $password_lama = md5($_POST['passlama']);
    $password_baru = $_POST['passbaru'];
    $password_baru2 = $_POST['passbaru2'];

    if ($password_lama !== $data['password_akun']) {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password salah !'});</script>";
    } else {
        if ($password_baru !== $password_baru2) {
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password tidak sama !'});</script>";
        } else {
            if (strlen($password_baru) < 9) {
                echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password minimal 10 karakter'});</script>";
            } else {
                if (md5($password_baru) == $data['password_akun']) {
                    echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password sedang digunakan !'});</script>";
                } else {
                    $ubh_password = mysqli_query($koneksi, "UPDATE tb_akun SET password_akun=md5('$password_baru2') WHERE id_akun='$data[id_akun]'");

                    echo "<script>Swal.fire('Good job!','Berhasil mengubah password !','success')</script>";
                    echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#profilesaya'>";
                }
            }
        }
    }
}
if (isset($_POST['ubah_motto'])) {
    $motto = $_POST['motto_saya'];

    //replace enter ke tag <br>
    $motto = str_replace(array("\r\n", "\r", "\n"), "<br/>", $motto);

    $ubh_motto = mysqli_query($koneksi, "UPDATE tb_akun SET motto_akun='$motto' WHERE id_akun='$data[id_akun]'");

        if (!$ubh_motto) {
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal ubah motto anda !'});</script>";
            echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#motto'>";
        } else {
            echo "<script>Swal.fire('Good job!','Berhasil ubah motto!','success')</script>";
            echo "<meta http-equiv='refresh' content='2;url=akun_saya.php#motto'>";
        }
}