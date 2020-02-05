<?php
    $id_profile = $_SESSION['akun']['id_akun'];
    $sql = mysqli_query($koneksi, "SELECT * FROM tb_akun WHERE id_akun='$id_profile'");
    $data = mysqli_fetch_assoc($sql);
?>
<header>
    <nav class="navbar navbar-expand-sm navbar-dark px-5" style="background-color: #079992;">
        <a class="navbar-brand" href="index.php">Cs.Helper</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">=</button>
            
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="pengajuan.php">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="problem.php">Problem</a>
                </li>
                    <?php
                    if (!isset($_SESSION['akun'])){ ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Login</a>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hai, <?=$data['username_akun'];?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="riwayat.php">Riwayat</a>
                                <a class="dropdown-item" href="akun_saya.php">Akun Saya</a>
                                <a class="dropdown-item" href="about.php">About</a>
                                <div class="dropdown-divider bg-dark"></div>
                                <a class="dropdown-item" href="logout.php">Logout</a>
                            </div>
                        </li>
                    <?php } ?>
            </ul>
            <form class="form-inline ml-3" method="get">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" type="search" name="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                        <i class="fas fa-search"></i>
                        </button>
                    </div>
                    </div>
                </form>
        </div>
    </nav>
</header>