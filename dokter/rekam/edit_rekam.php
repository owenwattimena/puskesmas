<?php include '../koneksi.php';?>

<h2 class="text-center"> Rekam Pasien </h2>
<?php 
$ambil 	= $koneksi->query("SELECT * FROM rekam AS r JOIN pasien AS p ON r.id_pasien = p.id_pasien WHERE r.id_rekam = '$_GET[id]'");
$tampil = $ambil->fetch_assoc();
?>
<!--<pre><?php print_r($tampil) ?></pre>-->
<form action="" method="POST" enctype="multipart/form-data" onsubmit="return false">
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
        <label for=""> Diagnosa </label>
        <textarea name="diagnosa" id="diagnosa" rows="4"
            class="form-control"><?php echo $tampil['diagnosa'] ?></textarea>
    </div>
    <table id="table" class="table table-bordered text-center">
        <thead>
            <tr>
                <th scope="col">Obat</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Keterangan</th>
                <th scope="col">
                    <button onClick="return false" class="btn btn-success btn-sm btn-table-add">
                        <i class="fa fa-plus"></i>
                    </button>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php $ambil_rekam_obat = $koneksi->query("SELECT * FROM rekam_obat WHERE id_rekam_medis=$_GET[id]");?>
            <?php while($tampil_rekam_obat = $ambil_rekam_obat->fetch_assoc()) {?>
            <tr class="tr" data-id_rekam_obat="<?=$tampil_rekam_obat['id_rekam_obat']?>">
                <td>
                    <div class="form-group">
                        <select name="obat" class="form-control">
                            <option value="">--Obat---</option>
                            <?php $ambil = $koneksi->query("SELECT * FROM obat ORDER BY nama_obat ASC") ?>
                            <?php while ($obat = $ambil->fetch_assoc()) {?>
                            <option <?= ($tampil_rekam_obat['id_obat'] == $obat['id_obat']) ? 'selected' : '' ?>
                                value="<?=$obat['id_obat'] ?>"><?=$obat['nama_obat'] ?> (<?=$obat['jenis_obat'] ?>)
                            </option>
                            <?php } ?>
                        </select>
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="number" name="jumlah" placeholder="jumlah"
                            value="<?= $tampil_rekam_obat['jumlah'] ?>" class="form-control">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" name="keterangan" placeholder="keterangan"
                            value="<?= $tampil_rekam_obat['keterangan'] ?>" class="form-control">
                    </div>
                </td>
                <td>
                    <i class="fa fa-times-circle x-row"></i>
                </td>
            </tr>
            <?php }?>

            <tr class="d-none" data-id_rekam_obat="0">
                <td>
                    <div class="form-group">
                        <select name="obat" class="form-control">
                            <option value="">--Obat---</option>
                            <?php $ambil = $koneksi->query("SELECT * FROM obat ORDER BY nama_obat ASC") ?>
                            <?php while ($obat = $ambil->fetch_assoc()) {?>
                            <option value="<?=$obat['id_obat'] ?>"><?php echo $obat['nama_obat'] ?>
                                (<?=$obat['jenis_obat'] ?>)</option>
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
    <button id="btn-rekam" class="btn btn-success" name="rekam"> Update </button>
    <a href="menu.php?halaman=pasien" class="btn btn-warning"> Kembali </a>
</form>
<?php
// if (isset($_POST['rekam'])) {
// 	$tanggal = $_POST['tanggal'];
// 	$pasien = $_POST['pasien'];
// 	$jenis = $_POST['jenis'];
// 	$diagnosa = $_POST['diagnosa'];
// 	$obat = $_POST['obat'];
// 	$jenis_obat = $_POST['jenis_obat'];
// 	$keterangan = $_POST['keterangan'];

// 	$koneksi->query("UPDATE rekam SET pasien = '$pasien', tanggal = '$tanggal', diagnosa = '$diagnosa', jenis = '$jenis', status = 'Telah Di Periksa', obat = '$obat', jenis_obat = '$jenis_obat', keterangan = '$keterangan' WHERE id_rekam = '$_GET[id]'"); 

// 	echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
// 	echo " <meta http-equiv='refresh' content='1;url=menu.php?halaman=info'>";
// }
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
        let url = `<?=$_SESSION['base_url']?>dokter/rekam/ubah-obat.php`;

        let tr = $(this);
        let data = new FormData();
        data.append('id_rekam_obat', tr.parents('tr').data('id_rekam_obat'));
        data.append('hapus_obat', true);

        $.ajax({
            url: url,
            type: "POST",
            data: data,
            dataType: "json",
            processData: false,
            contentType: false,
            success: function(result) {},
        });
        hapus_baris(tr);
    });

    $('#btn-rekam').click(function() {
        let urlRekam = `<?=$_SESSION['base_url']?>dokter/rekam/diagnosa.php?id=<?=$_GET['id']?>`;
        let url = `<?=$_SESSION['base_url']?>dokter/rekam/ubah-obat.php?id=<?=$_GET['id']?>`;

        ajaxStart()

        $TABLE.find('tbody .tr').each(function(i, e) {
            let $td = $(this).find('td');
            let $id_obat = $td.eq(0).children().eq(0).children().eq(0)
                .val();
            let $jumlah = $td.eq(1).children().eq(0).children().eq(0)
                .val();
            let $keterangan = $td.eq(2).children().eq(0).children().eq(0)
                .val();
            // console.log($id_obat);
            // console.log($keterangan);
            // console.log($(this).data('id_rekam_obat'));
            let data = new FormData();
            data.append('id_rekam_obat', $(this).data('id_rekam_obat'));
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