<?php
	include "dbfunction.php";
	$id=base64_decode($_POST['id']);
	$cari=array(
		'idcalsis'=>$id,
		'kdmapel'=>$_POST['kdmapel'],
		'semester'=>$_POST['sem'],
		'jns'=>$_POST['jns']
	);
	
	$update=array(
		'nilai'=>$_POST['nilai']
	);
	
	$data=array(
		'idcalsis'=>$id,
		'kdmapel'=>$_POST['kdmapel'],
		'semester'=>$_POST['sem'],
		'jns'=>$_POST['jns'],
		'nilai'=>$_POST['nilai']
	);

	$cek=cekdata("tb_nilai",$cari);
    if($cek>0)
	{
		$rows=editdata("tb_nilai", $update, $cari);
	}
	else
	{
	  $rows = adddata("tb_nilai",$data);
	}
	echo $rows;
?>