<?php
	include "../config/konfigurasi.php";
	$qs=mysqli_query($sqlconn,"SELECT*FROM tb_seleksi WHERE kdthpel='$_POST[thpel]'");
	$s=mysqli_fetch_array($qs);
	echo json_encode($s);
?>