<?php
    include "../config/konfigurasi.php";
    $sql=mysqli_query($sqlconn,"SELECT kdsyarat, nmsyarat FROM tb_syarat WHERE kdsyarat='$_POST[id]' AND kdthpel='$_COOKIE[c_tahun]'");
    $sy=mysqli_fetch_array($sql);
    echo json_encode($sy);
?>