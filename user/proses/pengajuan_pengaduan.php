<?php

//ambil id pengaduan dari url
$id = $_GET['id'];

$sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_assoc($sql);

//pilih data akun sesuai id akun
$sql_1 = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$data[id_akun]'");
$akun = mysqli_fetch_assoc($sql_1);

//pilih data akun sesuai id akun
$sql_3 = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$data[id_kategori]'");
$kategori = mysqli_fetch_assoc($sql_3);

//pilih data akun sesuai id akun
$sql_4 = mysqli_query($koneksi, "SELECT * FROM tb_balasan WHERE id_pengaduan='$data[id_pengaduan]'");
$jml_balasan = mysqli_num_rows($sql_4);
?>


<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row my-2">
            <div class="col-12 text-center">
                <h1>Pengaduan - <?=$data['status_pengaduan'];?></h1>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="content">
    <div class="col">
        <div class="card card-widget mb-3">
            <div class="card-header">
                <div class="user-block">
                    <img class="img-circle" src="../admin/file/user/<?= $akun['foto_akun']; ?>" alt="User Image">
                    <span class="username text-primary"><?= $data['nama_pengadu']; ?></span>
                    <span class="description"><?= time_elapsed_string($data['tanggal_pengaduan']); ?></span>
                </div>
                <!-- /.user-block -->
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-toggle="tooltip" title="Mark as read">
                        <i class="far fa-circle"></i></button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
            <!-- /.card-body -->
            <div class="card-body">
                <div class="bg-dark">
                    <center>
                        <img class="img-fluid pad" src="../admin/file/<?= $data['lampiran_pengaduan']; ?>" alt="Photo">
                    </center>
                </div>
                <h2 class="my-3 font-weight-bold text-info"><?= $kategori['kategori']; ?></h2>
                <p><?= $data['deskripsi_pengaduan']; ?></p>
                <form method="post">
                    <input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>">
                    <span class="float-right text-muted"><?=$jml_balasan;?> Tanggapan</span>
                </form>
            </div>
            <?php
            $balasan = mysqli_query($koneksi, "SELECT * FROM tb_balasan WHERE id_pengaduan='$data[id_pengaduan]'");
            while ($balasan2 = mysqli_fetch_assoc($balasan)) {
                $akun_balas = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$balasan2[id_akun]'");
                $akun_balas2 = mysqli_fetch_assoc($akun_balas);
            ?>
                <div class="card-footer card-comments">
                    <div class="card-comment">
                        <!-- User image -->
                        <img class="img-circle img-sm" src="../admin/file/user/sahal.png" alt="User Image">

                        <div class="comment-text">
                            <span class="username text-primary">
                                <?= $akun_balas2['username_akun']; ?>
                                <span class="text-muted float-right"><?= time_elapsed_string($balasan2['tanggal_balasan']); ?></span>
                            </span><!-- /.username -->
                            <?php echo $balasan2['balasan'];
                            if($balasan2['id_akun'] === $_SESSION['akun']['id_akun']){ ?>
                                <form method="post">
                                    <input type="hidden" name="id_balasan" value="<?=$balasan2['id_balasan'];?>">
                                    <button type="submit" name="hapus_balasan" onclick="return confirm('Yakin ingin menghapus komentar?');" class="float-right btn btn-tool pt-2" id="close" data-toggle="tooltip" data-placement="bottom" title="Hapus"><i class="fa fa-times"></i></button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
                <hr style="margin:0">
            <?php } ?>
            <!-- /.card-footer -->
            <div class="card-footer">
                <form method="post">
                    <img class="img-fluid img-circle img-sm" src="../admin/file/user/<?= $_SESSION['akun']['foto_akun']; ?>" alt="Alt Text">
                    <!-- .img-push is used to add margin to elements next to floating images -->
                    <div class="img-push">
                        <div class="form-group">
                            <label for="balas" class="text-primary h5"><?=$_SESSION['akun']['username_akun'];?></label>
                            <textarea name="balas" id="balas" rows="5" class="form-control"></textarea>
                            <div class=" my-3 float-right">
                                <input type="hidden" name="id_pengaduan" value="<?=$data['id_pengaduan'];?>">
                                <a href="riwayat.php" class="btn btn-md btn-secondary mx-1"> Kembali </a>
                                <button type="submit" name="balasan" class="btn btn-primary btn-md"> Kirim Balasan </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.card-footer -->
        </div>
    </div>
</div>
<?php
if (isset($_POST['balasan'])) {

    $balas = $_POST['balas'];
    $id_pengaduan = $_POST['id_pengaduan'];

    //ambil id_akun dari session saat ini
    $id_akun_saya = $_SESSION['akun']['id_akun'];

    //replace enter ke tag <br>
    $balas = str_replace(array("\r\n", "\r", "\n"), "<br/>", $balas);

    //set default ke jakarta
    date_default_timezone_set('ASIA/JAKARTA');
    $tanggal = date('Y-m-d H:i:s');

    $sql = "INSERT INTO tb_balasan (id_pengaduan, id_akun, balasan, tanggal_balasan)
                    VALUES ('$id_pengaduan','$id_akun_saya','$balas','$tanggal')";
        $balas = mysqli_query($koneksi, $sql);
        if ($balas) {
            echo "<meta http-equiv='refresh' content='0;url=?page=pengajuan&id=$id'>";
        } else {
            echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal mengajukan pengaduan !'});</script>";
            echo "<meta http-equiv='refresh' content='2;url=?page=pengajuan&id=$id'>";
        }
}
if (isset($_POST['hapus_balasan'])) {
    
    $id_balasan = $_POST['id_balasan'];

    $hapus = mysqli_query($koneksi,"DELETE FROM tb_balasan WHERE id_balasan='$id_balasan'");

    if ($hapus) {
        echo"<script>Swal.fire('Good job!','Berhasil Menghapus Balasan !','success')</script>";
        echo"<meta http-equiv='refresh' content='0;url=?page=pengajuan&id=$id'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menghapus Balasan !'});</script>";
        echo"<meta http-equiv='refresh' content='2;url=?page=pengajuan&id=$id'>";
    }
}
?>