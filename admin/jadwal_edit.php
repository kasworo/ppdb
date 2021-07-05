<?php
    include "dbfunction.php";
    $jd=viewdata("tb_jadwal","kdjadwal",$_POST['id'])[0];
    $data=array(
       'kdjadwal'=>$jd['kdjadwal'],
       'awal'=>$jd['awal'],
       'akhir'=>$jd['akhir'],
       'kegiatan'=>$jd['kegiatan']

    );
    echo json_encode($data);
?>