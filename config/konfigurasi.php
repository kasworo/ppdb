<?php
// 1. Connect ke database
$sqlconn=mysqli_connect("localhost:3306","root","password");

// 2. Pilih database
mysqli_select_db($sqlconn,"smpnlipa_ppdb") or die('Error selecting MySQL database: ' . mysqli_error);
?>
