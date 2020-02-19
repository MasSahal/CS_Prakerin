<?php require('koneksi.php'); ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registration | Cs Helper</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="index.php"><b>Cs</b> Helper</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Daftar Anggota Baru</p>

      <form method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="username" required placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
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
        <textarea class="form-control pr-sm-1" name="alamat" id="alamat" required placeholder="Alamat"></textarea>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-home"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="form-group mb-3">
          <div class="input-group ">
            <input type="password" class="form-control" name="password2" required placeholder="Retype password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <small>Minimal 10 karakter</small>
        </div>
        <div class="row">
          <div class="col">
            <div class="icheck-primary">
              <input type="checkbox" id="agreeTerms" name="terms" required value="agree">
              <label for="agreeTerms">
                I agree to the <a href="#">terms</a>
              </label>
            </div>
          </div>
        </div>
        <!-- /.col -->
          <div class="my-3">
            <input type="submit" name="daftar" class="btn btn-primary btn-block" values="Daftar">
          </div>
        <!-- /.col -->
      </form>
      <hr class="my-2">
      <a href="index.php" class="text-center">Saya sudah punya akun</a>
    </div>
    <!-- /.form-box -->
  </div><!-- /.card -->
</div>
<!-- /.register-box -->

<!-- jQuery -->
<script src="admin/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="admin/dist/js/adminlte.min.js"></script>
</body>
</html>
<?php

if (isset($_POST['daftar'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];
  $telepon = $_POST['telepon'];
  $alamat = $_POST['alamat'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $date = date('Y-m-d');

  $cek = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE email_akun='$email'");
  $cek_lagi = mysqli_num_rows($cek);
  if ($cek_lagi !=0) {
    echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Akun Sudah Terdaftar!'});</script>";
  }else{
    if($password != $password2){
      echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password Tidak Sama!'});</script>";
    }else{
      if (strlen($password) < 10) {
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password minimal 10 karakter !'});</script>";
      }else{
        $add = mysqli_query($koneksi,"INSERT INTO tb_akun (username_akun, email_akun, telepon_akun, password_akun, alamat_akun, status_akun, akses_akun, registrasi_akun)
        VALUES('$username','$email','$telepon',md5('$password'),'$alamat','Tidak Aktif','user','$date')");
        if (!$add) {
          echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Tambah Akun !'});</script>";
        }else{
          echo"<script>Swal.fire('Good job!','Akun Berhasil di buat!','success')</script>";
          echo"<meta http-equiv='refresh' content='3;url=index.php'>";
        }
      }
    }
  }
}