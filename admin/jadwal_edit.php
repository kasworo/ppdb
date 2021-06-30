<?php
    include "../config/konfigurasi.php";
    $sql=mysqli_query($sqlconn,"SELECT*FROM tb_jadwal WHERE kdjadwal='$_POST[id]'");
    $j=mysqli_fetch_array($sql);
    echo json_encode($j);
?>