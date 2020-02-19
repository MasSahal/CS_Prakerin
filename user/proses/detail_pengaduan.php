<?php
//Akun sesession
$id = $_GET['id'];
$sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id' AND id_akun='$id_profile'");

$data = mysqli_fetch_assoc($sql);
?>
<div class="row">
    <div class="col-12">
        <h3 style="font-family: 'Nunito', sans-serif;" class="text-center mt-3"><b>Riwayat Pengaduan</b></h3>
    </div>
</div>
<div class="card py-4">
    <div class="row">
        <div class="col">
            <table class="table table-borderless">
                <tr>
                    <th>Id Pengaduan</th>
                    <td>:</td>
                    <td><?=$data['id_pengaduan'];?></td>
                    <th>Status</th>
                    <td>:</td>
                    <td><?=$data['jenis_pengaduan']." - ". $data['status_pengaduan'];?></td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>:</td>
                    <td><?=$data['nama_pengadu'];?></td>
                    <th>Tanggal Pengaduan</th>
                    <td>:</td>
                    <td><?=$data['tanggal_pengaduan'];?></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td>:</td>
                    <td  colspan="4"><?=$data['deskripsi_pengaduan'];?></td>
                </tr>
                <tr>
                </tr>
            </table>
        </div>
    </div>
</div>
<a href="riwayat.php" class="text-link"><i class="fa fa-arrow-left"></i> Kembali</a>
<div class="row mt-5">
    <div class="col">
        <div class="table">
            <table class="table table-hover" id="table2">
                <thead class="bg-light">
                    <tr>
                        <th>No</th>
                        <th>Kategori</th>
                        <th>Tanggal Pengaduan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 0;
                    $id_profile = $_SESSION['akun']['id_akun'];
                    $sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan INNER JOIN tb_kategori ON tb_pengaduan.id_kategori=tb_kategori.id_kategori WHERE id_akun='$id_profile' AND id_pengaduan!='$id'");
                    while ($data = mysqli_fetch_array($sql)) {
                    ?>
                        <form method="post">
                            <tr>
                                <td><?= $no += 1; ?><input type="hidden" name="id_pengaduan" value="<?= $data['id_pengaduan']; ?>"></td>
                                <td><?= $data['kategori']; ?></td>
                                <td>
                                    <?= "Pukul " . date('H:i:s - D d, M Y', strtotime($data['tanggal_pengaduan'])); ?>
                                </td>
                                <td><?= $data['status_pengaduan']; ?></td>
                                <td>
                                    <?php if ($data['status_pengaduan'] == "Terverifikasi") { ?>
                                        <a href="?page=hapus&id=<?= $data['id_pengaduan']; ?>" class="btn btn-sm btn-danger" data-toggle="tooltip" data-placement="bottom" title="Batalkan Pengaduan"><i class="fa fa-times"></i></a>
                                    <?php } else { ?>
                                        <button type="submit" class="btn btn-sm btn-secondary disabled"><i class="fa fa-times"></i></button>
                                    <?php } ?>
                                    <a href="?page=detail&id=<?= $data['id_pengaduan']; ?>" class="btn btn-sm btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Rincian"><i class="fa fa-file-alt"></i></a>
                                    <a href="?page=pengajuan&id=<?= $data['id_pengaduan']; ?>" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="bottom" title="Pengaduan Saya"><i class="fa fa-angle-right"></i></a>
                                </td>
                            </tr>
                        </form>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>