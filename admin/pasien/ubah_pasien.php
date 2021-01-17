<?php
include '../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();

if (isset($_POST['simpan'])) {
	$no_rekam_medis = $_POST['no_rekam_medis'];
    $no_ktp = $_POST['no_ktp'];
    $nama = $_POST['nama'];
    $nama_kp = $_POST['kepala_keluarga'];
    $tanggal = $_POST['tanggal_lahir'];
    $pekerjaan = $_POST['pekerjaan'];
    $agama = $_POST['agama'];
    $alamat = $_POST['alamat'];
    $jenis_ps = $_POST['jenis_pasien'];
    $jenis = $_POST['jenis_kelamin'];
    $no_bpjs = $_POST['no_bpjs'];

	$koneksi->query("UPDATE pasien SET 
        no_rekam_medis = '$no_rekam_medis',
        no_ktp = '$no_ktp', 
        nama = '$nama', 
        nama_kp = '$nama_kp', 
        umur = '$tanggal', 
        pekerjaan = '$pekerjaan', 
        alamat = '$alamat', 
        jenis_kelamin = '$jenis', 
        agama = '$agama',  
        jenis = '$jenis_ps', 
        no_bpjs = '$no_bpjs' 
        WHERE id_pasien = '$_GET[id]'");

	echo " <br><div class='alert alert-success text-center'> Data Berhasil Di Edit </div>";
	echo " <meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
}
?>

<h2 class="text-center"> Ubah Data Pasien </h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row justify-content-center">
        <div class="form-group col-md-5">
            <label for="no_rekam_medis">Nomor Rekam Medis</label>
            <input type="text" class="form-control" id="no_rekam_medis" name="no_rekam_medis"
                value="<?=$pecah['no_rekam_medis']?>" required>
        </div>
        <div class="form-group col-md-5">
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <select class="form-control" name="kepala_keluarga" id="">
                <option>--Pilih Kepala Keluarga--</option>
                <?php $ambil = $koneksi->query("SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
                <?php while ($tampil = $ambil->fetch_assoc()) { ?>
                <option <?= ($tampil['nama'] == $pecah['nama_kp']) ?"selected" : ""?>
                    value="<?php echo $tampil['nama'] ?>"><?php echo $tampil['nama'] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-5">
            <label for=""> No KTP </label>
            <input type="number" class="form-control" name="no_ktp" value="<?php echo $pecah['no_ktp'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for=""> Nama </label>
            <input type="text" class="form-control" name="nama" value="<?php echo $pecah['nama'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for=""> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" value="<?php echo $pecah['umur'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select name="jenis_kelamin" id="" class="form-control">
                <option value="Laki-laki" <?php if ($pecah['jenis_kelamin'] == "Laki-laki") {
				echo "selected";
			} ?>> Laki-laki</option>
                <option value="Perempuan" <?php if ($pecah['jenis_kelamin'] == "Perempuan") {
				echo "selected";
			} ?>> Perempuan</option>
            </select>
        </div>

        <div class="form-group col-md-5">
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

        <div class="form-group col-md-5">
            <label for=""> Pekerjaan </label>
            <input type="text" class="form-control" name="pekerjaan" value="<?php echo $pecah['pekerjaan'] ?>">
        </div>



        <div class="form-group col-md-10">
            <label for=""> Jenis Pasien </label>
            <select name="jenis_pasien" id="jenis_pasien" class="form-control" required>
                <option <?= ($pecah['jenis'] == 'BPJS') ? 'selected' : '' ?> value="BPJS" id="bpjs"> BPJS </option>
                <option <?= ($pecah['jenis'] == 'NON BPJS') ? 'selected' : '' ?> value="NON BPJS" id="non_bpjs"> Non
                    BPJS </option>
            </select>
        </div>
        <div class="form-group col-md-10" id="nomor_bpjs">
            <label for="no_bpjs"> Nomor BPJS </label>
            <input type="text" class="form-control" id="no_bpjs" name="no_bpjs">
        </div>
        <div class="form-group col-md-10">
            <label for=""> Alamat </label>
            <textarea name="alamat" rows="4" class="form-control"><?php echo $pecah['alamat']; ?></textarea>
        </div>



    </div>
    <div class="text-center">
        <button class="btn btn-primary" name="simpan"> Simpan </button>
        <a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali</a>
    </div>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function() {
    if ($('#jenis_pasien').val() == 'NON BPJS') {
        $('#nomor_bpjs').addClass('d-none');
        $('#no_bpjs').val('');
    }
    console.log()
    $('#jenis_pasien').change(function(e) {
        e.preventDefault();
        if (this.value == 'BPJS') {
            $('#nomor_bpjs').removeClass('d-none');
        } else {
            $('#nomor_bpjs').addClass('d-none');
            $('#no_bpjs').val('');

        }
    });
});
</script>