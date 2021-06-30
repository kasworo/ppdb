<?php
	include "config/konfigurasi.php";
	include "getinfo.php";
	$tgl=date('Y-m-d');
	$qskul=mysqli_query($sqlconn, "SELECT kdskul FROM tb_skul");
	$row=mysqli_fetch_array($qskul);
	$kdskul=$row['kdskul'];
	var_dump($kdskul);die;
	$ip=getip();
	$browser=getbrowser();
	$pwd=md5(str_replace('-','',$_POST['txt_tgllahir']));
	$qcek=mysqli_query($sqlconn, "SELECT nopend FROM tb_calsis WHERE nik='$_POST[txt_nik]' OR nisn='$_POST[txt_nisn]'");
	$cek=mysqli_num_rows($qcek);
	if($cek==0)
	{
		$sql=mysqli_query($sqlconn, "INSERT INTO tb_calsis (kdskul, kdthpel, nopend, nama, nik, nisn, tmplhr, tgllhr, agama, gender, alamat, desa, kec, kab, prov, kdpos, nohp, deleted, tglinput, mode, ip, browser, pwd, foto) VALUES('$kdskul', '$_POST[txt_thpel]','$_POST[txt_nopend]', '$_POST[txt_calsis]', '$_POST[txt_nik]', '$_POST[txt_nisn]', '$_POST[txt_tmplahir]', '$_POST[txt_tgllahir]', '$_POST[txt_agama]', '$_POST[txt_gender]','$_POST[txt_almt]', '$_POST[txt_desa]','$_POST[txt_kec]','$_POST[txt_kab]','$_POST[txt_prov]', '$_POST[txt_kdpos]','$_POST[txt_nohp]','0', '$tgl','1','$ip','$browser','$pwd','$_FILES[foto]')");
		$_SESSION['n_user']=$_POST['txt_nopend'];
		echo "Registrasi Calon Peserta Didik Berhasil!";
	}
	else
	{
		echo "Registrasi Gagal, Pastikan NISN dan NIK Belum Digunakan!";	
	}
?>