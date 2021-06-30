<?php
	include "../config/konfigurasi.php";
	$sql=mysqli_query($sqlconn, "SELECT kdsyarat, ada FROM tb_ceklis WHERE nopend='$_POST[id]' AND kdsyarat='$_POST[s]'");
	$qcek=mysqli_num_rows($sql);
	if($qcek>0)
	{
		$sta=mysqli_fetch_array($sql);
		$status=$sta['ada'];
		if($status=='1'){$ubah='0';} else {$ubah='1';}
		$sql=mysqli_query($sqlconn, "UPDATE tb_ceklis SET ada ='$ubah' WHERE nopend='$_POST[id]' AND kdsyarat='$_POST[s]'");
	}
	else
	{
		$sql=mysqli_query($sqlconn, "INSERT INTO tb_ceklis (nopend, kdsyarat, ada) VALUES ('$_POST[id]','$_POST[s]','1')");
	}
?>