<div class="container">
            <div class="card my-5 p-5">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-9 col-sm-12 d-flex">
                            <p>
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo quia sint qui id sit et quam praesentium quasi quos earum fugiat, ratione, asperiores esse similique deleniti voluptatibus aut soluta! Ipsum?
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque, eveniet! Alias enim officia est, dolor voluptates consequuntur corrupti maxime. Tenetur voluptatibus similique dolore quo quos itaque et delectus necessitatibus architecto!
                            </p>
                        </div>
                        <div class="col-md-3 d-none d-lg-block">
                            <div class="list-group">
                                <div class="list-group-item list-group-item-action bg-info text-center">
                                    <span clas="d-flex">Sub-Menu</span>
                                </div>
                                <div class="list-group-item list-group-item-action">
                                    <a href="#" class="d-flex">Aksi</a>
                                </div>
                                <div class="list-group-item list-group-item-action">
                                    <a href="#" class="d-flex">Aksi</a>
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
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
            <footer class="py-4 text-center border-top mt-5">
                <strong>Copyright &copy; 2014-2019 <a href="http://massahalofficial.site">Mas Sahal</a>.</strong>
                All rights reserved.
                <div class="float-right d-sm-inline-block">
                    <b>Version</b> 1.0
                </div>
            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>