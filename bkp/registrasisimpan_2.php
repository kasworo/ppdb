<?php
	session_start();
	include "config/konfigurasi.php";
	include "getinfo.php";
	if($_REQUEST['aksi']=='simpan')
	{
		$tgl=date('Y-m-d');
		$qskul=mysqli_query($sqlconn, "SELECT kdskul FROM tb_skul");
		$row=mysqli_fetch_array($qskul);
		$kdskul=$row['kdskul'];
		$ip=getip();
		$browser=getbrowser();
		$pwd=md5(str_replace('-','',$_REQUEST['txt_tgllahir']));
		$qcek=mysqli_query($sqlconn, "SELECT nopend FROM tb_calsis WHERE nik='$_REQUEST[txt_nik]' OR nisn='$_REQUEST[txt_nisn]'");
		$cek=mysqli_num_rows($qcek);
		if($cek==0)
		{
			$sql=mysqli_query($sqlconn, "INSERT INTO tb_calsis (kdskul, kdthpel, nopend, nama, nik, nisn, tmplhr, tgllhr, agama, gender, alamat, desa, kec, kab, prov, kdpos, nohp, deleted, tglinput, mode, ip, browser, pwd) VALUES('$kdskul', '$_REQUEST[txt_thpel]','$_REQUEST[txt_nopend]', '$_REQUEST[txt_calsis]', '$_REQUEST[txt_nik]', '$_REQUEST[txt_nisn]', '$_REQUEST[txt_tmplahir]', '$_REQUEST[txt_tgllahir]', '$_REQUEST[txt_agama]', '$_REQUEST[txt_gender]','$_REQUEST[txt_almt]', '$_REQUEST[txt_desa]','$_REQUEST[txt_kec]','$_REQUEST[txt_kab]','$_REQUEST[txt_prov]', '$_REQUEST[txt_kdpos]','$_REQUEST[txt_nohp]','0', '$tgl','1','$ip','$browser','$pwd')");
			$_SESSION['n_user']=$_REQUEST['txt_nopend'];
			echo "Registrasi Calon Peserta Didik Berhasil!";
		}
		else
		{
			echo "Registrasi Gagal, Pastikan NISN dan NIK Belum Digunakan!";	
		}
		
		
	}
?>