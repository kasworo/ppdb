<?php
    include "dbfunction.php";
	if($_POST['m']=='1'){
		$cek=cekdata("tb_jadwal","kdjadwal",$_POST['id']);
		if($cek==0)
		{
			$data=array(
				'kdjadwal'=>$_POST['id'],
				'kdthpel'=>getthpel(),
				'awal'=>$_POST['awal'],
				'akhir'=>$_POST['akhir'],
				'kegiatan'=>$_POST['uraian']
			);
			$rows=addata("tb_jadwal",$data);

		}
		else
		{
			$data=array(
				'awal'=>$_POST['awal'],
				'akhir'=>$_POST['akhir'],
				'kegiatan'=>$_POST['uraian']
			);
			$rows=editdata("tb_jadwal",$data,"kdjadwal",$_POST['id']);
			
		}
	}

	echo $rows;
?>