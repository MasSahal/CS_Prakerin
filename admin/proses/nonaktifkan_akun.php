<?php
    error_reporting(0);
    $id = $_GET['id'];
    $nonaktif = mysqli_query($koneksi,"UPDATE tb_akun SET status_akun='Tidak Aktif' WHERE id_akun='$id'");
    if ($nonaktif) {
        echo"<script>Swal.fire('Good job!','Berhasil Menonaktifkan Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='1;url=akun.php'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menonaktifkan Akun !'});</script>";
    }
?>