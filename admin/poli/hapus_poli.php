<?php include '../koneksi.php';

$ambil = $koneksi->query("SELECT * FROM poli where id = $_GET[id]");
$tampil = $ambil->fetch_assoc();

$koneksi->query("DELETE FROM poli WHERE id = $tampil[id]");
echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=poli'>";
?>