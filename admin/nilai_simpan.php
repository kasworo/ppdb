<?php
	include "../config/konfigurasi.php";
	$id=base64_decode($_POST['nopend']);
    $cek=mysqli_num_rows(mysqli_query($sqlconn, "SELECT*FROM tb_nilai WHERE nopend='$id' AND kdmapel='$_POST[kdmapel]' AND semester='$_POST[semester]' AND jns='$_POST[jns]'"));
    if($cek>0)
	{
		$sql=mysqli_query($sqlconn, "UPDATE tb_nilai SET nilai ='$_POST[nilai]' WHERE nopend='$id' AND kdmapel='$_POST[kdmapel]' AND jns='$_POST[jns]' ");
		echo "Update Nilai Berhasil!";
	}
	else
	{
	    $sql=mysqli_query($sqlconn, "INSERT INTO tb_nilai (semester, nopend, kdmapel, nilai, jns) VALUES ('$_POST[semester]', '$id','$_POST[kdmapel]','$_POST[nilai]',  '$_POST[jns]')");
        echo "Simpan Nilai Berhasil! ";
	}

?>