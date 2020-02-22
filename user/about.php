<?php
session_start();
include('../koneksi.php');
include('security_user.php');
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>About | Cs Helper</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="img/favicon.png">

    <link rel="stylesheet" href="assets/style.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="../admin/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../admin/dist/css/adminlte.min.css">
    <link rel="stylesheet" href="../admin/dist/css/style.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="../admin/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- summernote -->
    <link rel="stylesheet" href="../admin/plugins/summernote/summernote-bs4.css">
    <!-- Font Style -->
    <link rel="stylesheet" href="../admin/fonts/font.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito|Source+Sans+Pro&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
</head>

<body class="hold-transition sidebar-mini layout-fixed bg-light">
    <?php include('layouts/header.php'); ?>

    <!-- wrapper about -->
    <div class="wrapper" id="about_index">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <h1 class="h2 font-weight-bold mb-3 text-light text-center">About Cs Helper</h1>
                    <hr class="mb-5 bg-white" >
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-12 p-4">
                    <img src="img/cs.png" alt="" class="responsive" width="100%">
                </div>
                <div class="col-lg-8 col-md-8 col-sm-12 pl-4">
                    <p class="text-light">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque optio similique dolorum voluptate suscipit ut, vitae corporis, laboriosam in, voluptatibus autem unde assumenda sed earum? Adipisci vero numquam facilis non.
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

    <!-- wrapper footer -->
    <div class="wrapper">
        <div class="container">
            <footer class="py-4 text-center border-top">
                <strong>Copyright &copy; 2014 - <?= date('Y'); ?> <a href="index.php">CS Helper</a>.</strong>
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

</body>

</html>