<?php
	include "dbfunction.php";
	$sql=mysqli_query($conn, "SELECT kdsyarat, ada FROM tb_ceklis WHERE idcalsi='$_POST[id]' AND kdsyarat='$_POST[sy]'");
	$qcek=mysqli_num_rows($sql);
	if($qcek>0)
	{
		$sta=mysqli_fetch_array($sql);
		$status=$sta['ada'];
		if($status=='1'){$ubah='0';} else {$ubah='1';}
		$sql=mysqli_query($conn, "UPDATE tb_ceklis SET ada ='$ubah' WHERE idcalsis='$_POST[id]' AND kdsyarat='$_POST[sy]'");
	}
	else
	{
		$sql=mysqli_query($conn, "INSERT INTO tb_ceklis (idcalsis, kdsyarat, ada) VALUES ('$_POST[id]','$_POST[sy]','1')");
	}
?>