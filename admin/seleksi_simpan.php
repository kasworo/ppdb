<?php
	include "../config/konfigurasi.php";
	$cek=mysqli_num_rows(mysqli_query($sqlconn, "SELECT*FROM tb_seleksi WHERE kdthpel='$_COOKIE[c_tahun]'"));
	if($cek>0){
		$sql=mysqli_query($sqlconn, "UPDATE tb_seleksi SET tmpseleksi='$_REQUEST[tmp]', tglseleksi='$_REQUEST[tgl]', nmlegalisasi='$_REQUEST[nama]', niplegalisasi='$_REQUEST[nip]', jbtlegalisasi='$_REQUEST[jbt]' WHERE kdthpel='$_COOKIE[c_tahun]'");
		echo "Pembaharuan Berhasil Disimpan!";
	}
	else{
		$sql=mysqli_query($sqlconn, "INSERT INTO tb_seleksi (kdthpel, tmpseleksi, tglseleksi,  nmlegalisasi, niplegalisasi, jbtlegalisasi) VALUES ('$_COOKIE[c_tahun]','$_REQUEST[tmp]', '$_REQUEST[tgl]','$_REQUEST[nama]','$_REQUEST[nip]','$_REQUEST[jbt]')");
		echo "Data Berhasil Disimpan!";
	}