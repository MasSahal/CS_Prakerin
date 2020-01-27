<?php

$id = $_GET['id'];
$hapus = $koneksi->query("DELETE FROM tb_kategori WHERE id_kategori='$id'");

if ($hapus) {
    echo"<div class='kategorihapus'></div>
    <meta http-equiv='refresh' content='1;url=?page=kategori'>";
}else{
    echo"<div class='kategorigagal'></div>";
}