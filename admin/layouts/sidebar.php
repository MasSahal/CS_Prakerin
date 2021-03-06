<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="file/logo-web.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Cs.Helper</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="file/user/<?=$_SESSION['akun']['foto_akun'];?>" class="img-circle elevation-4" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">Hai, <?= $_SESSION['akun']['username_akun']; ?></a>

            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="informasi.php" class="nav-link">
                        <i class="nav-icon far fa-edit"></i>
                        <p>
                            Mading Info
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="kategori.php" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            Kategori
                            <span class="right badge badge-danger">
                                <?php
                                $kategori = mysqli_query($koneksi,"SELECT * FROM tb_kategori");
                                echo mysqli_num_rows($kategori);
                                ?>
                            </span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="akun.php" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Akun
                            <span class="right badge badge-success">
                                <?php
                                $akun =  mysqli_query($koneksi,"SELECT * FROM tb_akun");
                                echo mysqli_num_rows($akun);
                                ?>
                            </span>
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="riwayat.php" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            Riwayat
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-chart-pie"></i>
                        <p>
                            User Problems
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="problems_ver.php" class="nav-link">
                                <i class="fa fa-paste nav-icon"></i>
                                <p>
                                    Terverifikasi
                                    <span class="right badge badge-info">
                                        <?php
                                        $verif = mysqli_query($koneksi,"SELECT * FROM tb_pengaduan WHERE status_pengaduan='Terverifikasi'");
                                        echo mysqli_num_rows($verif);
                                        ?>
                                    </span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="problems_pro.php" class="nav-link">
                                <i class="fas fa-spinner fa-pulse nav-icon"></i>
                                <p>
                                    Diproses
                                    <span class="right badge badge-info">
                                        <?php
                                        $proses = mysqli_query($koneksi,"SELECT * FROM tb_pengaduan WHERE status_pengaduan='Diproses'");
                                        echo mysqli_num_rows($proses);
                                        ?>
                                    </span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="problems_pen.php" class="nav-link">
                                <i class="fas fa-cog fa-pulse nav-icon"></i>
                                <p>
                                    Dalam Penanganan
                                    <span class="right badge badge-info">
                                        <?php
                                        $penanganan = mysqli_query($koneksi,"SELECT * FROM tb_pengaduan WHERE status_pengaduan='Dalam Penanganan'");
                                        echo mysqli_num_rows($penanganan);
                                        ?>
                                    </span>
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="problems_sel.php" class="nav-link">
                                <i class="fa fa-check nav-icon"></i>
                                <p>
                                    Selesai
                                    <span class="right badge badge-info">
                                        <?php
                                        $selesai = mysqli_query($koneksi,"SELECT * FROM tb_pengaduan WHERE status_pengaduan='Selesai'");
                                        echo mysqli_num_rows($selesai);
                                        ?>
                                    </span>
                                </p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>