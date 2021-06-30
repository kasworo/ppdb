<?php
	include "konfigurasi.php";
	$sql=mysqli_query($sqlconn, "SELECT*FROM tb_thpel WHERE kdthpel='$_REQUEST[txt_kdthpel]'");
	$d=mysqli_fetch_array($sql);
	$kdthpel = substr($d['kdthpel'],2,3);
	$sql0=mysqli_query($sqlconn, "SELECT count(*) as jml FROM tb_syarat WHERE kdthpel='$_REQUEST[txt_kdthpel]'");
	$d0=mysqli_fetch_array($sql0);
	$urut=$d0['jml']+1;
	$urt=substr('0'.$urut,0,2);
	echo "S-".$kdthpel.$urt;
?>