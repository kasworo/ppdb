<?php
	include "config/konfigurasi.php";	
	$uploaddir="aktesiswa/";
	$userid=sha1($_REQUEST['id']);
	$size=$_FILES['fileakte']['size'];
	$maxsize=1024*512;	
	$size=$_FILES['fileakte']['size'];
	$maxsize=1024*500; 	
	if($size<=$maxsize)
	{
		$namafile = basename($_FILES['fileakte']['name']);
		$file = $uploaddir.basename($namafile);
		if (move_uploaded_file($_FILES['fileakte']['tmp_name'], $file))
		{ 
			$nakte=$uploaddir."akte_".$userid.".pdf";
			$nfakte="akte_".$userid.".pdf";	 
			rename ($file, $nakte);
			$cek=mysqli_num_rows(mysqli_query($sqlconn,"SELECT fileberkas FROM tb_berkas WHERE nopend='$_REQUEST[id]' AND jnsberkas='1'"));
			if($cek==0)
			{
			$sql = mysqli_query($sqlconn, "INSERT INTO tb_berkas (nopend, jnsberkas, fileberkas) VALUE ('$_REQUEST[id]','1','$nfakte')");
			}
			else
			{
				$sql = mysqli_query($sqlconn, "UPDATE tb_berkas SET fileberkas='$nfakte' WHERE nopend='$_REQUEST[id]' AND jnsberkas='1'");
			}
			echo "success";	
		}
		else
		{
			echo "error";
		}
	}
	else {
		echo "error";
	}
?>