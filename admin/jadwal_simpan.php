<?php
    include "../config/konfigurasi.php";
    $qcek=mysqli_query($sqlconn,"SELECT*FROM tb_jadwal WHERE kdjadwal='$_POST[id]'");
	$cek=mysqli_num_rows($qcek);
	if($cek==0)
	{
		$sql=mysqli_query($sqlconn, "INSERT INTO tb_jadwal (kdjadwal, kdthpel, awal, akhir, kegiatan) VALUES ('$_POST[id]','$_COOKIE[c_tahun]', '$_POST[awal]','$_POST[akhir]','$_POST[uraian]')");
		echo 'Simpan Jadwal PPDB Berhasil!';
	}
    else
	{
		$sql=mysqli_query($sqlconn, "UPDATE tb_jadwal SET awal='$_POST[awal]', akhir= '$_POST[akhir]', kegiatan='$_POST[uraian]' WHERE kdjadwal='$_POST[id]' AND kdthpel='$_COOKIE[c_tahun]'");
		echo 'Update Jadwal PPDB Berhasil!';
	}
	
	if($_POST['aksi']=='kosong'){
		$sql=mysqli_query($sqlconn, "DELETE FROM tb_jadwal WHERE kdthpel='$_COOKIE[c_tahun]'");
		echo 'Hapus Jadwal PPDB Berhasil!';
	}
	if($_POST['aksi']=='hapus'){
		$sql=mysqli_query($sqlconn, "DELETE FROM tb_jadwal WHERE kdjadwal='$_POST[id]' AND kdthpel='$_COOKIE[c_tahun]'");
		echo 'Hapus Jadwal PPDB Berhasil!';
	}
?>