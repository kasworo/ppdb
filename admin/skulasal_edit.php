<?php
	include "../config/konfigurasi.php";
	$qs=mysqli_query($sqlconn,"SELECT*FROM tb_skul_asal WHERE idskulasal='$_POST[id]'");
	$s=mysqli_fetch_array($qs);
	echo json_encode($s);
?>