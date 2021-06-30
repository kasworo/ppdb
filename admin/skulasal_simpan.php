<?php
	if(!isset($_COOKIE['c_user'])){header("Location: login.php");}
    include "../config/konfigurasi.php";
    $qcek=mysqli_query($sqlconn,"SELECT*FROM tb_skul_asal WHERE idskulasal='$_POST[idskul]'");
	$cek=mysqli_num_rows($qcek);
	if($cek==0)
	{
		$sql=mysqli_query($sqlconn, "INSERT INTO tb_skul_asal (idskulasal, nmskulasal, almtskulasal) VALUES ('$_POST[idskul]','$_POST[nama]','$_POST[alamat]')");
			echo 'Simpan Data Sekolah Asal Berhasil!';
	}
    else
	{
		$sql=mysqli_query($sqlconn, "UPDATE tb_skul_asal SET nmskulasal= '$_POST[nama]', almtskulasal='$_POST[alamat]' WHERE idskulasal='$_POST[idskul]'");
		echo 'Update Data Sekolah Asal Berhasil!';
	}
?>