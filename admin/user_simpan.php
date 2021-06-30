<?php
	include "../config/konfigurasi.php";
	$tgl=date('Y-m-d');
    if($_POST['aksi']=='simpan')
	{
		$sqlcek = mysqli_num_rows(mysqli_query($sqlconn, "SELECT*FROM tb_user WHERE username='$_POST[id]'"));
		if($sqlcek>0)
		{
			$sql = mysqli_query($sqlconn, "UPDATE tb_user SET nama='$_POST[nama]', nip='$_POST[nip]', tmplahir='$_POST[tmplahir]', tgllahir='$_POST[tgllahir]', gender='$_POST[gender]', agama='$_POST[agama]',email='$_POST[email]', alamat='$_POST[almt]', desa='$_POST[desa]', kec='$_POST[kec]', kab='$_POST[kab]', prov='$_POST[prov]', kdpos='$_POST[kdpos]', nohp='$_POST[nohp]', tglupdate='$tgl', jbtdinas='$_POST[jbtd]', jbtpanitia='$_POST[jbtp]' WHERE username='$_POST[id]'");
            echo "Update Data Penggguna Sukses!";
		
		} 
		else
		{
            $pwd=sha1(md5(str_replace('-','',$_POST['tgllahir'])));			
            $sql = mysqli_query($sqlconn, "INSERT INTO tb_user (username, nama, nip, tmplahir, tgllahir, gender, agama, email, alamat, desa, kec, kab, prov, kdpos, nohp, tglupdate,passwd, level, aktif, jbtdinas, jbtpanitia) VALUES ('$_POST[id]','$_POST[nama]','$_POST[nip]','$_POST[tmplahir]','$_POST[tgllahir]','$_POST[gender]','$_POST[agama]','$_POST[email]','$_POST[almt]','$_POST[desa]','$_POST[kec]','$_POST[kab]','$_POST[prov]','$_POST[kdpos]','$_POST[nohp]','$tgl','$pwd','0','0','$_POST[jbtd]','$_POST[jbtd]')");
			echo "Tambah Data Pengguna Berhasil!";
		}
	}
    if($_POST['aksi']=='aktif'){
		$id=base64_decode($_POST['id']);
		$sqlcek=mysqli_query($sqlconn,"SELECT aktif FROM tb_user WHERE username='$id'");
		$sta=mysqli_fetch_array($sqlcek);
		$status=$sta['aktif'];
		if($status=='1'){$ubah='0';$jdl='Dinonaktifkan!';} else{$ubah='1';$jdl='Diaktifkan!';}
		$sql=mysqli_query($sqlconn,"UPDATE tb_user SET aktif='$ubah' WHERE username='$id'");
		echo "Username Berhasil ".$jdl;
	}
	if($_REQUEST['aksi']=='reset')	{
		$id=base64_decode($_POST['id']);
		$sqlcek=mysqli_query($sqlconn,"SELECT tgllahir FROM tb_user WHERE username='$id'");
		$sta=mysqli_fetch_array($sqlcek);
		$tgl=$sta['tgllahir'];
		$password=sha1(md5(str_replace("-","", $tgl)));
		$sqlpasaif=mysqli_query($sqlconn,"UPDATE tb_user SET passwd='$password' WHERE username='$id'");
		echo "Password Berhasil Direset!";
	}
    if($_POST['aksi']=='pass'){
        $pwd=sha1(md5($_POST['passbaru']));
		$sql=mysqli_query($sqlconn,"UPDATE tb_user SET passwd='$pwd', tglupdate='$tgl' WHERE username='$_POST[id]'");
	   echo "Password Berhasil Diganti!";
	}
?>