<?php
	include "konfigurasi.php";
	$tahun = date("Y");
	$bulan = date("m");
	if($bulan<=12)
	{
		if($bulan>6)
		{
			$tahun=$tahun;
			$semester='1';
			$nmsemester='Ganjil';
			$tgl = strtotime("07/01".$tahun);
			$awal = date('Y-m-d',$tgl);
		}
		else 
		{
	    	$tahun=$tahun-1;
			$semester='2';
			$nmsemester='Genap';
			$tgl = strtotime("01/01".$tahun);
			$awal = date('Y-m-d',$tgl);
		}
	}	
	$tahun1 = $tahun+1;
	$tahune = substr($tahun1,2,2);
	$ay = "$tahun$semester";
	$nama = "$tahun/$tahun1-$nmsemester";
	
	$sql=mysqli_num_rows(mysqli_query($sqlconn,"select * from tb_thpel where kdthpel= '$ay'"));
	if($sql<1)
	{
		$sql1 = mysqli_query($sqlconn, "update tb_thpel set aktif = 'N'");
		$sql1 = mysqli_query($sqlconn, "insert into tb_thpel (kdthpel, nmthpel, awal, aktif) values ('$ay','$nama', '$awal', 'Y')");
	}
?>