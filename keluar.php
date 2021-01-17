<?php 
session_start();
session_destroy();
echo "<script>alert('Keluar Berhasil'); </script>";
echo "<script>location='index.php';</script>";
?> 


