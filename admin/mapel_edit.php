<?php
    include "../config/konfigurasi.php";
    $qm=mysqli_query($sqlconn,"SELECT*FROM tb_mapel WHERE kdmapel='$_POST[id]'");
    $m=mysqli_fetch_array($qm);
    echo json_encode($m);
?>