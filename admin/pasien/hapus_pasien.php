<?php 
include '../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
$koneksi->query("DELETE FROM pasien WHERE id_pasien = '$_GET[id]'");
echo "<script> location='menu.php?halaman=pasien'; </script>";
?>