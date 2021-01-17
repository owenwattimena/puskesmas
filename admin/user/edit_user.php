<?php 
include '../koneksi.php';

if (isset($_POST['simpan'])) {
	$nama = $_POST['nama_lengkap'];
	$email = $_POST['email'];
	$no_telp = $_POST['no_telp'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$jenis = $_POST['jenis_user'];
	
	$koneksi->query("UPDATE user SET nama_lengkap = '$nama', email = '$email', no_telp = '$no_telp', username = '$username', password = '$password', sebagai = '$jenis' WHERE id_user = '$_GET[id]'");


   	echo "<div class='alert alert-success text-center'> Data Berhasil Diedit </div>";
   	echo "<meta http-equiv='refresh' content='1;url=menu.php?halaman=user'>";
}
?>

<h2 class="text-center"> Tambah User </h2>
<?php $ambil = $koneksi->query("SELECT * FROM user WHERE id_user = '$_GET[id]' ");
	$tampil = $ambil->fetch_assoc();
?>
<!--<pre><?php print_r($tampil); ?> </pre>-->
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="Nama"> Nama Lengkap </label>
        <input type="text" class="form-control" name="nama_lengkap" value="<?php echo $tampil['nama_lengkap'] ?>">
    </div>
    <div class="form-group">
        <label for="Email"> Email </label>
        <input type="text" class="form-control" name="email" value="<?php echo $tampil['email'] ?>">
    </div>
    <div class="form-group">
        <label for="No"> No Telp </label>
        <input type="text" class="form-control" name="no_telp" value="<?php echo $tampil['no_telp'] ?>">
    </div>
    <div class="form-group">
        <label for="Username"> Username</label>
        <input type="text" class="form-control" name="username" value="<?php echo $tampil['username'] ?>">
    </div>
    <div class="form-group">
        <label for="Password"> Password </label>
        <input type="password" class="form-control" name="password" value="<?php echo $tampil['password'] ?>">
    </div>
    <div class="form-group">
        <label form="Jenis_user">Jenis User</label>
        <select class="form-control" id="Jenis_user" name="jenis_user">
            <option value="Admin" <?php if ($tampil['sebagai']== "Admin") { echo "selected";
		} ?>> Admin </option>
            <option value="Dokter" <?php if ($tampil['sebagai']== "Dokter") { echo "selected";
		} ?>> Dokter</option>
            <option value="Apoteker" <?php if ($tampil['sebagai']== "Apoteker") { echo "selected";
		} ?>> Apoteker</option>
        </select>
    </div>

    <button class="btn btn-primary" name="simpan"> Simpan </button>
    <a href="" class="btn btn-warning"> Kembali </a>
</form>