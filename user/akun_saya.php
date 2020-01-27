<?php
session_start();
include('../koneksi.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Costumer Service</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="../admin/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/style_akun.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../admin/plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../admin/https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="../admin/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="../admin/plugins/toastr/toastr.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../admin/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../admin/dist/css/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../admin/plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Nunito|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <?php include('layouts/header.php'); ?>
    <div class="wrapper">
        <div class="container">
    <!-- wrapper akun saya-->
            <div class="card card-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <?php
                $id_profile = $_SESSION['akun']['id_akun'];
                $sql = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$id_profile'");
                $data = mysqli_fetch_assoc($sql);
                ?>
                <div class="widget-user-header text-white" id="bg-user">
                    <h2 class="widget-user-username text-right"><?= $data['username_akun']; ?></h2>
                    <h4 class="widget-user-desc text-right">Customer</h4>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="img/milk.png" alt="User Avatar">
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
            </div>

            <div class="card card-light">
                <div class="card-header">
                    <h3 class="card-title">Motto</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                    </div>
                    <!-- /.card-tools -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-12">
                        <h3 style="font-family: 'Nunito', sans-serif;" class="text-center my-2"><b>Motto</b></h3>
                        <hr>
                    </div>
                    <p class="lead text-center"><?=$data['motto_akun']; ?></p>
                </div>
                <!-- /.card-body -->
            </div>
            <div class="card card-light collapsed-card">
                <div class="card-header">
                    <h3 class="card-title">Profile Akun</h3>

                    <div class="card-tools">
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row p-4">
                        <div class="col-12">
                            <h3 style="font-family: 'Nunito', sans-serif;" class="text-center my-2"><b>Profile Saya</b></h3>
                            <hr>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <table class="table table-borderless">
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
                                    <th>Telepon</th>
                                    <td>:</td>
                                    <td><?= $data['status_akun']; ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <table class="table table-borderless">
                                <tr>
                                    <th>Registrasi Akun</th>
                                    <td>:</td>
                                    <td><?= $data['registrasi_akun']; ?></td>
                                </tr>
                                <tr>
                                    <th>Passowrd</th>
                                    <td>:</td>
                                    <td><a href="#" data-toggle="modal" data-target="#gantipw" class="text-link">Ganti Password</a></td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>:</td>
                                    <td><?= $data['alamat_akun']; ?></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end wrapper akun saya -->

            <!-- Modal Ganti Pw-->
            <div class="modal fade" id="gantipw" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
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
                                <div class="form-group">
                                    <label for="passlama">Password Lama</label>
                                    <input type="text" name="passlama" id="passlama" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="passbaru">Password Baru</label>
                                    <input type="text" name="passbaru" id="passbaru" class="form-control" placeholder="" aria-describedby="helpId">
                                </div>
                                <div class="form-group">
                                    <label for="passbaru2">Ulangi Password Baru</label>
                                    <input type="text" name="passbaru2" id="passbaru2" class="form-control" placeholder="" aria-describedby="helpId">
                                    <small id="helpId" class="text-muted">Minimal 10 Karakter</small>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-sm btn-primary">Save</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- wrapper footer -->
    <div class="wrapper">
        <div class="container">
            <footer class="py-4 text-center border-top mt-5">
                <strong>Copyright &copy; 2014 - <?=date('Y');?> <a href="index.php">CS Helper</a>.</strong>
                All rights reserved.
                <div class="float-right d-sm-inline-block">
                    <b>Version</b> 1.0
                </div>
            </footer>
        </div>
    </div>
    <!-- wrapper footer -->

    <!-- jQuery -->
    <script src="../admin/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../admin/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- ChartJS -->
    <script src="../admin/plugins/chart.js/Chart.min.js"></script>
    <!-- Sparkline -->
    <script src="../admin/plugins/sparklines/sparkline.js"></script>
    <script src="../admin/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../admin/plugins/jquery-knob/jquery.knob.min.js"></script>
    <!-- daterangepicker -->
    <script src="../admin/plugins/moment/moment.min.js"></script>
    <script src="../admin/plugins/daterangepicker/daterangepicker.js"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="../admin/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
    <!-- Summernote -->
    <script src="../admin/plugins/summernote/summernote-bs4.min.js"></script>
    <!-- overlayScrollbars -->
    <script src="../admin/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../admin/dist/js/adminlte.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../admin/dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../admin/dist/js/demo.js"></script>
    <!-- SweetAlert2 -->
    <script src="../admin/plugins/sweetalert2/sweetalert2.min.js"></script>
    <!-- Toastr -->
    <script src="../admin/plugins/toastr/toastr.min.js"></script>
    <!-- DataTables -->
    <script src="../admin/plugins/datatables/jquery.dataTables.js"></script>
    <script src="../admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

</body>

</html>