<?php 
    include "config/konfigurasi.php"; 
    session_start();
    $user = $_SESSION['s_user']; 	
    $tgl = date('Y-m-d H:i:s');
    $sql = mysqli_query($sqlconn , "UPDATE tb_calsis SET logakhir='$tgl' WHERE nopend='$user'");
    unset($_SESSION['s_user']);
    session_destroy();
    header('location:index.php');
?>
