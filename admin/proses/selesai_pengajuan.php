<?php
$id = $_GET['id'];

$proses = mysqli_query($koneksi, "UPDATE tb_pengaduan SET status_pengaduan='Selesai' WHERE id_pengaduan='$id'");

if ($proses) {
    echo"<script>Swal.fire('Selamat!','Pengaduan Sudah diselesaikan ! !','success')</script>";
    echo"<meta http-equiv='refresh' content='1;url=problems_pen.php'>";
}else{
    echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Terjadi Kesalahan !'});</script>";
}
?>