<?php include '../koneksi.php';
?>

<h2 class="text-center"> Tambah Poli </h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="nama"> Nama Poli </label>
        <input type="text" class="form-control" id="nama" name="nama_poli">
    </div>
    <div class="form-group">
        <label for="dokter">Dokter</label>
        <select class="form-control" name="id_user" id="dokter">
            <option>--Pilih Dokter--</option>
            <?php $ambil = $koneksi->query("SELECT * FROM user WHERE sebagai = 'Dokter'") ?>
            <?php while ($tampil = $ambil->fetch_assoc()) { ?>
            <option value='<?= $tampil['id_user'] ?>'><?php echo $tampil['nama_lengkap'] ?></option>
            <?php } ?>
        </select>
    </div>

    <button class="btn btn-primary" name="simpan"> Simpan </button>
    <a href="" class="btn btn-warning"> Kembali </a>
</form>
<?php
 
if (isset($_POST['simpan'])) {
 	$nama_poli = $_POST['nama_poli'];
 	$id_user = $_POST['id_user'];
 	
    $query = $koneksi->query("INSERT INTO poli (nama_poli, id_user ) VALUES ('$nama_poli', '$id_user')");
    if($query){
        echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=poli'>";
    }else{
        echo "<div class='alert alert-danger text-center'> Data Gagal Disimpan </div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=poli'>";
    }
}
?>