<?php
session_start();

include('../koneksi.php');
include('security_admin.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Costumer Service</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

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
    <!-- Font Style -->
    <link rel="stylesheet" href="fonts/font.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Source+Sans+Pro&display=swap" rel="stylesheet">
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

            <div class="bagian">
                <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    switch ($page) {
                        case 'edit':
                            include('proses/edit_informasi.php');
                            break;
                        case 'hapus':
                            include('proses/hapus_informasi.php');
                            break;

                        default:
                            echo "";
                            break;
                    }
                } else {
                ?>
            </div>

            <!-- Content Header -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Papan Informasi</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="index.php">Dashboard</a></li>
                                <li class="breadcrumb-item active">Informasi</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    <div class="row mb-3">
                        <div class="col-12 mb-4">
                            <div class="card card-primary card-outline">
                                <div class="card-body">
                                    <form method="post">
                                        <div class="form-group">
                                            <h2 class="font-weight-bold mb-3 text-center">Kirimkan Informasi ke Mading!</h2>
                                            <textarea name="informasi" id="informasi" required rows="10" class="form-control"></textarea>
                                            <input type="hidden" name="id_akun" value="<?= $_SESSION['akun']['id_akun']; ?>">
                                        </div>
                                        <div class="form-check mb-4 my-3">
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" checked name="jenis" id="jenis" value="Umum">
                                                <span class="text-dark h5 font-weight-bold">Informasi Umum</span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="jenis" id="jenis" value="Penting">
                                                <span class="text-warning h5 font-weight-bold">Informasi Penting</span>
                                            </label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <label class="form-check-label">
                                                <input type="checkbox" class="form-check-input" name="jenis" id="jenis" value="Darurat">
                                                <span class="text-danger h5 font-weight-bold">Informasi Darurat</span>
                                            </label>
                                        </div>
                                        <button type="submit" name="siaran_informasi" class="btn btn-md btn-info">Siarkan Sekarang</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="card text-body py-2 bg-light" id="info">
                                <h2 class="font-weight-bold text-center">Informasi Terkini</h2>
                            </div>
                            <?php
                            $sql = mysqli_query($koneksi, "SELECT * FROM tb_informasi ORDER BY tanggal_info DESC");
                            while ($data = mysqli_fetch_assoc($sql)) {
                                $sql2 = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$data[id_akun]'");
                                $data2 = mysqli_fetch_assoc($sql2);
                            ?>
                                <div class="card <?php if($data['jenis_info']=='Penting'){ echo 'card-warning';} else if($data['jenis_info']=='Darurat'){ echo 'card-danger';}else{echo'card-secondary';}?> card-outline card-info mb-4">
                                    <div class="card-header">
                                        <div class="user-block">
                                            <img class="img-circle" src="../admin/file/user/<?= $data2['foto_akun']; ?>" alt="User Image">
                                            <span class="username text-primary"><?= $data2['username_akun']; ?></span>
                                            <span class="description"><?php
                                                if ($data['status_info'] == 'Diperbarui') {
                                                    echo $data['status_info'] . " - ";
                                                }
                                                echo time_elapsed_string($data['tanggal_info']);
                                                ?></span>
                                        </div>
                                        <!-- /.user-block -->
                                        <div class="card-tools">
                                            <a href="?page=edit&id=<?= $data['id_info']; ?>">
                                                <button type="button" class="btn btn-tool" data-toggle="tooltip" data-placement="bottom" title="Edit info">
                                                    <i class="fa fa-pen"></i>
                                                </button>
                                            </a>
                                            <a href="?page=hapus&id=<?= $data['id_info']; ?>">
                                                <button type="button" class="btn btn-tool" data-toggle="tooltip" data-placement="bottom" onclick="return confirm('Yakin Ingin menghapus ini? ');"title="Hapus info">
                                                    <i class="fa fa-trash-alt"></i>
                                                </button>
                                            </a>
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>
                                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                                <i class="fas fa-times"></i>
                                            </button>
                                        </div>
                                        <!-- /.card-tools -->
                                    </div>
                                    <div class="card-body p-4">
                                        <?= $data['info']; ?>
                                    </div>
                                    <?php if ($data['jenis_info'] == 'Penting') { ?>
                                        <div class="card-footer">
                                            <span class="text-warning font-weight-bold">Informasi Penting !</span>
                                        </div>
                                    <?php } elseif ($data['jenis_info'] == 'Darurat') { ?>
                                        <div class="card-footer">
                                            <span class="text-danger font-weight-bold">Informasi Darurat !</span>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>

                <?php } ?>

                </div>
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
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
    <script>
        $(function() {
            //Add text editor
            $('#informasi').summernote({
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'strikethrough', 'clear']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['height', ['height']],
                    ['sup', ['subscript', 'superscript']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'li', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'hr']],
                    ['balik', ['undo', 'redo']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                ],
                height: "300px",
                styleWithSpan: false,
                dialogsFade: true
            })
        })
    </script>
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
    $(function () {
        $('[data-toggle="tooltip"]').tooltip();
    });
    
    </script>
    <script>
        $("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
    var $box = $(this);
    if ($box.is(":checked")) {
        // the name of the box is retrieved using the .attr() method
        // as it is assumed and expected to be immutable
        var group = "input:checkbox[name='" + $box.attr("name") + "']";
        // the checked state of the group/box on the other hand will change
        // and the current value is retrieved using .prop() method
        $(group).prop("checked", false);
        $box.prop("checked", true);
    } else {
        $box.prop("checked", false);
    }
    });
    </script>
</body>

</html>
<?php
function time_elapsed_string($datetime, $full = false)
{
    date_default_timezone_set('ASIA/JAKARTA');
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'Tahun',
        'm' => 'Bulan',
        'w' => 'Minggu',
        'd' => 'Hari',
        'h' => 'Jam',
        'i' => 'Menit',
        's' => 'Detik',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? ' yang' : ' yang');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' lalu' : 'baru saja';
}
if (isset($_POST['siaran_informasi'])) {

    $id_akun = $_POST['id_akun'];
    $info = $_POST['informasi'];
    $jenis = $_POST['jenis'];

    //replace enter ke tag <br>
    $info = str_replace(array("\r\n", "\r", "\n"), "<br/>", $info);
    //set default ke jakarta
    date_default_timezone_set('ASIA/JAKARTA');
    $tgl = date('Y-m-d H:i:s');

    $informasi = mysqli_query($koneksi, "INSERT INTO tb_informasi (id_akun, info, tanggal_info, jenis_info) VALUES ('$id_akun','$info','$tgl','$jenis')");

    if ($informasi) {
        echo "<script>Swal.fire('Berhasil!','Informasi telah dikirim !','success')</script>";
        echo "<meta http-equiv='refresh' content='2;url=informasi.php'>";
    } else {
        echo "<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal mengirim informasi !'});</script>";
        echo "<meta http-equiv='refresh' content='2;url=informasi.php'>";
    }
}
?>