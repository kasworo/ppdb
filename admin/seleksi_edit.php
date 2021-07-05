<?php
	include "dbfunction.php";
	$qs=mysqli_query($conn,"SELECT*FROM tb_seleksi WHERE kdthpel='$_POST[thpel]'");
	$s=mysqli_fetch_array($qs);
	echo json_encode($s);
?>