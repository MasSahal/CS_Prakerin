<?php
$id = $_GET['id'];

$proses = mysqli_query($koneksi, "UPDATE tb_pengaduan SET status_pengaduan='Diproses' WHERE id_pengaduan='$id'");

if ($proses) {
    echo"<script>Swal.fire('Good job!','Pengaduan sedang di proses sekarang ! !','success')</script>";
    echo"<meta http-equiv='refresh' content='1;url=problems_ver.php'>";
}else{
    echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Terjadi Kesalahan !'});</script>";
}
?>