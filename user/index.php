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
    <style>
        *{
            font-family: 'Nunito', sans-serif;
        }
        .hover:hover{
            box-shadow: 0 0.8rem 1rem rgba(0, 0, 0, 0.25) !important;
            }
    </style>
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <?php include('layouts/header.php'); ?>

    <!-- wrapper selamat datang -->
    <div class="wrapper">
        <div class="jumbotron jumbotron-fluid bg-dark text-white mb-0">
            <div class="container">
                <div class="row">
                    <div class="col text-center">
                        <h1 style="font-family: 'Nunito', sans-serif;"><b>Selamat Datang di Web Pelayanan Pengaduan</b></h1>
                        <p class="lead"><b>Cs.helper</b> adalah layanan yang bertujuan untuk mengajukan pengaduan masalah.</p>
                        <a href="#" class="btn btn-outline-light btn-md mt-2">Selengkapnya</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wrapper selamat datang -->

    <!-- wrapper kategori masalah -->
    <div class="wrapper">
        <div class="container-fluid p-5">
            <div class="text-body my-5">
                <h2 class="font-weight-bold text-center">Kategori Masalah</h2>
            </div>
            <div class="row"> 
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/milk.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark text-link">Milk Shake Yummy</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/cake.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark">Cake Dessert Coco</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/icecream.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark">Delicius Ice Cream</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/burger.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark">Delicius Big Burger</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/cake.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark">Cake Dessert Coco</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/milk.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark text-link">Milk Shake Yummy</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/burger.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark">Delicius Big Burger</a>
                            </h4>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 rounded">
                    <div class="card shadow m-2 hover mb-4">
                        <a href="#">
                            <img src="img/icecream.png" class="responsive "alt="" width="100%">
                        </a>
                        <div class="card-body">
                            <h4 class="card-title font-weight-bold">
                                <a href="#" class="text-dark">Delicius Ice Cream</a>
                            </h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wrapper kategori masalah -->

    <!-- wrapper about -->
    <div class="wrapper" style="background-color:#d0cde1ff">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 p-4">
                    <img src="img/cs.png" alt="" class="responsive" width="100%">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 pl-4">
                    <h1 class="h2 font-weight-bold mb-2 my-3">About</h1>
                    <p class="text-dark">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque optio similique dolorum voluptate suscipit ut, vitae corporis, laboriosam in, voluptatibus autem unde assumenda sed earum? Adipisci vero numquam facilis non.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore nihil fuga iure, velit, voluptates quam nam laboriosam itaque adipisci in obcaecati soluta ex! Sequi doloremque, recusandae consequatur dignissimos nisi alias?
                        Lorem ipsum dolor, sit amet consectetur adipisicing elit. Illum dolores quasi quidem inventore explicabo numquam quae dolore officia accusamus nobis! Quam nesciunt at dicta deserunt delectus ipsum id a mollitia.

                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, placeat modi? Error porro, inventore totam veniam in tempora, sapiente nostrum nisi aspernatur et quae? Quam iure cumque quidem officiis repellat!
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Libero, consequatur! Soluta, aliquid corrupti nihil repellendus doloribus eaque et quos ad voluptatibus harum cupiditate fuga reiciendis, accusantium obcaecati sint amet suscipit.
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- wrapper about -->


    <div class="wrapper bg-gradient-cyan">
        <div class="container">
            <div class="card my-5 p-5">
<!-- <p>
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident autem exercitationem, error aliquid totam quaerat nemo molestiae deserunt numquam facilis neque eveniet? Ipsam iure temporibus amet ut labore tenetur consectetur.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur reprehenderit at commodi? In, neque doloremque corporis illum eos illo voluptates eius reiciendis nulla dolor nostrum? Voluptas harum consectetur tempore ullam.
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Mollitia rerum sunt placeat deserunt, est fugiat voluptatum enim? Quas magnam nostrum totam fugiat quam quo tempore. Ratione quam pariatur iste provident.
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Autem minima odio dolorem repudiandae dolores, ducimus deserunt. Tenetur atque explicabo rem laudantium architecto ducimus nobis saepe natus laboriosam, id deserunt asperiores!
                        </p> -->
            </div>
            <div class="row">
                <div class="col-4">
                    <ul class="list-group">
                        <li class="list-group-item">A</li>
                        <li class="list-group-item">A</li>
                        <li class="list-group-item">A</li>
                        <li class="list-group-item">A</li>
                        <li class="list-group-item">A</li>
                    </ul>
                </div>
                <div class="col-8">
                    <?php
                    if (isset($_GET['search'])) {
                        $data = $_GET['search'];
                        echo "anda mencari " . $data;
                    }
                    ?>
                    
                </div>
            </div>

            <!-- Content Wrapper. Contains page content -->

            <!-- /.content-wrapper -->
            
            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>

    <!-- wrapper footer -->
    <div class="wrapper">
        <div class="container">
            <footer class="py-4 text-center border-top mt-5">
                <strong>Copyright &copy; 2014-2019 <a href="http://massahalofficial.site">Mas Sahal</a>.</strong>
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