<?php

$id = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM tb_informasi WHERE id_info='$id'");

if ($hapus) {
    echo"<script>Swal.fire('Good job!','Berhasil Menghapus !','success')</script>";
    echo"<meta http-equiv='refresh' content='1;url=informasi.php#info'>";
}else{
    echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menghapus !'});</script>";
}
?>