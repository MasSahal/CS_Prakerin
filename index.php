<?php
session_start();
include('koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Log in | Customer Service</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
  <link rel="stylesheet" href="admin/sweetalert2.min.css">
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

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="../../index2.html"><b>Customer</b> Service</a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Silahkan login untuk mulai</p>

        <form method="post">
          <div class="input-group mb-3">
            <input type="email" class="form-control" placeholder="Email" name="email">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <div class="icheck-primary">
                <input type="checkbox" id="remember">
                <label for="remember">
                  Remember Me
                </label>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="my-2">
            <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </form>

        <p class="mb-1">
          <a href="#" class="error">I forgot my password</a>
        </p>
        <p class="mb-0">
          <a href="register.php" class="text-center">Register a new membership</a>
        </p>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="admin/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="admin/dist/js/adminlte.min.js"></script>
  <script type="text/javascript">
    $('.error').click(function() {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Link sedang tidak aktif'
      })
    });
    $('.error2').show(function() {
      Swal.fire({
        icon: 'error',
        title: 'Oops...',
        text: 'Akun Tidak Aktif!'
      })
    });
  </script>

</body>

</html>
<?php
if (isset($_POST['login'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];

  $query = $koneksi->query("SELECT * FROM tb_akun WHERE email_akun='$email' AND password_akun=md5('$password')");
  $login = $query->num_rows;
  if ($login == 0) {
    echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Akun Tidak Ditemukan!'});</script>";
  } else {
    //pecahkan data ke array
    $data  = $query->fetch_assoc();
    if ($data['status_akun'] == "Tidak Aktif") {
      echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Akun Tidak Aktif!'});</script>";
    } elseif ($data['status_akun'] == "Aktif") {
      $_SESSION['akun'] = $data;
      $_SESSION['akses'] = $data['akses_akun'];
      if ($data['akses_akun'] == 'admin') {
        echo "<meta http-equiv='refresh' content='0;url=admin/index.php'>";
      } elseif ($data['akses_akun'] == 'user') {
        echo "<meta http-equiv='refresh' content='0;url=user/index.php'>";
      }
    }
  }
}
?>