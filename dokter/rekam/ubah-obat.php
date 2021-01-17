<?php 
    include '../../koneksi.php';
    // echo json_encode($_POST);
    if(isset($_POST['rekam_obat'])){

        $id_rekam_obat = $_POST['id_rekam_obat'];
        $id_obat = $_POST['id_obat'];
        $jumlah = $_POST['jumlah'];
        $keterangan = $_POST['keterangan'];
        if($id_rekam_obat != 0){

            if($id_obat != ''){
                $query = $koneksi->query("UPDATE rekam_obat SET id_obat = '$id_obat', jumlah='$jumlah', keterangan='$keterangan' WHERE id_rekam_obat=$id_rekam_obat");
            }
        }else{
            $id_rekam_medis = $_GET['id'];
            $query = $koneksi->query("INSERT INTO rekam_obat (id_rekam_medis, id_obat, jumlah, keterangan) VALUES ('$id_rekam_medis', '$id_obat', '$jumlah','$keterangan')");
        }
    }
    if(isset($_POST['hapus_obat'])){
        $id_rekam_obat = $_POST['id_rekam_obat'];
        $query = $koneksi->query("DELETE FROM rekam_obat WHERE id_rekam_obat=$id_rekam_obat");
    }
?>