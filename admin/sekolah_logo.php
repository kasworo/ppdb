<?php
include "../config/konfigurasi.php";
$uploaddir = '../images/'; 
$namafile = basename($_FILES['uploadfile']['name']);
$file = $uploaddir . basename($_FILES['uploadfile']['name']); 
 if (move_uploaded_file($_FILES['uploadfile']['tmp_name'], $file)) { 
$sql = mysqli_query($sqlconn,"update tb_skul set logo = '$namafile'");
  echo "success"; 
} else {
	echo "error";
}

?>