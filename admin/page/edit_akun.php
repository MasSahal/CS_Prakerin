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
                    <h1>Akun User</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#?page=dashboard">Home</a></li>
                        <li class="breadcrumb-item"><a href="?page=akun">Akun Terhubung</a></li>
                        <li class="breadcrumb-item active">Edit Akun <?= $data['username_akun']; ?></li>
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
                            <h5 class="card-title m-0">Edit Akun <?= $data['username_akun']; ?></h5>
                        </div>
                        <div class="card-body">
                            <form method="post">

                                <div class="container-fluid">
                                    <label for="username">Username</label><br>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="username" id="username" required placeholder="Username" value="<?= $data['username_akun']; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user-alt"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="email">Email</label>
                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="email" id="email" required placeholder="Email" value="<?= $data['email_akun']; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="telepon">No Telepon</label>
                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" name="telepon" id="telepon" required placeholder="No Hp" value="<?= $data['telepon_akun']; ?>">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" class="form-control" name="password" readonly required placeholder="Password" value="<?= $data['password_akun']; ?>">
                                            <div class="input-group-append">
                                                <div class="input-group-text">
                                                    <span class="fas fa-key"></span>
                                                </div>
                                            </div>
                                        </div>
                                        <a href="#"><small id="helpId" class="text-primary" data-toggle="modal" data-target="#gantiPw">Ganti Password</small></a>
                                    </div>
                                    <label for="alamat">Alamat</label>
                                    <div class="input-group mb-3">
                                        <textarea type="text" class="form-control pr-sm-1" name="alamat" id="alamat" required placeholder="Alamat"><?= $data['alamat_akun']; ?></textarea>
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-briefcase"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="?page=akun" class="btn btn-sm btn-secondary"><i class="fa fa-angle-double-left"></i> Kembali</a>
                                    <button type="submit" name="tambahuser" class="btn btn-sm btn-info"><i class="fa fa-save"></i> Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#modelId">
    Launch
</button>

<!-- Modal -->
<div class="modal fade" id="gantiPw" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                    <div class="container-fluid">
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
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="gantiPass" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['gantiPass'])) {
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    if ($password != $password2) {
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password Tidak Sama !'});</script>";
    }else{
        if (strlen($password) < 10) {
            echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Password minimal 10 karakter !'});</script>";
        }else{
            $ubahPw = mysqli_query($koneksi,"UPDATE tb_akun SET password_akun=md5('$password') WHERE id_akun='$id'");

            if ($ubahPw) {
                echo"<script>Swal.fire('Good job!','Berhasil Mengganti Password !','success')</script>";
                echo"<meta http-equiv='refresh' content='2;url=index.php?page=edit_akun&id=$id'>";
            }else{
                echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Mengganti Password !'});</script>";
            }
        }
    }
}