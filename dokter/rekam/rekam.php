<?php
include '../koneksi.php';
?>

<h2 class="text-center"> Rekam Pasien </h2>
<?php 
$ambil 	= $koneksi->query("SELECT * FROM rekam AS r JOIN pasien AS p ON r.id_pasien = p.id_pasien WHERE r.id_rekam = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<!--<pre><?php print_r($tampil); ?> </pre>-->
<form id="form-rekam" action="" method="POST" enctype="multipart/form-data" onsubmit="return false">
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
    <div class="form-group">
        <label for=""> Tinggi Badan (Cm) </label>
        <input type="text" class="form-control" readonly="" value="<?php echo $tampil['tinggi_badan'] ?>" name="jenis">
    </div>
    <div class="form-group">
        <label for=""> Berat Badan (Kg) </label>
        <input type="text" class="form-control" readonly="" value="<?php echo $tampil['berat_badan'] ?>" name="jenis">
    </div>
    <div class="form-group">
        <label for=""> Tekanan Darah </label>
        <input type="text" class="form-control" readonly="" value="<?php echo $tampil['tekanan_darah'] ?>" name="jenis">
    </div>
    <div class="form-group">
        <label for=""> Suhu (&#x2103;) </label>
        <input type="text" class="form-control" readonly="" value="<?php echo $tampil['suhu'] ?>" name="jenis">
    </div>
    <div class="form-group">
        <label for=""> Keluhan </label>
        <textarea readonly name="diagnosa" rows="4" class="form-control"><?php echo $tampil['keluhan'] ?></textarea>
    </div>
    <div class="form-group">
        <label for=""> Diagnosa </label>
        <textarea name="diagnosa" rows="4" class="form-control" id="diagnosa"></textarea>
    </div>
    <table id="table" class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Obat</th>
                <th scope="col">Keterangan</th>
                <th scope="col">
                    <button onClick="return false" class="btn btn-success btn-sm btn-table-add">
                        <i class="fa fa-plus"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr class="tr">
                <td>
                    <div class="form-group">
                        <select name="obat" class="form-control">
                            <option value="">--Obat---</option>
                            <?php $ambil = $koneksi->query("SELECT * FROM obat ORDER BY nama_obat ASC") ?>
                            <?php while ($obat = $ambil->fetch_assoc()) {?>
                            <option value="<?=$obat['id_obat'] ?>"><?=$obat['nama_obat'] ?> (<?=$obat['jenis_obat'] ?>)
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number" name="jumlah" placeholder="jumlah" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="keterangan" placeholder="keterangan" class="form-control">
                    </div>
                </td>
                <td>
                    <i class="fa fa-times-circle x-row"></i>
                </td>
            </tr>

            <tr class="d-none">
                <td>
                    <div class="form-group">
                        <select name="obat" class="form-control">
                            <option value="">--Obat---</option>
                            <?php $ambil = $koneksi->query("SELECT * FROM obat ORDER BY nama_obat ASC") ?>
                            <?php while ($obat = $ambil->fetch_assoc()) {?>
                            <option value="<?=$obat['id_obat'] ?>"><?php echo $obat['nama_obat'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number" name="jumlah" placeholder="jumlah" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="keterangan" placeholder="keterangan" class="form-control">
                    </div>
                </td>
                <td>
                    <i class="fa fa-times-circle x-row"></i>
                </td>
            </tr>
        </tbody>
    </table>
    <!-- <button class="btn btn-primary" name="proses"> Tambah Resep </button><br> -->
    <!-- <?php if(isset($_POST['proses'])) {?> -->
    <!-- <div class="form-row"> -->
    <!-- <div class="form-group col-md-4">
            <select name="obat" id="" class="form-control">
                <option value="">--Obat---</option>
                <?php $ambil = $koneksi->query("SELECT * FROM obat ORDER BY nama_obat ASC") ?>
                <?php while ($obat = $ambil->fetch_assoc()) {?>
                <option><?php echo $obat['nama_obat'] ?></option>
                <?php } ?>
            </select>
        </div> -->

    <!-- <div class="form-group col-md-4">
            <input type="text" name="keterangan" placeholder="keterangan" class="form-control">
        </div> -->
    <!-- <?php } ?> -->
    <button class="btn btn-success" id="btn-rekam" name="rekam"> Periksa </button>
    <a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali </a>
</form>

<!-- loading -->
<div id="ajax-loader" class="text-center center d-none" style="
    background-color: rgba(0,0,0,0.3);
    position: fixed; 
    top: 0; bottom: 0;
    right: 0; left: 0; 
    z-index: 3000;">
    <img style="position: absolute; top: 50%; margin-top: -70px" src="../dist/img/ajax-loader.gif" alt="">
</div>
<?php
if (isset($_POST['rekam'])) {
	$tanggal = $_POST['tanggal'];
	$pasien = $_POST['pasien'];
	$jenis = $_POST['jenis'];
	$diagnosa = $_POST['diagnosa'];
	$obat = $_POST['obat'];
	$jenis_obat = $_POST['jenis_obat'];
	$keterangan = $_POST['keterangan'];

	$koneksi->query("UPDATE rekam SET pasien = '$pasien', tanggal = '$tanggal', diagnosa = '$diagnosa', jenis = '$jenis', status = 'Telah Di Periksa', obat = '$obat', jenis_obat = '$jenis_obat', keterangan = '$keterangan' WHERE id_rekam = '$_GET[id]'"); 

	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
	/*echo " <meta http-equiv='refresh' content='1;url=menu.php?halaman=info'>";*/
}
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
// function tambah baris
function tambah_baris(tabel) {
    var duplikat = tabel.find('tr.d-none').clone(true);
    duplikat.removeClass('d-none');
    duplikat.addClass('tr');
    tabel.append(duplikat);
}

// function hapus baris
function hapus_baris(tr) {
    tr.parents('tr').detach();
}

$(document).ready(function() {
    var $TABLE = $('#table');
    // tambah baris
    $('.btn-table-add').click(function() {
        tambah_baris($TABLE);
    });

    // hapus baris
    $('tr .x-row').on('click', function() {
        let tr = $(this);
        hapus_baris(tr);
    });

    $('#btn-rekam').click(function() {
        let urlRekam = `<?=$_SESSION['base_url']?>dokter/rekam/diagnosa.php?id=<?=$_GET['id']?>`;
        let url = `<?=$_SESSION['base_url']?>dokter/rekam/obat.php`;

        ajaxStart()

        $TABLE.find('tbody .tr').each(function(i, e) {
            let $td = $(this).find('td');
            let $id_obat = $td.eq(0).children().eq(0).children().eq(0)
                .val();
            let $jumlah = $td.eq(1).children().eq(0).children().eq(0)
                .val();
            let $keterangan = $td.eq(2).children().eq(0).children().eq(0)
                .val();

            let data = new FormData();
            data.append('id_rekam_medis', `<?=$_GET['id']?>`);
            data.append('id_obat', $id_obat);
            data.append('jumlah', $jumlah);
            data.append('keterangan', $keterangan);
            data.append('rekam_obat', true);

            $.ajax({
                url: url,
                type: "POST",
                data: data,
                dataType: "json",
                processData: false,
                contentType: false,
                success: function(result) {},
            });
        });

        let diagnosa = $('#diagnosa').val();
        let data = new FormData();
        data.append('diagnosa', diagnosa);
        $.ajax({
            url: urlRekam,
            type: "POST",
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(response) {
                console.log(response);
                ajaxStop();
                if (response.status == true) {
                    showToast('Success', 'Data berhasil di simpan!', 'success');
                } else {
                    showToast('Error', 'Data gagal di simpan!', 'error');
                }
            },
            error: function(e) {
                ajaxStop();
                console.log(e);
                showToast('Error', 'Data gagal di simpan!', 'error');
            }
        });

    });
});

function ajaxStart() {
    $('#ajax-loader').removeClass('d-none');

}

function ajaxStop() {
    $('#ajax-loader').addClass('d-none');

}

function showToast(title, subtitle, status) {
    Swal.fire(
        title,
        subtitle,
        status
    );
}
</script>