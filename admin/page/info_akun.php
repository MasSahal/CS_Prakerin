<?php

$id = $_GET['id'];
$edit = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE id_akun='$id'");
$data = mysqli_fetch_assoc($edit);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
                        <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                        <li class="breadcrumb-item"><a href="?page=akun">Akun Terdaftar</a></li>
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
                                            <th>Tipe Akun</th>
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
    if ($data['akses_akun'] == 'user') { ?>
        <!-- Main content -->
        <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Daftar Akun User</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="table1">
                                    <thead class="text-light bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>username</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th>Tgl Daftar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE akses_akun='user' AND id_akun!='$id'");
                                        $no = 0;
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tr>
                                                <td><?= $no += 1; ?></td>
                                                <td><?= $data['username_akun']; ?></td>
                                                <td><?= $data['email_akun']; ?></td>
                                                <td><?= $data['telepon_akun']; ?></td>
                                                <td><?= $data['status_akun']; ?></td>
                                                <td><?= $data['registrasi_akun']; ?></td>
                                                <td>
                                                    <a href="?page=edit_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="?page=hapus_akun&id=<?= $data['id_akun']; ?>" onclick="return confirm('Yakin Ingin Menghapus Ini?')" class="btn  btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-alt"></i></a>
                                                    <a href="?page=info_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-info btn-sm" title="Selengkapnya"><i class="fa fa-angle-right"></i></a>
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

        <?php } elseif ($data['akses_akun']=='admin') { ?>
    
        <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Daftar Akun Admin</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="table1">
                                    <thead class="text-light bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>username</th>
                                            <th>Email</th>
                                            <th>Telepon</th>
                                            <th>Status</th>
                                            <th>Tgl Daftar</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = mysqli_query($koneksi,"SELECT * FROM tb_akun WHERE akses_akun='admin' AND id_akun!='$id'");
                                        $no = 0;
                                        while ($data = mysqli_fetch_assoc($query)) {
                                        ?>
                                            <tr>
                                                <td><?= $no += 1; ?></td>
                                                <td><?= $data['username_akun']; ?></td>
                                                <td><?= $data['email_akun']; ?></td>
                                                <td><?= $data['telepon_akun']; ?></td>
                                                <td class="<?php if($data['status_akun']=="Tidak Aktif"){echo"text-danger";} ?>">
                                                    <?= $data['status_akun']; ?>
                                                </td>
                                                <td><?= $data['registrasi_akun']; ?></td>
                                                <td>
                                                    <a href="?page=edit_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-warning btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <a href="?page=hapus_akun&id=<?= $data['id_akun']; ?>" onclick="return confirm('Yakin Ingin Menghapus Ini?')" class="btn  btn-danger btn-sm" title="Hapus"><i class="fa fa-trash-alt"></i></a>
                                                    <a href="?page=info_akun&id=<?= $data['id_akun']; ?>" class="btn  btn-info btn-sm" title="Selengkapnya"><i class="fa fa-angle-right"></i></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <a href="#" data-toggle="modal" data-target="#tambahadmin" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Admin</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
        <?php } else { echo "Not Found"; }?>
</div>
<!-- /.content-wrapper -->


        <!-- Modal -->
        <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Akun User</h5>
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="tambahuser" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="tambahadmin" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Akun Admin</h5>
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
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="tambahadmin" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

<?php
if (isset($_POST['aktifkan'])) {
    $aktif = mysqli_query($koneksi,"UPDATE tb_akun SET status_akun='Aktif' WHERE id_akun='$id'");
    if ($aktif) {
        echo"<script>Swal.fire('Good job!','Berhasil Mengaktifkan Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='2;url=index.php?page=info_akun&id=$id'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Mengaktifkan Akun !'});</script>";
    }
}
if (isset($_POST['nonaktif'])) {
    $nonaktif = mysqli_query($koneksi,"UPDATE tb_akun SET status_akun='Tidak Aktif' WHERE id_akun='$id'");
    if ($nonaktif) {
        echo"<script>Swal.fire('Good job!','Berhasil Menonaktifkan Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='2;url=index.php?page=info_akun&id=$id'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menonaktifkan Akun !'});</script>";
    }
}
if (isset($_POST['hapus'])) {
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_akun WHERE id_akun='$id'");
    if ($hapus) {
        echo"<script>Swal.fire('Good job!','Berhasil Menghapus Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='2;url=index.php?page=akun'>";
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
        echo"<meta http-equiv='refresh' content='2;url=index.php?page=akun'>";
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
            echo"<meta http-equiv='refresh' content='2;url=index.php?page=akun'>";
        }
        }
    }
    }
