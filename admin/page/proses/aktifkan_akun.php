<?php
$id = $_GET['id'];

    $aktif = $koneksi->query("UPDATE tb_akun SET status_akun='Aktif' WHERE id_akun='$id'");
    if ($aktif) {
        echo"<script>Swal.fire('Good job!','Berhasil Mengaktifkan Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Mengaktifkan Akun !'});</script>";
    }
?>