<?php
session_start();

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
    <div class="popup"></div>
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      

      <!-- Proses Php-->
      <?php
      if (isset($_GET['page'])) {
        $page = $_GET['page'];

        switch ($page) {
          case 'edit_akun':
            include("proses/edit_akun.php");
            break;
          case 'hapus':
            include("proses/hapus.php");
            break;
          case 'aktif_akun':
            include("proses/aktifkan_akun.php");
            break;
          case 'nonaktifkan_akun':
            include("proses/nonaktifkan_akun.php");
            break;
          case 'info_akun':
            include("proses/info_akun.php");
            break;
        }
      ?>
      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Daftar Akun</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table1">
                      <thead class="text-light bg-info">
                        <tr>
                          <th>No</th>
                          <th>username</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Akses Akun</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $id_profile = $_SESSION['akun']['id_akun'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun!='$data[id_akun]' AND id_akun!='$id_profile'");
                        $no = 0;
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                          <tr>
                            <td><?= $no += 1; ?></td>
                            <td><?= $data['username_akun']; ?></td>
                            <td><?= $data['email_akun']; ?></td>
                            <td><?= $data['status_akun']; ?></td>
                            <td><?= $data['akses_akun']; ?></td>
                            <td>
                              <a href="?page=edit_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                              <a href="?page=hapus_akun&id=<?= $data['id_akun']; ?>" onclick="return confirm('Yakin Ingin Menghapus Ini?')" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-alt"></i></a>

                              <?php if ($data['status_akun'] == 'Tidak Aktif') { ?>
                                <a href="?page=aktif_akun&id=<?= $data['id_akun']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Aktifkan"><i class="fa fa-lock-open"></i></a>
                              <?php } elseif ($data['status_akun'] == 'Aktif') { ?>
                                <a href="?page=nonaktifkan_akun&id=<?= $data['id_akun']; ?>" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Non-Aktifkan"><i class="fa fa-lock"></i></a>
                              <?php } ?>

                              <a href="?page=info_akun&id=<?= $data['id_akun']; ?>" class="btn btn-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya"><i class="fa fa-angle-right"></i></a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="mt-3">
                    <a href="#" data-toggle="modal" data-target="#tambahuser" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah User</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content -->
      
      <?php
      }else if(!isset($_GET['page'])){
      ?>
      <!-- /end proses -->
      
      <!-- Content Header -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Akun Terdaftar</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                <li class="breadcrumb-item active">Akun Terdaftar</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <div class="content">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h5 class="card-title m-0">Daftar Akun</h5>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped" id="table1">
                      <thead class="text-light bg-info">
                        <tr>
                          <th>No</th>
                          <th>username</th>
                          <th>Email</th>
                          <th>Status</th>
                          <th>Akses Akun</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <tbody>

                        <?php
                        $id_profile = $_SESSION['akun']['id_akun'];
                        $query = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun!='$id_profile'");
                        $no = 0;
                        while ($data = mysqli_fetch_assoc($query)) {
                        ?>
                          <tr>
                            <td><?= $no += 1; ?></td>
                            <td><?= $data['username_akun']; ?></td>
                            <td><?= $data['email_akun']; ?></td>
                            <td><?= $data['status_akun']; ?></td>
                            <td><?= $data['akses_akun']; ?></td>
                            <td>
                              <a href="?page=edit_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-warning btn-sm" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                              <a href="?page=hapus_akun&id=<?= $data['id_akun']; ?>" onclick="return confirm('Yakin Ingin Menghapus Ini?')" class="btn  btn-danger btn-sm" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-trash-alt"></i></a>

                              <?php if ($data['status_akun'] == 'Tidak Aktif') { ?>
                                <a href="?page=aktif_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Aktifkan"><i class="fa fa-lock-open"></i></a>
                              <?php } elseif ($data['status_akun'] == 'Aktif') { ?>
                                <a href="?page=nonaktifkan_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-info btn-sm" data-toggle="tooltip" data-placement="bottom" title="Non-Aktifkan"><i class="fa fa-lock"></i></a>
                              <?php } ?>

                              <a href="?page=info_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-secondary btn-sm" data-toggle="tooltip" data-placement="bottom" title="Selengkapnya"><i class="fa fa-angle-right"></i></a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                  <div class="mt-3">
                    <a href="#" data-toggle="modal" data-target="#tambahakun" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Akun</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.content -->

      <!-- Modal Tambah Akun-->
    <div class="modal fade" id="tambahakun" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post">
            <div class="modal-body">
              <div class="container-fluid">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" required placeholder="Username">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user-alt"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" required placeholder="Email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="telepon" required placeholder="No Hp">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" required placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-key"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password2" required placeholder="Retype password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-key"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <textarea type="text" class="form-control pr-sm-1" name="alamat" id="alamat" required placeholder="Alamat"></textarea>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-briefcase"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <select class="form-control" name="akses" required>
                      <option value="">-- Akses Akun --</option>
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                  </select>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fa fa-arrow-circle-down"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahakun" class="btn btn-primary btn-sm">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    </div>
    <!-- /.content-wrapper -->

    <!-- Modal Tambah Akun-->
    <div class="modal fade" id="tambahakun" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title">Tambah Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form method="post">
            <div class="modal-body">
              <div class="container-fluid">
                <div class="input-group mb-3">
                  <input type="text" class="form-control" name="username" required placeholder="Username">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-user-alt"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="email" class="form-control" name="email" required placeholder="Email">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-envelope"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="number" class="form-control" name="telepon" required placeholder="No Hp">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-phone"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password" required placeholder="Password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-key"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <input type="password" class="form-control" name="password2" required placeholder="Retype password">
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-key"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <textarea type="text" class="form-control pr-sm-1" name="alamat" id="alamat" required placeholder="Alamat"></textarea>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fas fa-briefcase"></span>
                    </div>
                  </div>
                </div>
                <div class="input-group mb-3">
                  <select class="form-control" name="akses" required>
                      <option value="">-- Akses Akun --</option>
                      <option value="user">User</option>
                      <option value="admin">Admin</option>
                  </select>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <span class="fa fa-arrow-circle-down"></span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
              <button type="submit" name="tambahuser" class="btn btn-primary btn-sm">Tambah</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <?php } ?>
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
  <!-- Popper jquery -->
  <script src="plugins/popper/popper.min.js"></script>
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
      <script>
  
  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });

  </script>
</body>

</html>

<?php

if (isset($_POST['tambahakun'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];
  $alamat = $_POST['alamat'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $akses = $_POST['akses'];
  $date = date('Y-m-d');

  $cek = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE email_akun='$email'");
  $cek_lagi = mysqli_num_rows($cek);
  if ($cek_lagi != 0) {
    echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Akun Sudah Terdaftar!'});</script>";
  } else {
    if ($password != $password2) {
      echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password Tidak Sama!'});</script>";
    } else {
      if (strlen($password) < 10) {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password minimal 10 karakter !'});</script>";
      } else {
        $add = $koneksi->query("INSERT INTO tb_akun (username_akun, email_akun, telepon_akun, password_akun, alamat_akun, status_akun, akses_akun, registrasi_akun)
        VALUES('$username','$email','$telepon',md5('$password'),'$alamat','Tidak Aktif','$akses','$date')");
        if (!$add) {
          echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Tambah Akun !'});</script>";
        } else {
          echo "<script>Swal.fire('Good job!','Akun Berhasil di buat!','success')</script>";
          echo "<meta http-equiv='refresh' content='2;url=akun.php'>";
        }
      }
    }
  }
}