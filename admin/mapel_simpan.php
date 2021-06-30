<?php
	if(!isset($_COOKIE['c_user'])){header("Location: login.php");}
    include "../config/konfigurasi.php";
    $qcek=mysqli_query($sqlconn,"SELECT*FROM tb_mapel WHERE kdmapel='$_POST[id]'");
	$cek=mysqli_num_rows($qcek);
	if($cek==0)
	{
		$sql=mysqli_query($sqlconn, "INSERT INTO tb_mapel (kdmapel, nmmapel, akmapel) VALUES ('$_POST[id]','$_POST[nmmapel]','$_POST[akmapel]'");
			echo 'Simpan Mata Pelajaran Berhasil!';
	}
    else
	{
		$sql=mysqli_query($sqlconn, "UPDATE tb_mapel SET kdmapel='$_POST[id]', nmmapel= '$_POST[nmmapel]', akmapel='$_POST[akmapel]' WHERE kdmapel='$_POST[id]'");
		echo 'Update Mata Pelajaran Berhasil!';
	}
	
	if($_POST['aksi']=='kosong'){
		$sql=mysqli_query($sqlconn, "TRUNCATE tb_mapel");
		echo 'Hapus Mata Pelajaran Berhasil!';
	}
	if($_POST['aksi']=='hapus'){
		$sql=mysqli_query($sqlconn, "DELETE FROM tb_mapel WHERE kdmapel='$_POST[id]' AND kdthpel='$_COOKIE[c_tahun]'");
		echo 'Hapus Mata Pelajaran Berhasil!';
	}
?>