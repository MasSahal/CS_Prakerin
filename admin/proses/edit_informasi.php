<?php

$id = $_GET['id'];

//ambil data informasi
$sql = mysqli_query($koneksi, "SELECT * FROM tb_informasi WHERE id_info='$id'");
$data = mysqli_fetch_assoc($sql);

//ambil data akun
$sql2 = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$data[id_akun]'");
$data2 = mysqli_fetch_assoc($sql2);
?>
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Informasi</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                    <li class="breadcrumb-item active">Edit Informasi</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-outline card-info mb-4">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle" src="../admin/file/user/<?= $data2['foto_akun']; ?>" alt="User Image">
                            <span class="username text-primary"><?= $data2['username_akun']; ?></span>
                            <span class="description"><?php
                                if ($data['status_info'] == 'Diperbarui') {
                                    echo $data['status_info']. " - " ;
                                    echo time_elapsed_string($data['tanggal_info']);
                                } ?></span>
                        </div>
                        <!-- /.user-block -->
                        <div class="card-tools">
                            <a href="#"><button type="button" class="btn btn-tool" data-toggle="tooltip" title="Edit info">
                                    <i class="fa fa-pen"></i></button></a>
            
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                            </button>
                            <a href="informasi.php" class="btn btn-tool" title="Batalkan Tindakan"><i class="fas fa-times"></i>
                            </a>
                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <form method="post">
                        <div class="card-body p-4">
                            <div class="form-group">
                                <textarea name="informasi" id="informasi" rows="10"><?=$data['info'];?></textarea>
                            </div>
                            <a href="informasi.php" class="btn btn-sm btn-secondary">Kembali</a>
                            <button type="submit" class="btn btn-sm btn-info" name="ubah_info">Simpan Perubahan</button>
                        </div>
                        <div class="card-footer">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
if(isset($_POST['informasi'])){
    $info = $_POST['informasi'];
    $status = "Diperbarui";

    date_default_timezone_set('ASIA/JAKARTA');
    $tgl = date('Y-m-d H:i:s');

    $ubah = mysqli_query($koneksi, "UPDATE tb_informasi SET info='$info', status_info='$status', tanggal_info='$tgl' WHERE id_info='$id'");
    if ($ubah) {
        echo "<script>Swal.fire('Berhasil!','Informasi telah diperbarui !','success')</script>";
        echo "<meta http-equiv='refresh' content='2;url=informasi.php#info'>";
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal memperbarui informasi !'});</script>";
    }
}