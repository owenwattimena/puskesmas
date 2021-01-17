<?php include '../koneksi.php'; ?>

<h2 class="text-left mb-4"> Data Poli </h2>
<table class="table table-bordered text-center" id="dataTable">
    <thead>
        <tr>
            <th> Poli </th>
            <th> Dokter </th>
            <th> <a href="menu.php?halaman=tambah_poli" class="btn btn-primary"> [+] Tambah Poli </a> </th>
        </tr>
    </thead>
    <tbody>
        <?php $ambil = $koneksi->query("SELECT p.id, p.nama_poli, u.nama_lengkap FROM poli AS p JOIN user AS u ON p.id_user = u.id_user WHERE u.sebagai = 'Dokter' "); ?>
        <?php while ($tampil = $ambil->fetch_assoc()) {?>
        <tr>
            <td><?php echo $tampil['nama_poli']; ?></td>
            <td><?php echo $tampil['nama_lengkap']; ?></td>
            <td> <a href="menu.php?halaman=edit_poli&id=<?php echo $tampil['id'] ?>" class="btn btn-info"> Edit
                    Data </a>
                <a href="menu.php?halaman=hapus_poli&id=<?php echo $tampil['id'] ?>" class="btn btn-danger"
                    onclick="return confirm('Apakah anda yakin ingin menghapus poli ini?') "> Hapus </a>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>