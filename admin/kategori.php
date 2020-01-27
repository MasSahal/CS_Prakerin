<?php
session_start();

include('../koneksi.php');
$profile = $_SESSION['akun']['email_akun'];
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Costumer Service</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="sweetalert2.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include('layouts/header.php'); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("layouts/sidebar.php"); ?>
        <!-- End Sidebar Container -->


        <!-- Content Wrapper. Contains page content -->
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
                                <li class="breadcrumb-item active"><a href="index.php">Dashboard</a></a></li>
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
                                                $query = $query = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
                                                $no = 0;
                                                while ($data = mysqli_fetch_assoc($query)) {
                                                ?>
                                                    <tr>
                                                        <td><?= $no += 1; ?></td>
                                                        <td><?= $data['kategori']; ?></td>
                                                        <td><?= $data['subjek_kategori']; ?></td>
                                                        <td>
                                                            <button type="button" data-toggle="modal" data-target="#ubahKategori<?php echo $data['id_kategori']; ?>" class="btn btn-sm btn-warning" title="Edit"><span class="fa fa-edit"></span></button>
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
                                                                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_kategori WHERE id_kategori='$id'");
                                                                            $data = mysqli_fetch_assoc($sql);
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


        <!-- content-wrapper php -->
        <?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = "?";
        }
        

        switch ($page) {
            case 'hapus_kategori':
                include("proses/hapus_kategori.php");
                break;
            
            default:
                echo"404 not found";
                break;
        }
        ?>
        <!-- /.content-wrapper php -->

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2014-2019 <a href="http://massahalofficial.site">Mas Sahal</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.1
            </div>
        </footer>

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="plugins/sparklines/sparkline.js"></script>
    <!-- JQVMap -->
    <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
    <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="plugins/moment/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="plugins/toastr/toastr.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.js"></script>
    <script src="plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
    <script>
        $(function() {
            $("#table1").DataTable();
        });
    </script>
</body>

</html>
<?php
if (isset($_POST['tambah'])) {
    $nama = $_POST['nama'];
    $subjek = $_POST['subjek'];

    $add = $query = mysqli_query($koneksi, "INSERT INTO tb_kategori (kategori,subjek_kategori) VALUES ('$nama','$subjek')");
    if ($add) {
        echo "<script>Swal.fire('Selamat !','Kategori Berhasil di tambahkan!','success')</script>
        <meta http-equiv='refresh' content='1;url=kategori.php'>";
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal tambah kategori !'});</script>";
    }
}
if (isset($_POST['ubah'])) {
    $id = $_POST['id'];
    $nama = $_POST['nama'];
    $subjek = $_POST['subjek'];

    $edit = $query = mysqli_query($koneksi, "UPDATE tb_kategori SET kategori='$nama', subjek_kategori='$subjek' WHERE id_kategori='$id'");

    if ($edit) {
        echo "
        <script>Swal.fire('Selamat !','Kategori Berhasil di ubah!','success')</script>
        <meta http-equiv='refresh' content='1;url=kategori.php'>";
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal ubah kategori !'});</script>";
    }
}
?>