<?php
	if(!isset($_COOKIE['c_user'])){header("Location: login.php");}
    include "../config/konfigurasi.php";
    $qcek=mysqli_query($sqlconn,"SELECT*FROM tb_syarat WHERE kdsyarat='$_POST[id]'");
	$cek=mysqli_num_rows($qcek);
	if($cek==0)
	{
		$sql=mysqli_query($sqlconn, "INSERT INTO tb_syarat (kdsyarat, kdthpel, nmsyarat, aktif) VALUES ('$_POST[id]','$_COOKIE[c_tahun]','$_POST[syarat]','1')");
			echo 'Simpan Data Persyaratan PPDB Berhasil!';
	}
    else
	{
		$sql=mysqli_query($sqlconn, "UPDATE tb_syarat SET  nmsyarat='$_POST[syarat]' WHERE kdsyarat='$_POST[id]'");
		echo 'Update Data Persyaratan PPDB Berhasil!';
	}
		
?>