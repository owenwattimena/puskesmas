<!-- <?php include '../koneksi.php'; ?> -->

<h2 class="text-center"> Rekam Medis </h2><br>
<table class="table table-bordered text-center" id="dataTable">
    <thead>
        <tr>
            <th>No urut</th>
            <th>Pasien</th>
            <th>Tanggal</th>
            <th>Diagnosa</th>
            <th>Jenis</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php $nomor = 1; ?>
        <?php $ambil = $koneksi->query("SELECT * FROM rekam AS r JOIN pasien AS p ON r.id_pasien = p.id_pasien JOIN poli AS pol ON r.id_poli = pol.id WHERE r.id_poli = {$_SESSION['dokter']['id']}") ?>
        <?php while ($tampil = $ambil->fetch_assoc()) {?>
        <tr>
            <!--<pre><?php print_r($tampil); ?> </pre>-->
            <td><?php echo $nomor ?></td>
            <td><?php echo $tampil['nama'] ?></td>
            <td><?php echo $tampil['tanggal'] ?></td>
            <td><?php echo $tampil['diagnosa'] ?></td>
            <td><?php echo $tampil['jenis'] ?></td>
            <td><?php echo $tampil['status'] ?></td>
            <td>
                <?php if ($tampil['status'] == "Telah Di Periksa"):?>
                <a href="menu.php?halaman=edit_rekam&id=<?php echo $tampil['id_rekam'] ?>" class="btn btn-warning"> Edit
                </a>
                <?php endif ?>
                <!--- Tombol untuk membuka modal -->
                <?php if ($tampil['status'] !=="Belum Di Periksa"):?>
                <button type="button" class="btn btn-primary" data-toggle="modal"
                    data-target="#Id<?php echo $tampil['id_rekam'] ?>"> Laporan </button>
                <!--- Modal -->
                <div class="modal" id="Id<?php echo $tampil['id_rekam'] ?>">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <!--- Header Modal -->
                            <div class="modal-header">
                                <h4 class="modal-title"> Laporan Singkat </h4>
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                            </div>
                            <!-- Modal Body -->
                            <div class="modal-body">
                                <table class="table-borderless w100">
                                    <tr>
                                        <th>Obat</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                    <?php $ambil_obat = $koneksi->query("SELECT * FROM rekam_obat JOIN obat ON rekam_obat.id_obat=obat.id_obat WHERE rekam_obat.id_rekam_medis=$tampil[id_rekam]") ?>
                                    <?php while ($tampil_obat = $ambil_obat->fetch_assoc()) {?>
                                    <tr>
                                        <td><?php echo $tampil_obat['nama_obat'] ?></td>
                                        <td><?php echo $tampil_obat['jumlah'] ?></td>
                                        <td><?php echo $tampil_obat['keterangan'] ?></td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </div>
                            <!-- Modal Footer -->
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal"> Tutup </button>
                                <?php if ($tampil['status'] =="Obat Telah Di Berikan"):?>
                                <a href="menu.php?halaman=laporan&id=<?php echo $tampil['id_rekam'] ?>"
                                    class="btn btn-primary"> Lebih Lengkap </a>
                                <?php endif ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif ?>
                <?php if ($tampil['status'] == "Belum Di Periksa"):?>
                <a href="menu.php?halaman=rekam&id=<?php echo $tampil['id_rekam'] ?>" class="btn btn-info"> Periksa </a>
                <?php endif ?>
            </td>
        </tr>
        <?php $nomor++; ?>
        <?php } ?>
    </tbody>
</table>