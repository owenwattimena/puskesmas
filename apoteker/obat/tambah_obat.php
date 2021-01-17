<?php
include '../koneksi.php';
?>
<h2 class="text-center"> Tambah Obat </h2>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group col-md-6">
        <label for=""> Nama Obat</label>
        <input type="text" class="form-control" name="nama_obat">
    </div>
    <div class="form-group col-md-6">
        <select class="form-control" name="jenis_obat" id="">
            <option value="Tube"> Tube </option>
            <option value="Botol"> Botol </option>
            <option value="Sachet"> Sachet </option>
            <option value="Kaplet"> Kaplet </option>
            <option value="Tablet"> Tablet </option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for=""> Harga</label>
        <input type="number" class="form-control" name="harga">
    </div>
    <div class="form-group col-md-6">
        <label for=""> Stok Obat</label>
        <input type="number" class="form-control" name="stok_obat">
    </div>
    <div class="form-group col-md-6">
        <label for=""> Tanggal Kadaluarsa </label>
        <input type="date" class="form-control" name="tanggal_kadaluarsa">
    </div>
    <button class="btn btn-primary" name="tambah"> Tambah Obat </button>
    <a href="menu.php?halaman=obat" class="btn btn-warning"> Kembali </a>
</form>
<?php
if (isset($_POST['tambah'])) {
	$nama = $_POST['nama_obat'];
	$jenis = $_POST['jenis_obat'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok_obat'];
	$tanggal = $_POST['tanggal_kadaluarsa'];

	$koneksi->query("INSERT INTO obat(nama_obat, jenis_obat, harga, stok_obat, tanggal_kadaluarsa) VALUES('$nama', '$jenis', '$harga', '$stok', '$tanggal')");
echo "<br><div class='alert alert-success text-center'> Data Berhasil Di Simpan </div>";
echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=obat'>";
}
?>