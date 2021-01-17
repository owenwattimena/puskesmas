<?php
include '../koneksi.php';
$ambil = $koneksi->query("SELECT * FROM pasien WHERE id_pasien = '$_GET[id]'");
$pecah = $ambil->fetch_assoc();
?>

<h2 class="text-center"> Detail Data Pasien </h2>

<form action="#" method="POST" enctype="multipart/form-data">
    <div class="form-row justify-content-center">
        <div class="form-group col-md-5">
            <label for="no_rekam_medis">Nomor Rekam Medis</label>
            <input disabled type="text" class="form-control" id="no_rekam_medis" name="no_rekam_medis"
                value="<?=$pecah['no_rekam_medis']?>" required>
        </div>
        <div class="form-group col-md-5">
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <select disabled class="form-control" name="kepala_keluarga" id="">
                <option>--Pilih Kepala Keluarga--</option>
                <?php $ambil = $koneksi->query("SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
                <?php while ($tampil = $ambil->fetch_assoc()) { ?>
                <option <?php if ($tampil['nama'] == $pecah['nama_kp']) {
	echo "selected";
		} ?>><?php echo $tampil['nama'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-5">
            <label for=""> No KTP </label>
            <input disabled type="number" class="form-control" name="no_ktp" value="<?php echo $pecah['no_ktp'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for=""> Nama </label>
            <input disabled type="text" class="form-control" name="nama" value="<?php echo $pecah['nama'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for=""> Tanggal Lahir </label>
            <input disabled type="date" class="form-control" name="tanggal_lahir" value="<?php echo $pecah['umur'] ?>">
        </div>
        <div class="form-group col-md-5">
            <label for="jenis_kelamin">Jenis Kelamin</label>
            <select disabled name="jenis_kelamin" id="" class="form-control">
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
            <input disabled type="text" class="form-control" name="agama" value="<?php echo $pecah['agama'] ?>">

        </div>

        <div class="form-group col-md-5">
            <label for=""> Pekerjaan </label>
            <input disabled type="text" class="form-control" name="pekerjaan" value="<?php echo $pecah['pekerjaan'] ?>">
        </div>
        <div class="form-group col-md-10">
            <label for=""> Jenis Pasien </label>
            <select disabled name="jenis_pasien" id="" class="form-control">
                <option value="BPJS" <?php if ($pecah['jenis'] == "BPJS") {
				echo "selected";
			} ?>> BPJS </option>
                <option value="NON BPJS" <?php if ($pecah['jenis'] == "NON BPJS") {
				echo "selected";
			} ?>> NON BPJS </option>
            </select>
        </div>
        <?php if($pecah['no_bpjs'] != null) {?>
        <div class="form-group col-md-10">
            <label for="nomor_bpjs"> Nomor BPJS </label>
            <input disabled type="text" class="form-control" id="nomor_bpjs" name="nomor_bpjs"
                value="<?= $pecah['no_bpjs'] ?>" required>
        </div>
        <?php } ?>
        <div class="form-group col-md-10">
            <label for=""> Alamat </label>
            <textarea disabled name="alamat" rows="4" class="form-control"><?php echo $pecah['alamat']; ?></textarea>
        </div>

        <div class="text-center col-md-10">
            <a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali</a>
        </div>
    </div>

</form>