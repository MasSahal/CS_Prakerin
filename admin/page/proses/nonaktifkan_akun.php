<?php
    $id = $_GET['id'];
    $nonaktif = $koneksi->query("UPDATE tb_akun SET status_akun='Tidak Aktif' WHERE id_akun='$id'");
    if ($nonaktif) {
        echo"<script>Swal.fire('Good job!','Berhasil Menonaktifkan Akun !','success')</script>";
        echo"<meta http-equiv='refresh' content='1;url=index.php?page=akun'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menonaktifkan Akun !'});</script>";
    }
?>