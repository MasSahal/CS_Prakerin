<header>
    <nav class="navbar navbar-expand-sm navbar-dark px-5" style="background-color: #079992;">
        <a class="navbar-brand" href="#">Cs.Helper</a>
        <button class="navbar-toggler d-lg-none" type="button" data-toggle="collapse" data-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">=</button>
            
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pengajuan</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Problem</a>
                </li>
                    <?php
                    if (!isset($_SESSION['akun'])){ ?>

                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Login</a>
                        </li>
                    <?php }else{ ?>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdownId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Hai, <?= $_SESSION['akun']['username_akun'];?></a>
                            <div class="dropdown-menu" aria-labelledby="dropdownId">
                                <a class="dropdown-item" href="#">Riwayat</a>
                                <a class="dropdown-item" href="#">Pengaturan Akun</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">Logout</a>
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