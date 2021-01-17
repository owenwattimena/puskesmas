<?php 
    include '../../koneksi.php';
    // echo json_encode($_POST);
    if(isset($_POST['rekam_obat'])){

        $id_rekam_medis = $_POST['id_rekam_medis'];
        $id_obat = $_POST['id_obat'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        if($id_obat != ''){
            $query = $koneksi->query("INSERT INTO rekam_obat (id_rekam_medis, id_obat, jumlah, keterangan) VALUES ('$id_rekam_medis', '$id_obat', '$jumlah', '$keterangan')");
        }
    }
?>