<?php
//Akun sesession
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id'");

$data = mysqli_fetch_assoc($sql);
?>
<!-- Content Header -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Pengaduan - <?=$data['status_pengaduan'];?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item"><a href="pengaduan_ver.php">Pengaduan - <?=$data['status_pengaduan'];?></a></li>
                    <li class="breadcrumb-item active">CSH00-<?=$data['id_pengaduan'];?></li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>
<div class="content">
    <div class="col">
        <div class="card card-primary card-outline ">
            <div class="card-body">
                <h3 style="font-family: 'Nunito', sans-serif;" class="text-center mt-3"><b>Riwayat Pengaduan</b></h3>
                <table class="table table-borderless">
                    <tr>
                        <th>Id Pengaduan</th>
                        <td>:</td>
                        <td><?= $data['id_pengaduan']; ?></td>  
                        <th>Status</th>
                        <td>:</td>
                        <td><?= $data['jenis_pengaduan'] . " - " . $data['status_pengaduan']; ?></td>
                    </tr>
                    <tr>
                        <th>Nama</th>
                        <td>:</td>
                        <td><?= $data['nama_pengadu']; ?></td>
                        <th>Tanggal Pengaduan</th>
                        <td>:</td>
                        <td><?= $data['tanggal_pengaduan']; ?></td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>:</td>
                        <td colspan="4"><?= $data['deskripsi_pengaduan']; ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>