<?php 
    include '../../koneksi.php';

    $diagnosa = $_POST['diagnosa'];
    $response = ['status' => true];
    $query = $koneksi->query("UPDATE rekam SET diagnosa = '$diagnosa', status = 'Telah Di Periksa' WHERE id_rekam = '$_GET[id]'"); 
    if($query){
        echo json_encode($response);
    }else{
        $response = ['status' => true];
        echo json_encode($response);
    }
?>