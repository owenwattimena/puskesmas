<?php 
include '../koneksi.php'; 
?>
<h2 class="text-center"> Data Obat </h2>
<a href="menu.php?halaman=tambah_obat" class="btn btn-primary mb-3"> [+]Tambah Obat</a>

<table class="table table-bordered text-center" id="dataTable">
    <thead>
        <tr>
            <th> Nama Obat </th>
            <th> Jenis Obat </th>
            <th> Harga </th>
            <th> Stok Obat </th>
            <th> Tanggal Kadaluarsa </th>
            <th> Aksi </th>
        </tr>
        <thead>
        <tbody>
            <?php $ambil = $koneksi->query("SELECT * FROM obat"); ?>
            <?php while ($tampil = $ambil->fetch_assoc()) {?>
            <tr>
                <td><?php echo $tampil['nama_obat'] ?></td>
                <td><?php echo $tampil['jenis_obat'] ?></td>
                <td><?php echo $tampil['harga'] ?></td>
                <td><?php echo $tampil['stok_obat'] ?></td>
                <td><?php echo $tampil['tanggal_kadaluarsa'] ?></td>
                <td>
                    <a href="menu.php?halaman=edit_obat&id=<?php echo $tampil['id_obat'] ?>" class="btn btn-warning">
                        Edit </a>
                    <a href="menu.php?halaman=hapus_obat&id=<?php echo $tampil['id_obat'] ?>" class="btn btn-danger"
                        onclick="return confirm('Apakah Anda Yakin Akan Menghapus Data Obat Ini??')"> Hapus </a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
</table>