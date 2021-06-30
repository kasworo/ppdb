<?php
	include "../config/konfigurasi.php";
	$sql=mysqli_query($sqlconn, "SELECT count(*) as jml FROM tb_syarat WHERE kdthpel='$_COOKIE[c_tahun]'");
	$d=mysqli_fetch_array($sql);
	$kdthpel = $_COOKIE['c_tahun'];
	$urut=$d['jml']+1;
	if($urut>9)
	{
		$urt=substr('00'.$urut,1,3);
	}
	else
	{
		$urt=substr('00'.$urut,0,3);	
	}

	echo "S".$kdthpel.$urt;
?>