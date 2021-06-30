<?php
if(isset($_POST['user'], $_POST['pass'])) 
{
	include "../config/konfigurasi.php";
	require("../config/fungsi_thn.php");
	$tgl=date('Y-m-d H:i:s');		
	$user = mysqli_real_escape_string($sqlconn, $_POST['user']);
	$passz = mysqli_real_escape_string($sqlconn, $_POST['pass']);
	$sqladmin = mysqli_query($sqlconn, "SELECT*FROM tb_user WHERE username = '$user' AND passwd = PASSWORD('$passz')");
	$cek=mysqli_num_rows($sqladmin);
	if($cek>0)
	{
		$row=mysqli_fetch_array($sqladmin);
		$userz = $row['username'];
		$loginz=$row['level'];
		setcookie('c_user',$userz);
		setcookie('c_login',$loginz);
		$qth=mysqli_query($sqlconn,"SELECT kdthpel FROM tb_thpel WHERE aktif='Y'");
		$th=mysqli_fetch_array($qth);
		setcookie('c_tahun',$th['kdthpel']);
        $sql = mysqli_query($sqlconn , "UPDATE tb_user SET logakhir='$tgl' WHERE username='$userz'");
        echo 1;	
	}
	else { 
        echo 0;
    }			
}
else {header("Location: login.php");}
?>

