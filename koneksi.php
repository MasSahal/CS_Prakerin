<?php
$host = 'localhost';
$username = 'root';
$pass = '';
$dbname = 'db_customer_service';

$koneksi = mysqli_connect($host,$username,$pass,$dbname);
if (!$koneksi) {
    mysqli_errno($koneksi);
}
?>