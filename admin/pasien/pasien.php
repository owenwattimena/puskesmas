<?php
include '../koneksi.php';
?>
<h2 class="text-center"> Data Pasien </h2>
<div class="table-responsive">
    <a href="menu.php?halaman=tambah_pasien" class="btn btn-primary mb-5"> [+] Tambah Data</a>

    <table class="table table-bordered" id="dataTable">
        <thead>
            <tr>
                <th>No Rekam Medis</th>
                <th>No KTP</th>
                <th>Nama</th>
                <!-- <th>Nama Kepala Keluarga</th> -->
                <!-- <th>Pekerjaan</th> -->
                <!-- <th>Alamat</th> -->
                <th>Jenis Kelamin</th>
                <th>Umur</th>
                <!-- <th>Agama</th> -->
                <!-- <th>Tinggi Badan</th>
                <th>Berat Badan</th> -->
                <!-- <th>Tekanan Darah</th> -->
                <!-- <th>Suhu</th> -->
                <!-- <th>Keluhan</th> -->
                <th>Jenis</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $ambil = $koneksi->query("SELECT * FROM pasien") ?>

            <?php while ($tampil = $ambil->fetch_assoc()) { ?>
            <!-- <pre><?php print_r($tampil) ?></pre> -->

            <tr>
                <td><?php echo $tampil['no_rekam_medis'] ?></td>
                <td><?php echo $tampil['no_ktp'] ?></td>
                <td><?php echo $tampil['nama'] ?></td>
                <!-- <td><?php echo $tampil['nama_kp'] ?></td> -->
                <!-- <td><?php echo $tampil['pekerjaan'] ?></td> -->
                <!-- <td><?php echo $tampil['alamat'] ?></td> -->
                <td><?php echo $tampil['jenis_kelamin'] ?></td>
                <td><?php echo floor((time() - strtotime($tampil['umur'])) / (3600*24*365)); ?></td>
                <!-- <td><?php echo $tampil['agama'] ?></td> -->
                <!-- <td><?php echo $tampil['tinggi_badan'] ?></td>
                <td><?php echo $tampil['berat_badan'] ?></td> -->
                <!-- <td><?php echo $tampil['tekanan_darah'] ?></td> -->
                <!-- <td><?php echo $tampil['suhu'] ?></td> -->
                <!-- <td><?php echo $tampil['keluhan'] ?></td> -->
                <td><?php echo $tampil['jenis'] ?></td>
                <td>
                    <a href="menu.php?halaman=detail_pasien&id=<?php echo $tampil['id_pasien'] ?>"
                        class="badge badge-primary">
                        Detail</a>
                    <a href="menu.php?halaman=tambah_rekam&id=<?php echo $tampil['id_pasien'] ?>"
                        class="badge badge-success">
                        Rekam</a>
                    <a href="menu.php?halaman=ubah_pasien&id=<?php echo $tampil['id_pasien'] ?>"
                        class="badge badge-warning">
                        Ubah </a>
                    <a href="menu.php?halaman=hapus_pasien&id=<?php echo $tampil['id_pasien'] ?>"
                        onclick="return confirm('Apakah anda yakin akan menghapus data pasien ini??')"
                        class="badge badge-danger"> Hapus </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>