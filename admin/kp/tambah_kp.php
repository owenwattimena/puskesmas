<?php include '../koneksi.php'; ?>

<h2 class="text-center">Tambah Data Kepala Keluarga</h2>

<form action="" method="POST" enctype="multipart/form-data">
	<div class="form row">
		<div class="form-group col-md-6">
		<label for="ktp">No KTP</label>
		<input type="number" class="form-control" name="no_ktp">
	</div>
	<div class="form-group col-md-6">
		<label for="jenis_kelamin">Jenis Kelamin</label>
		<select name="jenis_kelamin" id="" class="form-control">
			<option value="Laki-laki">Laki-laki</option>
			<option value="Perempuan">Perempuan</option>
		</select>
	</div>
</div>
	<div class="form-row">
	<div class="form-group col-md-6">
		<label for="nama">Nama</label>
		<input type="text" class="form-control" name="nama">
	</div>
	<div class="form-group col-md-6">
		<label for="tanggal">Tanggal Lahir</label>
		<input type="date" class="form-control" name="tanggal_lahir">
	</div>
	<div class="form-group col-md-6">
		<label for="pekerjaan">Pekerjaan</label>
		<input type="text" class="form-control" name="pekerjaan">
	</div>
		<div class="form-group col-md-6">
		<label for="agama">Agama</label>
		<select name="agama" id="" class="form-control">
			<option value="Islam">Islam</option>
			<option value="Kristen">Kristen</option>
			<option value="Hindu">Hindu</option>
			<option value="Budha">Budha</option>
			</select>
		</div>
	</div>
	<div class="form-row">
	<div class="form-group col-md-6">
	<label for="alamat">Alamat</label>
	<textarea name="alamat" id="" rows="4" class="form-control"></textarea>
</div>
	<div class="form-group col-md-6">
	<label for="tinggi_badan">Tinggi Badan</label>
	<input type="number" class="form-control" name="tinggi">
	<label for="berat_badan">Berat Badan</label>
	<input type="number" class="form-control" name="berat">
	<br>
	<button class="btn btn-primary" name="simpan"> Simpan </button>
	<a href="" class="btn btn-warning">Kembali</a></br>
	</div>
</div>
</form>

<?php

if (isset($_POST['simpan'])) {
	$no_ktp = $_POST['no_ktp'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis_kelamin'];
	$tanggal = $_POST['tanggal_lahir'];
	$pekerjaan = $_POST['pekerjaan'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$tinggi = $_POST['tinggi'];
	$berat = $_POST['berat'];

$koneksi->query("INSERT INTO kepala_keluarga(no_ktp, nama, pekerjaan, alamat, jenis_kelamin, umur, agama, tinggi_badan, berat_badan) VALUES('$no_ktp', '$nama',  '$pekerjaan',  '$alamat', '$jenis', '$tanggal', '$agama', '$tinggi', '$berat')");

	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=kepala_keluarga'>";
} ?>