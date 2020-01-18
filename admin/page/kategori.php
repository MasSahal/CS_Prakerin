<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Kategori</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active"><a href="?page=dashboard">Dashboard</a></a></li>
                        <li class="breadcrumb-item active">Kategori</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <div class="content">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h5 class="card-title m-0">Daftar Kategori Saat Ini</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover table-striped" id="table1">
                                    <thead class="text-light bg-info">
                                        <tr>
                                            <th>No</th>
                                            <th>Kategori</th>
                                            <th>Subjek Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $query = $koneksi->query("SELECT * FROM tb_kategori");
                                        $no = 0;
                                        while ($data = $query->fetch_assoc()) {
                                        ?>
                                            <tr>
                                                <td><?= $no += 1; ?></td>
                                                <td><?= $data['kategori']; ?></td>
                                                <td><?= $data['subjek_kategori']; ?></td>
                                                <td>
                                                    <button type="button" data-toggle="modal" data-target="#ubahKategori<?php echo $data['id_kategori']; ?>" class="btn btn-sm btn-primary" title="Edit"><span class="fa fa-edit"></span></button>
                                                    <!-- Modal -->
                                                    <div class="modal fade" id="ubahKategori<?= $data['id_kategori']; ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                                        <div class="modal-dialog" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Ubah Kategori</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <form role="form" method="post">
                                                                    <?php
                                                                    $id = $data['id_kategori'];
                                                                    $sql = $koneksi->query("SELECT * FROM tb_kategori WHERE id_kategori='$id'");
                                                                    $data = $sql->fetch_assoc();
                                                                    ?>
                                                                    <div class="modal-body">
                                                                        <input type="hidden" name="id" value="<?= $data['id_kategori']; ?>">
                                                                        <div class="form-group">
                                                                            <label for="nama">Nama Kategori</label>
                                                                            <input type="text" name="nama" id="nama" class="form-control" required value="<?= $data['kategori']; ?>" aria-describedby="helpId">
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <label for="subjek">Subjek Kategori</label>
                                                                            <textarea type="text" rows="4" name="subjek" id="subjek" class="form-control" aria-describedby="helpId"><?= $data['subjek_kategori']; ?></textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                        <input type="submit" name="ubah" class="btn btn-primary" value="Simpan">
                                                                    </div>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <a href="?page=hapus_kategori&id=<?= $data['id_kategori']; ?>" onclick="return confirm('Yakin ingin hapus kategori ini?')" class="btn btn-sm btn-danger" title="Hapus"><span class="fa fa-trash"></span></a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="mt-3">
                                <a href="#" data-toggle="modal" data-target="#tambahKategori" class="btn btn-sm btn-success"><span class="fa fa-plus"></span> Tambah Kategori</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="tambahKategori" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Kategori</label>
                        <input type="text" name="nama" id="nama" class="form-control" required placeholder="Nama Kategori" aria-describedby="helpId">
                    </div>
                    <div class="form-group">
                        <label for="subjek">Subjek Kategori</label>
                        <textarea type="text" rows="4" name="subjek" id="subjek" class="form-control" placeholder="Subjek Kategori" aria-describedby="helpId"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" name="tambah" class="btn btn-primary" value="Tambah">
                </div>
            </form>
        </div>
    </div>
</div>
<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $subjek = $_POST['subjek'];

    $add = $koneksi->query("INSERT INTO tb_kategori (kategori,subjek_kategori) VALUES ('$nama','$subjek')");
    if ($add) {
        echo"<div class='kategoriberhasil'></div>
        <meta http-equiv='refresh' content='1;url=?page=kategori'>";
    }else {
        echo "<div class='kategorigagal'></div>";
    }
}
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $subjek = $_POST['subjek'];

    $edit = $koneksi->query("UPDATE tb_kategori SET kategori='$nama', subjek_kategori='$subjek' WHERE id_kategori='$id'");

    if ($edit) {
        echo "
        <div class='kategoriberhasil2'>
        <meta http-equiv='refresh' content='1;url=?page=kategori'>";
    }else{
        echo "<div class='kategorigagal'>";
    }
}
?>