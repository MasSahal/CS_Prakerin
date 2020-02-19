<?php
error_reporting(0);
$id = $_GET['id'];


//hapus gambar
$sql = mysqli_query($koneksi, "SELECT * FROM tb_pengaduan WHERE id_pengaduan='$id'");
$data = mysqli_fetch_assoc($sql);

chdir("file/");
chown($data['lampiran_pengaduan'],'root');
$dat = unlink(chdir("file/").$data['lampiran_pengaduan']);

if ($dat) {
    $hapus = mysqli_query($koneksi,"DELETE FROM tb_pengaduan WHERE id_pengaduan='$id'");

    if ($hapus) {
        echo"<script>Swal.fire('Good job!','Berhasil Menghapus Pengajuan !','success')</script>";
        echo"<meta http-equiv='refresh' content='1;url=problems_ver.php'>";
    }else{
        echo"<script>Swal.fire({icon: 'error',title: 'Oops...',text: 'Gagal Menghapus Pengajuan !'});</script>";
        echo"<meta http-equiv='refresh' content='1;url=#'>";
    }

}else{
    echo"<meta http-equiv='refresh' content='1;url=?page'>";
}

?>