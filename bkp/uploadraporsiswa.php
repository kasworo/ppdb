<?php
	include "config/konfigurasi.php";	
	$uploaddir="raporsiswa/";
	$userid=sha1($_REQUEST['id']);
	$size=$_FILES['filerapor']['size'];
	$maxsize=1024*1024; 	
	if($size<=$maxsize)
	{
		$namafile = basename($_FILES['filerapor']['name']);
		$file = $uploaddir.basename($namafile); 
		if (move_uploaded_file($_FILES['filerapor']['tmp_name'], $file))
		{ 
			$nrapor=$uploaddir."rapor_".$userid.".pdf";
			$nfrapor="rapor_".$userid.".pdf";	 
			rename ($file, $nrapor);
			$cek=mysqli_num_rows(mysqli_query($sqlconn,"SELECT fileberkas FROM tb_berkas WHERE nopend='$_REQUEST[id]' AND jnsberkas='2'"));
			if($cek==0)
			{
			$sql = mysqli_query($sqlconn, "INSERT INTO tb_berkas (nopend, jnsberkas, fileberkas) VALUE ('$_REQUEST[id]','2','$nfrapor')");
			}
			else
			{
				$sql = mysqli_query($sqlconn, "UPDATE tb_berkas SET fileberkas='$nfrapor' WHERE nopend='$_REQUEST[id]' AND jnsberkas='2'");
			}
			echo "success";	
		}
		else
		{
			echo "error";
		}
	}
	else{
		echo "error";
	}
?>