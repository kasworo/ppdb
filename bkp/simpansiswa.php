<?php
	session_start();
	include "config/konfigurasi.php";
	include "getinfo.php";
	if ($_REQUEST['aksi']=='update')
	{
		$tgl=date('Y-m-d');
		$ip=getip();
		$browser=getbrowser();
		$sql=mysqli_query($sqlconn, "UPDATE tb_calsis SET nama = '$_REQUEST[calsis]', nik = '$_REQUEST[nik]', nisn = '$_REQUEST[nisn]', tmplhr = '$_REQUEST[tmplahir]', tgllhr = '$_REQUEST[tgllahir]', agama = '$_REQUEST[agama]', gender = '$_REQUEST[gender]', alamat = '$_REQUEST[almt]', desa = '$_REQUEST[desa]', kec = '$_REQUEST[kec]', kab = '$_REQUEST[kab]', prov = '$_REQUEST[prov]', kdpos = '$_REQUEST[kdpos]', nohp = '$_REQUEST[nohp]', idskulasal='$_REQUEST[aslskul]', tglinput='$tgl', ip='$ip', browser='$browser' WHERE nopend ='$_REQUEST[nopend]'");
		echo "Update Data Berhasil!!";
	}
	
	if($_REQUEST['aksi']=='ortu')
	{
		$tgl=date('Y-m-d');
		$qcek=mysqli_query($sqlconn, "SELECT*FROM tb_ortu WHERE nopend='$_SESSION[s_user]'");
		$cek=mysqli_num_rows($qcek);
		if($cek>0){
			$sql=mysqli_query($sqlconn, "UPDATE tb_ortu SET nmwali = '$_REQUEST[nama]', nik = '$_REQUEST[nik]', tmplhr = '$_REQUEST[tmplahir]', tgllhr = '$_REQUEST[tgllahir]', agama = '$_REQUEST[agama]', kdpdk= '$_REQUEST[pendidikan]', kdkerja='$_REQUEST[kerja]', kdhasil='$_REQUEST[hasil]', hubkel='$_REQUEST[hubkel]', alamat = '$_REQUEST[almt]', desa = '$_REQUEST[desa]', kec = '$_REQUEST[kec]', kab = '$_REQUEST[kab]', prov = '$_REQUEST[prov]', kdpos = '$_REQUEST[kdpos]', nohp = '$_REQUEST[nohp]', tglinput='$tgl' WHERE nopend ='$_SESSION[s_user]'");
			echo "Update Data Orang Tua/Wali Berhasil!";
		}
		else
		{
			$sql=mysqli_query($sqlconn, "INSERT INTO tb_ortu (nopend, nmwali, nik, tmplhr, tgllhr, agama, kdpdk, kdkerja, kdhasil, hubkel, alamat, desa, kec, kab, prov, kdpos, nohp, tglinput) VALUES ('$_SESSION[s_user]','$_REQUEST[nama]','$_REQUEST[nik]','$_REQUEST[tmplahir]','$_REQUEST[tgllahir]','$_REQUEST[agama]', '$_REQUEST[pendidikan]', '$_REQUEST[kerja]', '$_REQUEST[hasil]', '$_REQUEST[hubkel]','$_REQUEST[almt]', '$_REQUEST[desa]', '$_REQUEST[kec]', '$_REQUEST[kab]', '$_REQUEST[prov]','$_REQUEST[kdpos]', '$_REQUEST[nohp]', '$tgl')");
			echo "Simpan Data Orang Tua/Wali Berhasil!";
		}
	}

?>