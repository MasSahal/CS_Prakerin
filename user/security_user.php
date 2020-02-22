<?php
if (!isset($_SESSION['akun'])) {
    header("location:../");
}elseif($_SESSION['akun']['akses_akun']=="admin") {
    header("location:../");
}else{
    $profile = $_SESSION['akun']['email_akun'];
}
?>