<?php
include '../koneksi.php';
?>
<h2 class="text-center"> Tambah Obat </h2>
<?php $ambil = $koneksi->query("SELECT * FROM obat WHERE id_obat = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<form method="POST" enctype="multipart/form-data">
    <div class="form-group col-md-6">
        <label for=""> Nama Obat</label>
        <input type="text" class="form-control" name="nama_obat" value="<?php echo $tampil['nama_obat'] ?>">
    </div>
    <div class="form-group col-md-6">
        <select class="form-control" name="jenis_obat" id="">
            <option value="Tube" <?php if ($tampil['jenis_obat'] == "Tube") { 
	echo "selected";
	} ?>> Tube </option>
            <option value="Botol" <?php if ($tampil['jenis_obat'] == "Botol") { 
	echo "selected";
	} ?>> Botol </option>
            <option value="Sachet" <?php if ($tampil['jenis_obat'] == "Sachet") { 
	echo "selected";
	} ?>> Sachet </option>
            <option value="Kaplet" <?php if ($tampil['jenis_obat'] == "Kaplet") { 
	echo "selected";
	} ?>> Kaplet </option>
            <option value="Tablet" <?php if ($tampil['jenis_obat'] == "Tablet") { 
	echo "selected";
	} ?>> Tablet </option>
        </select>
    </div>
    <div class="form-group col-md-6">
        <label for=""> Harga</label>
        <input type="number" class="form-control" name="harga" value="<?php echo $tampil['harga'] ?>">
    </div>
    <div class="form-group col-md-6">
        <label for=""> Stok Obat</label>
        <input type="number" class="form-control" name="stok_obat" value="<?php echo $tampil['stok_obat'] ?>">
    </div>
    <div class="form-group col-md-6">
        <label for=""> Tanggal Kadaluarsa </label>
        <input type="date" class="form-control" name="tanggal_kadaluarsa"
            value="<?php echo $tampil['tanggal_kadaluarsa'] ?>">
    </div>
    <button class="btn btn-primary" name="tambah"> Update Data Obat </button>
    <a href="menu.php?halaman=obat" class="btn btn-warning"> Kembali </a>
</form>
<?php
if (isset($_POST['tambah'])) {
	$nama = $_POST['nama_obat'];
	$jenis = $_POST['jenis_obat'];
	$harga = $_POST['harga'];
	$stok = $_POST['stok_obat'];
	$tanggal = $_POST['tanggal_kadaluarsa'];

$koneksi->query("UPDATE obat SET nama_obat = '$nama', jenis_obat = '$jenis', harga = '$harga', stok_obat = '$stok', tanggal_kadaluarsa = '$tanggal' WHERE id_obat = '$_GET[id]'"); 

echo "<br><div class='alert alert-success text-center'> Data Berhasil Di Update </div>";
echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=obat'>";
}
?>