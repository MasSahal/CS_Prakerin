<?php

$id = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM tb_akun WHERE id_akun='$id'");

if ($hapus) {
    echo"<script>Swal.fire('Good job!','Berhasil Menghapus Akun !','success')</script>";
    echo"<meta http-equiv='refresh' content='1;url=akun.php'>";
}else{
    echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menghapus Akun !'});</script>";
}
?>