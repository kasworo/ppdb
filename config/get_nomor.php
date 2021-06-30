<?php
	include "konfigurasi.php";
	$sql=mysqli_query($sqlconn, "SELECT*FROM tb_thpel WHERE kdthpel='$_REQUEST[txt_kdthpel]'");
	$d=mysqli_fetch_array($sql);
	$kdthpel = $d['kdthpel'];
	$sql0=mysqli_query($sqlconn, "SELECT count(*) as jml FROM tb_calsis WHERE kdthpel='$_REQUEST[txt_kdthpel]'");
	$d0=mysqli_fetch_array($sql0);
	$urut=$d0['jml']+1;
	if($urut>9)
	{
		$urt=substr('000'.$urut,1,4);
	}
	else
	{
		$urt=substr('000'.$urut,0,4);	
	}

	echo "PSB".$kdthpel.$urt;
?>