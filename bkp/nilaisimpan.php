<?php
	include "config/konfigurasi.php";
	if($_REQUEST['aksi']=='simpan')
	{
		$cek=mysqli_num_rows(mysqli_query($sqlconn, "SELECT*FROM tb_nilai WHERE nopend='$_REQUEST[nopend]' AND kdmapel='$_REQUEST[kdmapel]' AND semester='$_REQUEST[semester]' AND jns='$_REQUEST[jns]'"));
		if($cek>0)
		{
			$sql=mysqli_query($sqlconn, "UPDATE tb_nilai SET nilai ='$_REQUEST[nilai]' WHERE nopend='$_REQUEST[nopend]' AND kdmapel='$_REQUEST[kdmapel]' AND jns='$_REQUEST[jns]' ");
			echo "Update Nilai Berhasil!";
		}
		else
		{
			$sql=mysqli_query($sqlconn, "INSERT INTO tb_nilai (semester, nopend, kdmapel, nilai, jns) VALUES ('$_REQUEST[semester]', '$_REQUEST[nopend]','$_REQUEST[kdmapel]','$_REQUEST[nilai]',  '$_REQUEST[jns]')");
			echo "Simpan Nilai Berhasil!";
		}
	}
	
?>