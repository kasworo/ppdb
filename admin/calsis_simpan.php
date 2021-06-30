<?php
	session_start();
	include "../config/konfigurasi.php";
	include "../getinfo.php";
	$tgl=date('Y-m-d');
	if($_POST['aksi']=='1') {
		$id=base64_decode($_POST['id']);
		$qskul=mysqli_query($sqlconn, "SELECT kdskul FROM tb_skul");
		$row=mysqli_fetch_array($qskul);
		$kdskul=$row['kdskul'];
		$ip=getip();
		$browser=getbrowser();
		$nama=mysqli_escape_string($sqlconn,$_REQUEST['calsis']);
		$nama=ucwords(strtolower($nama));
		$tmplhr=ucwords(strtolower($_POST['tmplahir']));
		$alamat=ucwords('Jalan '.strtolower($_POST['almt']));
		$alamat=str_replace('Jl.','Jalan',$alamat);
		$alamat=str_replace('Jln.','Jalan',$alamat);
		$alamat=str_replace('Jalan Jalan','Jalan',$alamat);
		$desa=ucwords(strtolower($_POST['desa']));
		$kec=ucwords(strtolower($_POST['kec']));
		$kab=ucwords(strtolower($_POST['kab']));
		$prov=ucwords(strtolower($_POST['prov']));
		
		$pwd=md5(str_replace('-','',$_POST['tgllahir']));
		$qcek=mysqli_query($sqlconn, "SELECT nopend FROM tb_calsis WHERE nik='$_POST[nik]'OR nisn='$_POST[nisn]' OR nopend='$id'");
		$cek=mysqli_num_rows($qcek);
		if($cek==0) {
			$sql=mysqli_query($sqlconn, "INSERT INTO tb_calsis (kdskul, kdthpel, nopend, nama, nik, nisn, tmplhr, tgllhr, agama, gender, alamat, desa, kec, kab, prov, kdpos, nohp, deleted, tglinput, mode, ip, browser, pwd, petugas, idskulasal ) VALUES('$kdskul', '$_COOKIE[c_tahun]','$id', '$nama', '$_POST[nik]', '$_POST[nisn]', '$tmplhr', '$_POST[tgllahir]', '$_POST[agama]', '$_POST[gender]','$alamat', '$desa','$kec','$kab','$prov', '$_POST[kdpos]','$_POST[nohp]','0', '$tgl','1','$ip','$browser','$pwd','$_COOKIE[c_user]','$_POST[npsn]')");
			echo "Simpan Data Calon Peserta Didik Berhasil!";
		}
		else
		{
			$sql=mysqli_query($sqlconn, "UPDATE tb_calsis SET kdskul='$kdskul', kdthpel='$_COOKIE[c_tahun]', nopend='$id', nama='$nama', nik='$_POST[nik]', nisn='$_POST[nisn]', tmplhr='$tmplhr', tgllhr='$_POST[tgllahir]', agama='$_POST[agama]', gender='$_POST[gender]', alamat='$alamat', desa='$desa', kec='$kec', kab='$kab', prov='$prov', kdpos='$_POST[kdpos]', deleted='0', pwd='$pwd', nohp='$_POST[nohp]', tglinput='$tgl',ip='$ip',browser='$browser',pwd='$pwd', petugas='$_COOKIE[c_user]',idskulasal='$_POST[npsn]' WHERE nopend='$id'");
			echo "Update Data Calon Peserta Didik Berhasil!";	
		}
	}
	
	if($_POST['aksi']=='2'){
		$id=base64_decode($_POST['id']);
		$nama=mysqli_escape_string($sqlconn, $_POST['nama']);
		$nama=ucwords(strtolower($nama));
		$tmplhr=ucwords(strtolower($_POST['tmplahir']));
		$alamat=ucwords('Jalan '.strtolower($_POST['almt']));
		$alamat=str_replace('Jl.','Jalan',$alamat);
		$alamat=str_replace('Jln.','Jalan',$alamat);
		$alamat=str_replace('Jalan Jalan','Jalan',$alamat);
		$desa=ucwords(strtolower($_POST['desa']));
		$kec=ucwords(strtolower($_POST['kec']));
		$kab=ucwords(strtolower($_POST['kab']));
		$prov=ucwords(strtolower($_POST['prov']));
		$qcek=mysqli_query($sqlconn, "SELECT*FROM tb_ortu WHERE nopend='$id'");
		$cek=mysqli_num_rows($qcek);
		if($cek>0){
			$sql=mysqli_query($sqlconn, "UPDATE tb_ortu SET nmwali = '$nama', nik = '$_REQUEST[nik]', tmplhr = '$tmplhr', tgllhr = '$_REQUEST[tgllahir]', agama = '$_REQUEST[agama]', kdpdk= '$_REQUEST[pendidikan]', kdkerja='$_REQUEST[kerja]', kdhasil='$_REQUEST[hasil]', hubkel='$_REQUEST[hubkel]', alamat = '$alamat', desa = '$desa', kec = '$kec', kab = '$kab', prov = '$prov', kdpos = '$_REQUEST[kdpos]', nohp = '$_REQUEST[nohp]', tglinput='$tgl' WHERE nopend ='$id'");
			echo "Update Data Orang Tua/Wali Berhasil!";
		}
		else
		{
			$sql=mysqli_query($sqlconn, "INSERT INTO tb_ortu (nopend, nmwali, nik, tmplhr, tgllhr, agama, kdpdk, kdkerja, kdhasil, hubkel, alamat, desa, kec, kab, prov, kdpos, nohp, tglinput) VALUES ('$id','$_REQUEST[nama]','$_REQUEST[nik]','$tmplhr','$_REQUEST[tgllahir]','$_REQUEST[agama]', '$_REQUEST[pendidikan]', '$_REQUEST[kerja]', '$_REQUEST[hasil]','$_REQUEST[hubkel]', '$alamat', '$desa', '$kec', '$kab', '$prov','$_REQUEST[kdpos]', '$_REQUEST[nohp]', '$tgl')");
			echo "Simpan Data Orang Tua/Wali Berhasil!";
		}
	}
	if($_POST['aksi']=='hapus') {
		$id=base64_decode($_POST['id']);
		$sql=mysqli_query($sqlconn,"UPDATE tb_calsis SET deleted='1' WHERE nopend='$id' AND kdthpel='$_COOKIE[c_tahun]'");
		echo "Data Calon Peserta Didik berhasil dihapus";
	}
	
	if($_POST['aksi']=='kosong') {
		$sql=mysqli_query($sqlconn,"UPDATE tb_calsis SET deleted='1' WHERE kdthpel='$_COOKIE[c_tahun]'");
		echo "Data Calon Peserta Didik berhasil dikosongkan";
	}
?>