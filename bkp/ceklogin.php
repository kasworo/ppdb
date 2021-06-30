<?php
	include "config/konfigurasi.php";
	session_start();
	$user = mysqli_real_escape_string($sqlconn, $_REQUEST['user']);
	$passz = mysqli_real_escape_string($sqlconn, $_REQUEST['pass']);
	$pass = md5($passz);
	$sqlcek = mysqli_query($sqlconn, "SELECT nopend, pwd FROM tb_calsis WHERE nopend = '$user' OR nik='$user' OR nisn='$user' AND pwd = '$pass'");
	$cek=mysqli_num_rows($sqlcek);
	if($cek>0)
	{
		$row=mysqli_fetch_array($sqlcek);		
		$_SESSION['s_user']=$row['nopend'];
		echo 1;
	}
?>

