<?php
	include "config/konfigurasi.php";	
	$uploaddir="fotosiswa/";
	$userid=sha1($_REQUEST['id']);
	$size=$_FILES['filefoto']['size'];
	$maxsize=1024*250;
	if($size<=$maxsize)
	{
		$namafile = basename($_FILES['filefoto']['name']);
		$file = $uploaddir. basename($namafile); 
		if (move_uploaded_file($_FILES['filefoto']['tmp_name'], $file))
		{ 
			$nfoto=$uploaddir.$userid.".jpg";
			$nfhoto=$userid.".jpg";	 
			rename ($file, $nfoto);
			$sql = mysqli_query($sqlconn, "UPDATE tb_calsis SET foto = '$nfhoto' WHERE nopend='$_REQUEST[id]'");
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