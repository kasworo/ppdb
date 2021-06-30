<?php
	include "../config/konfigurasi.php";	
	$uploaddir="../skhusiswa/";
	$userid=sha1($_REQUEST['id']);
	$size=$_FILES['fileskhu']['size'];
	$maxsize=1024*750;
	if($size<=$maxsize){
	$namafile = basename($_FILES['fileskhu']['name']);
	$file = $uploaddir.basename($namafile); 
	 if (move_uploaded_file($_FILES['fileskhu']['tmp_name'], $file))
	 { 
		$nskhu=$uploaddir."skhu_".$userid.".pdf";
		$nfskhu="skhu_".$userid.".pdf";	 
		rename ($file, $nskhu);
		$cek=mysqli_num_rows(mysqli_query($sqlconn,"SELECT fileberkas FROM tb_berkas WHERE nopend='$_REQUEST[id]' AND jnsberkas='3'"));
		if($cek==0)
		{
		$sql = mysqli_query($sqlconn, "INSERT INTO tb_berkas (nopend, jnsberkas, fileberkas) VALUE ('$_REQUEST[id]','3','$nfskhu')");
		}
		else
		{
			$sql = mysqli_query($sqlconn, "UPDATE tb_berkas SET fileberkas='$nfskhu' WHERE nopend='$_REQUEST[id]' AND jnsberkas='3'");
		}
		echo "success";	
	}
	else
	{
		echo "error";
	}
}else{
	echo "error";
}
?>