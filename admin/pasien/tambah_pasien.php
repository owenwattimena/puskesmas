<?php
    include '../koneksi.php';
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
    
        $koneksi->query("INSERT INTO pasien
            (no_rekam_medis,
            no_ktp, 
            nama, 
            nama_kp, 
            pekerjaan, 
            alamat, 
            jenis_kelamin, 
            umur, 
            agama, 
            jenis,
            no_bpjs) 
            VALUES
            ('$no_rekam_medis',
            '$no_ktp', 
            '$nama', 
            '$nama_kp',  
            '$pekerjaan',  
            '$alamat', 
            '$jenis', 
            '$tanggal', 
            '$agama', 
             
            '$jenis_ps',
            '$no_bpjs')");
    
        echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
        echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=pasien'>";
    }
?>

<h2 class="text-center mb-5"> Tambah Data Pasien </h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-row justify-content-center">
        <div class="form-group col-md-5">
            <label for="no_rekam_medis">Nomor Rekam Medis</label>
            <input type="text" class="form-control" id="no_rekam_medis" name="no_rekam_medis" required>
        </div>
        <div class="form-group col-md-5">
            <label for="kepala_keluarga">Kepala Keluarga</label>
            <select class="form-control" name="kepala_keluarga" id="" required>
                <option>--Pilih Kepala Keluarga--</option>
                <?php $ambil = $koneksi->query("SELECT * FROM kepala_keluarga ORDER BY nama ASC") ?>
                <?php while ($tampil = $ambil->fetch_assoc()) { ?>
                <option><?php echo $tampil['nama'] ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="form-group col-md-5">
            <label for=""> No KTP </label>
            <input type="number" class="form-control" name="no_ktp" required>
        </div>
        <div class="form-group col-md-5">
            <label for=""> Nama </label>
            <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="form-group col-md-5">
            <label for=""> Tanggal Lahir </label>
            <input type="date" class="form-control" name="tanggal_lahir" required>
        </div>
        <div class="form-group col-md-5">
            <label for=""> Jenis Kelamin </label>
            <select class="form-control" name="jenis_kelamin" id="" required>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
        <div class="form-group col-md-5">
            <label for=""> Agama </label>
            <select name="agama" id="" class="form-control" required>
                <option value="Islam"> ISLAM </option>
                <option value="Kristen"> Kristen </option>
                <option value="Hindu"> Hindu </option>
                <option value="Budha"> Budha </option>
            </select>
        </div>

        <div class="form-group col-md-5">
            <label for=""> Pekerjaan </label>
            <input type="text" class="form-control" name="pekerjaan" required>
        </div>

        <div class="form-group col-md-10">
            <label for=""> Jenis Pasien </label>
            <select name="jenis_pasien" id="jenis_pasien" class="form-control" required>
                <option value="BPJS" id="bpjs"> BPJS </option>
                <option value="NON BPJS" id="non_bpjs"> Non BPJS </option>
            </select>
        </div>
        <div class="form-group col-md-10" id="nomor_bpjs">
            <label for="no_bpjs"> Nomor BPJS </label>
            <input type="text" class="form-control" id="no_bpjs" name="no_bpjs">
        </div>
        <div class="form-group col-md-10">
            <label for=""> Alamat </label>
            <textarea name="alamat" rows="4" class="form-control" required></textarea>
        </div>
    </div>
    <div class="text-center">
        <button class="btn btn-primary" name="simpan"> Simpan </button>
        <a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali</a>
    </div>
</form>
<script type="text/javascript">
$(document).ready(function() {

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