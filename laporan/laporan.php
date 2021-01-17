<?php
include '../koneksi.php';

$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM rekam WHERE id_rekam = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
$gabung = $koneksi->query("SELECT * FROM rekam JOIN pasien ON rekam.id_pasien = pasien.id_pasien WHERE rekam.id_rekam = '$id'");
$satu = $gabung->fetch_assoc();

if(!isset($id)) {
	echo " <script>alert('Belum Memilih Data')</script>";
}
?>
<h2> Detail Laporan </h2>
<hr>
<table class="table table-borderedless col-md-6">
    <tr>
        <td> Nama Pasien </td>
        <td> : </td>
        <td> <?php echo $satu['nama'] ?> </td>
    </tr>
    <tr>
        <td> Tanggal Berobat </td>
        <td> : </td>
        <td> <?php echo $tampil['tanggal'] ?> </td>
    </tr>
    <tr>
        <td> Keluhan </td>
        <td> : </td>
        <td> <?php echo $tampil['keluhan'] ?> </td>
    </tr>
    <tr>
        <td> Penyakit Yang Di Derita </td>
        <td> : </td>
        <td> <?php echo $tampil['diagnosa'] ?> </td>
    </tr>
</table>
<label for=""><strong> Keterangan Obat </strong></label>
<table class="table table-bordered">
    <tr>
        <th> Obat </th>
        <th> Jenis Obat </th>
        <th> Jumlah </th>
        <th> Keterangan </th>
    </tr>
    <?php $ambil = $koneksi->query( "SELECT * FROM rekam_obat AS ro JOIN obat AS o ON ro.id_obat=o.id_obat WHERE ro.id_rekam_medis = '$_GET[id]'" ) ?>
    <?php $no=0;  while ($pecah = $ambil->fetch_assoc()) : ?>
    <tr>
        <td><?php echo $pecah['nama_obat'] ?></td>
        <td><?php echo $pecah['jenis_obat'] ?></td>
        <td><?php echo $pecah['jumlah'] ?></td>
        <td><?php echo $pecah['keterangan'] ?></td>
    </tr>
    <?php endwhile;?>
</table>