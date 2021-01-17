<?php include '../koneksi.php'; ?>

<h2 class="text-left mb-4"> Data Kepala Keluarga </h2>
<div class="table-responsive">
    <table class="table table-bordered text-center" id="dataTable">
        <thead>
            <tr>
                <th> No KTP </th>
                <th> Nama </th>
                <th> Pekerjaan </th>
                <th> Alamat </th>
                <th> Jenis Kelamin </th>
                <th> Umur </th>
                <th> Agama </th>
                <th> Tinggi Badan </th>
                <th> Berat Badan </th>
                <th> <a href="menu.php?halaman=tambah_kp" class="btn btn-primary"> [+] Tambah Data </a> </th>
            </tr>
        </thead>
        <tbody>
            <?php $ambil = $koneksi->query("SELECT * FROM kepala_keluarga"); ?>
            <?php while ($tampil = $ambil->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $tampil['no_ktp'] ?></td>
                <td><?php echo $tampil['nama'] ?></td>
                <td><?php echo $tampil['pekerjaan'] ?></td>
                <td><?php echo $tampil['alamat'] ?></td>
                <td><?php echo $tampil['jenis_kelamin'] ?></td>
                <td><?php echo floor((time() - strtotime($tampil['umur'])) /(3600*24*365)); ?></td>
                <td><?php echo $tampil['agama'] ?></td>
                <td><?php echo $tampil['tinggi_badan'] ?></td>
                <td><?php echo $tampil['berat_badan'] ?></td>
                <td>
                    <a href="menu.php?halaman=edit_kp&id=<?php echo $tampil['id_kp'] ?>" class="btn btn-info"> Edit
                    </a>
                    <a href="menu.php?halaman=hapus_kp&id=<?php echo $tampil['id_kp'] ?>"
                        onclick="return confirm('Apakah anda yakin untuk menghapus data ini?')" class="btn btn-danger">
                        Hapus </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>