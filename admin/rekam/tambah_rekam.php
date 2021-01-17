<?php
include '../koneksi.php';

if (isset($_POST['rekam'])) {
    $tanggal = $_POST['tanggal'];
    $tinggi = $_POST['tinggi_badan'];
    $berat = $_POST['berat_badan'];
    $tekanan_darah = $_POST['tekanan_darah'];
    $suhu = $_POST['suhu'];
    $keluhan = $_POST['keluhan'];
    $id_poli = $_POST['id_poli'];
    
	$id_pasien = $_GET['id'];

	$query = $koneksi->query("INSERT INTO rekam
        (id_pasien, 
        tinggi_badan, 
        berat_badan, 
        tekanan_darah,
        suhu,
        keluhan,
        id_poli, 
        tanggal, 
        status) 
        VALUES
        ('$id_pasien',
        '$tinggi', 
        '$berat', 
        '$tekanan_darah', 
        '$suhu', 
        '$keluhan', 
        '$id_poli', 
        '$tanggal', 
        'Belum Di Periksa')");
	if($query){
        echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
    }else{
        echo "<div class='alert alert-danger text-center'> Data Gagal Disimpan </div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
    }
	/*echo " <meta http-equiv='refresh' content='1;url=menu.php?halaman=info'>";*/
}

?>

<h2 class="text-center"> Rekam Pasien </h2>
<?php 
	$ambil 	= $koneksi->query("SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
	$tampil = $ambil->fetch_assoc();
?>
<!--<pre><?php print_r($tampil); ?> </pre>-->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for=""> Tanggal </label>
        <input type="date" class="form-control" value="<?php echo date('Y-m-d'); ?>" readonly="" name="tanggal">
    </div>
    <div class="form-group">
        <label for=""> Pasien </label>
        <input type="text" class="form-control" readonly="" value="<?php echo $tampil['nama'] ?>" name="pasien">
    </div>
    <div class="form-group">
        <label for=""> Jenis Pasien </label>
        <input type="text" class="form-control" readonly="" value="<?php echo $tampil['jenis'] ?>" name="jenis">
    </div>
    <div class="form-row">
        <div class="form-group col-md-6">
            <label for=""> Tinggi Badan (Cm) </label>
            <input type="number" class="form-control" name="tinggi_badan" required>
        </div>
        <div class="form-group col-md-6">
            <label for=""> Berat Badan (Kg) </label>
            <input type="number" class="form-control" name="berat_badan" required>
        </div>
        <div class="form-group col-md-6">
            <label for="tekanan_darah"> Tekanan Darah </label>
            <input type="number" class="form-control" id="tekanan_darah" name="tekanan_darah" required>
        </div>
        <div class="form-group col-md-6">
            <label for="suhu"> Suhu Badan (&#x2103;) </label>
            <input type="number" class="form-control" id="suhu" name="suhu" required>
        </div>
    </div>
    <div class="form-group ">
        <label for="id_poli">Poli</label>
        <select class="form-control" name="id_poli" id="id_poli" required>
            <option>--Pilih Poli--</option>
            <?php $ambil = $koneksi->query("SELECT * FROM poli") ?>
            <?php while ($tampil = $ambil->fetch_assoc()) { ?>
            <option value='<?= $tampil['id'] ?>'>
                <?php echo $tampil['nama_poli'] ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <label for="keluhan"> Keluhan </label>
        <textarea id="keluhan" name="keluhan" rows="4" class="form-control" required></textarea>
    </div>
    <button class="btn btn-success" name="rekam"> Rekam </button>
    <a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali </a>
</form>