<?php 
    include '../koneksi.php';
    $ambil = $koneksi->query("SELECT * FROM rekam AS r JOIN pasien AS p ON r.id_pasien=p.id_pasien WHERE r.id_rekam='$_GET[id]'");
    $pecah = $ambil->fetch_assoc();

    if(isset($_POST['transaksi'])){
        $id_rekam_medis = $_GET['id'];
        $total = $_POST['total'];
        if(isset($_POST['bayar'])){
            $bayar = $_POST['bayar'];
        }
        else{
            $bayar = $_POST['total'];
        }
        
        $status = 'Obat Telah Di Berikan';
        $jenis = $pecah['jenis'];

        $ambil_obat = $koneksi->query( "SELECT * FROM rekam_obat AS ro JOIN obat AS o ON ro.id_obat=o.id_obat WHERE ro.id_rekam_medis = '$_GET[id]'" );
        while ($pecah_obat = $ambil_obat->fetch_assoc()) {
            $stok = $pecah_obat['stok_obat'] - $pecah_obat['jumlah'];
            // var_dump($pecah_obat['id_obat']);die;
            $koneksi->query("UPDATE obat SET stok_obat='$stok' WHERE id_obat='$pecah_obat[id_obat]'");
        }
        $koneksi->query("UPDATE rekam SET status='$status' WHERE id_rekam='$_GET[id]'");

        $query = $koneksi->query("INSERT INTO transaksi (id_rekam_medis, total, bayar, jenis) VALUES ('$_GET[id]','$total','$bayar','$jenis')");
        if($query){
            echo "<div class='alert alert-success text-center'> Data Berhasil Disimpan </div>";
            echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=info'>";
        }else{
            echo "<div class='alert alert-danger text-center'> Data Gagal Disimpan </div>";
            // echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=poli'>";
        }
    }

?>
<form action="" method="post">
    <div class="row">
        <div class="col-md-4">
            <div class="form-group">
                <label for="disabledTextInput">PASIEN</label>
                <input type="text" value="<?=$pecah['nama']?>" disabled id="disabledTextInput" class="form-control"
                    placeholder="Disabled input">
            </div>
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon3">JENIS</span>
                </div>
                <input disabled type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3"
                    value="<?=$pecah['jenis']?>">
            </div>
            <div class="input-group mb-3">
                <button type="submit" name="transaksi" class="btn btn-primary btn-block">SELESAI</button>
            </div>

        </div>
        <div class="col-md-8">
            <div class="input-group mb-3 input-group-l" style="height:60px">
                <div class="input-group-prepend">
                    <?php $ambil_total = $koneksi->query( "SELECT * FROM rekam_obat AS ro JOIN obat AS o ON ro.id_obat=o.id_obat WHERE ro.id_rekam_medis = '$_GET[id]'" ) ?>
                    <?php $total=0;  while ($pecah_total = $ambil_total->fetch_assoc()) {
                    $total += $pecah_total['harga'] * $pecah_total['jumlah'];
                } ?>
                    <span class="input-group-text" id="basic-addon3">TOTAL</span>
                </div>
                <input style="height:60px; font-size:24pt;" readonly type="text" class="form-control text-right"
                    id="total" aria-describedby="basic-addon3" name="total" value="<?= $total ?>">
            </div>
            <?php if( $pecah['jenis'] == 'NON BPJS' ) : ?>
            <div class="row">
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">BAYAR</span>
                    </div>
                    <input type="number" class="form-control text-right" id="bayar" name="bayar" value="0"
                        aria-describedby="basic-addon3">
                </div>
                <div class="input-group mb-3 col-md-6">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon3">KEMBALI</span>
                    </div>
                    <input disabled type="number" class="form-control text-right" id="kembali"
                        aria-describedby="basic-addon3" value="0">
                </div>
            </div>
            <?php endif;?>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Obat</th>
                        <th scope="col">Harga</th>
                        <th scope="col">Qty</th>
                        <th scope="col">Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $ambil = $koneksi->query( "SELECT * FROM rekam_obat AS ro JOIN obat AS o ON ro.id_obat=o.id_obat WHERE ro.id_rekam_medis = '$_GET[id]'" ) ?>
                    <?php $no=0;  while ($pecah = $ambil->fetch_assoc()) : ?>
                    <tr>
                        <th scope="row"><?=++$no?></th>
                        <td><?= $pecah['nama_obat'] ?></td>
                        <td><?= $pecah['harga'] ?></td>
                        <td><?= $pecah['jumlah'] ?></td>
                        <td><?= $pecah['harga'] * $pecah['jumlah'] ?></td>
                    </tr>
                    <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
</form>

<script>
$(document).ready(function() {
    $("#bayar").on('input', function() {
        let bayar = $(this).val();
        $('#kembali').val(bayar - $('#total').val());
    });
});
</script>