<?php 
include '../koneksi.php';
?>

<h2 class="text-center"> Edit Data Kepala Keluarga</h2>
<?php $ambil = $koneksi->query("SELECT * FROM kepala_keluarga WHERE id_kp = '$_GET[id]'"); 
$tampil =  $ambil->fetch_assoc();
?>
<!-- <pre><?php print_r($tampil) ?></pre> -->
<form action="" method="POST" enctype="multipart/form-data">
<br>
	<div class="form row">
		<div class="form-group col-md-6">
		<label for="ktp">No KTP</label>
		<input type="number" class="form-control" name="no_ktp" value="<?php echo $tampil['no_ktp'] ?>">
	</div>
	<div class="form-group col-md-6">
		<label for="jenis_kelamin">Jenis Kelamin</label>
		<select name="jenis_kelamin" id="" class="form-control">
			<option value="Laki-laki" <?php if ($tampil['jenis_kelamin'] == "Laki-laki") {
				echo "selected";
			} ?>> Laki-laki</option>
			<option value="Perempuan" <?php if ($tampil['jenis_kelamin'] == "Perempuan") {
				echo "selected";
			} ?>> Perempuan</option>
		</select>
	</div>
</div>
	<div class="form-row">
		<div class="form-group col-md-6">
			<label for="nama">Nama</label>
		<input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama'] ?> ">
		</div>
	<div class="form-group col-md-6">
	<label for="tanggal">Tanggal Lahir</label>
	<input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $tampil['umur'] ?> ">
</div>
	<div class="form-group col-md-6">
	<label for="pekerjaan">Pekerjaan</label>
	<input type="text" class="form-control" name="pekerjaan" value="<?php echo $tampil['pekerjaan'] ?> ">
</div>
		<div class="form-group col-md-6">
		<label for="agama">Agama</label>
		<select name="agama" id="" class="form-control">
		<option value="Islam" <?php if ($tampil['agama'] == "Islam") {
				echo "selected";
			} ?>> Islam</option>
		<option value="Kristen" <?php if ($tampil['agama'] == "Kristen") {
				echo "selected";
			} ?>> Kristen</option>
		<option value="Hindu" <?php if ($tampil['agama'] == "Hindu") {
				echo "selected";
			} ?>> Hindu</option>
		<option value="Budha" <?php if ($tampil['agama'] == "Budha") {
				echo "selected";
			} ?>> Budha</option>
		</select>
	</div>
</div>
	<div class="form-row">
	<div class="form-group col-md-6">
	<label for="alamat">Alamat</label>
	<textarea name="alamat" id="" rows="4" class="form-control"><?php echo $tampil['alamat'] ?></textarea>
</div>
	<div class="form-group col-md-6">
	<label for="tinggi_badan">Tinggi Badan</label>
	<input type="number" class="form-control" name="tinggi" value="<?php echo $tampil['tinggi_badan'] ?>">
	<label for="berat_badan">Berat Badan</label>
	<input type="number" class="form-control" name="berat" value="<?php echo $tampil['berat_badan'] ?>">
	<br>
	<button class="btn btn-primary" name="edit"> Edit Data </button>
	<a href="menu.php?halaman=kepala_keluarga" class="btn btn-warning">Kembali</a></br>
	</div>
</div>
</form>
<?php 
if (isset($_POST['edit'])) {
	$no_ktp = $_POST['no_ktp'];
	$nama = $_POST['nama'];
	$jenis = $_POST['jenis_kelamin'];
	$tanggal = $_POST['tanggal_lahir'];
	$pekerjaan = $_POST['pekerjaan'];
	$agama = $_POST['agama'];
	$alamat = $_POST['alamat'];
	$tinggi = $_POST['tinggi'];
	$berat = $_POST['berat'];

	$koneksi->query("UPDATE kepala_keluarga SET no_ktp = '$no_ktp', nama = '$nama', pekerjaan = '$pekerjaan', alamat = '$alamat', jenis_kelamin = '$jenis', umur = '$tanggal', agama = '$agama', tinggi_badan = '$tinggi', berat_badan = '$berat' WHERE id_kp = '$_GET[id]'");

	echo "<br><div class='alert alert-success text-center'> Data Berhasil Di Edit </div>";
	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=kepala_keluarga'>";
	}
?>
