<?php

$id = $_GET['id'];
$edit = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE id_akun='$id'");
$data = mysqli_fetch_assoc($edit);
?>
<!-- Content Wrapper. Contains page content -->
    <!-- Content Header -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>
                        Akun <?php if ($data['akses_akun'] == 'user') {
                            echo"User";}elseif($data['akses_akun'] == 'admin'){
                                echo"Admin"; }else{echo"Error / Jenis Akun Tidak Terdaftar";} ?>
                    </h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="akun.php">Akun Terdaftar</a></li>
                        <li class="breadcrumb-item active">Info Akun <?= $data['username_akun']; ?></li>
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
                    <div class="card card-danger card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Info Akun <?= $data['username_akun']; ?></h5>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>ID Akun</th>
                                            <td>:</td>
                                            <td><?= $data['id_akun']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Username</th>
                                            <td>:</td>
                                            <td><?= $data['username_akun']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Email</th>
                                            <td>:</td>
                                            <td><?= $data['email_akun']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Telepon</th>
                                            <td>:</td>
                                            <td><?= $data['telepon_akun']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Status</th>
                                            <td>:</td>
                                            <td><?= $data['status_akun']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-6">
                                    <table class="table table-borderless">
                                        <tr>
                                            <th>Alamat</th>
                                            <td>:</td>
                                            <td><?= $data['alamat_akun']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Tanggal Registrasi</th>
                                            <td>:</td>
                                            <td><?= $data['registrasi_akun']; ?></td>
                                        </tr>
                                        <tr>
                                            <th>Akses Akun</th>
                                            <td>:</td>
                                            <td><?= $data['akses_akun']; ?></td>
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-12 align-right ">
                                    <form method="post">
                                        <?php
                                        if ($data['status_akun'] == 'Tidak Aktif') { ?>
                                            <button type="submit" class="btn btn-sm btn-info" name="aktifkan"><i class="fas fa-lock-open"></i> Aktifkan</button>
                                        <?php } else { ?>
                                            <button type="submit" name="nonaktif" class="btn btn-sm btn-info"><i class="fas fa-lock"></i> Non-aktifkan</button>
                                        <?php } ?>
                                        <button type="submit" onclick="return confirm('Yakin Ingin Menghapus Ini?')" name="hapus" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
    
<?php
if (isset($_POST['aktifkan'])) {
    $aktif = mysqli_query($koneksi,"UPDATE tb_akun SET status_akun='Aktif' WHERE id_akun='$id'");
    if ($aktif) {
        echo"<script>Swal.fire('Good job!','Berhasil Mengaktifkan Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='2;url=?page=info_akun&id=$id'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Mengaktifkan Akun !'});</script>";
    }
}
if (isset($_POST['nonaktif'])) {
    $nonaktif = mysqli_query($koneksi,"UPDATE tb_akun SET status_akun='Tidak Aktif' WHERE id_akun='$id'");
    if ($nonaktif) {
        echo"<script>Swal.fire('Good job!','Berhasil Menonaktifkan Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='2;url=?page=info_akun&id=$id'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menonaktifkan Akun !'});</script>";
    }
}
if (isset($_POST['hapus'])) {
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_akun WHERE id_akun='$id'");
    if ($hapus) {
        echo"<script>Swal.fire('Good job!','Berhasil Menghapus Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='2;url=akun.php'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menghapus Akun !'});</script>";
    }
}

if (isset($_POST['tambahuser'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $date = date('Y-m-d');

    $cek = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE email_akun='$email' AND akses_akun='user'");
    $cek_lagi = mysqli_num_rows($cek);
    if ($cek_lagi !=0) {
    echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Akun Sudah Terdaftar!'});</script>";
    }else{
    if($password != $password2){
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password Tidak Sama!'});</script>";
    }else{
        $add = mysqli_query($koneksi,"INSERT INTO tb_akun (username_akun, email_akun, telepon_akun, password_akun, alamat_akun, status_akun, akses_akun, registrasi_akun)
        VALUES('$username','$email','$telepon',md5('$password'),'$alamat','Tidak Aktif','user','$date')");
        if (!$add) {
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Tambah Akun !'});</script>";
        }else{
        echo"<script>Swal.fire('Good job!','Akun Berhasil di buat!','success')</script>";
        echo"<meta http-equiv='refresh' content='2;url=akun.php'>";
        }
    }
    }
}
if (isset($_POST['tambahadmin'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $alamat = $_POST['alamat'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $date = date('Y-m-d');
    
    $cek = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE email_akun='$email' AND akses_akun='admin'");
    $cek_lagi = mysqli_num_rows($cek);
    if ($cek_lagi !=0) {
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Akun Sudah Terdaftar!'});</script>";
    }else{
        if($password != $password2){
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password Tidak Sama!'});</script>";
        }else{
        $add = mysqli_query($koneksi,"INSERT INTO tb_akun (username_akun, email_akun, telepon_akun, password_akun, alamat_akun, status_akun, akses_akun, registrasi_akun)
        VALUES('$username','$email','$telepon',md5('$password'),'$alamat','Tidak Aktif','admin','$date')");
        if (!$add) {
            echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Tambah Akun !'});</script>";
        }else{
            echo"<script>Swal.fire('Good job!','Akun Berhasil di buat!','success')</script>";
            echo"<meta http-equiv='refresh' content='2;url=akun.php'>";
        }
        }
    }
    }
