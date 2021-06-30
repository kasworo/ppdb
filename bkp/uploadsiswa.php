<?php
	require_once "assets/library/PHPExcel.php";
	require_once "assets/library/excel_reader.php";
	include "config/konfigurasi.php";
	$data = new Spreadsheet_Excel_Reader($_FILES['tmpsiswa']['tmp_name']);
	$baris = $data->rowcount($sheet_index=0);
	$tgl=date('Y-m-d');
	$isidata=$baris-5;
	$sukses = 0;
	$gagal = 0;
	$update=0;
	$sql=mysqli_query($sqlconn, "SELECT kdthpel FROM tb_thpel WHERE aktif='Y'");
	$d=mysqli_fetch_array($sql);
	$kdthpel = $d['kdthpel'];	

	$qskul=mysqli_query($sqlconn, "SELECT kdskul FROM tb_skul");
	$r=mysqli_fetch_array($qskul);
	$kdskul = $r['kdskul'];

	for ($i=6; $i<=$baris; $i++)
	{
		$sql0=mysqli_query($sqlconn, "SELECT COUNT(*) as jml FROM tb_calsis WHERE kdthpel='$kdthpel'");
		$d0=mysqli_fetch_array($sql0);
		$urut=$d0['jml']+1;
		if($urut>9)
		{
			$urt=substr('000'.$urut,1,4);
		}
		else
		{
			$urt=substr('000'.$urut,0,4);	
		}
		$nopes='PSB'.substr($kdthpel,2,3).$urt;
		$xnpsn=$data->val($i,2);

		$xnisn=$data->val($i,3);
		$xnik=$data->val($i,4);
		$xnama= mysqli_real_escape_string($sqlconn, $data->val($i, 5));
		$xtmplhr = $data->val($i,6); 
		$xtgllhr = $data->val($i,7); 
		$xjekel = $data->val($i,8); 
		$nmagama = $data->val($i,9);
		$xalmt = $data->val($i,10);
		$xdesa	= $data->val($i, 11);
		$xkec	= $data->val($i, 12);
		$xkab	= $data->val($i, 13);
		$xprov = $data->val($i, 14);
		$xkdpos = $data->val($i, 15);
		$xnohp = $data->val($i, 16);
		$xpass = md5(str_replace('-','',$xtgllhr));
		if(strlen($nmagama)==1){$xagama=$nmagama;}
		else {
			switch ($nmagama) {
			case 'Islam':{ $xagama='A';break;}
			case 'Kristen':{ $xagama='B';break;}
			case 'Katholik':{ $xagama='C';break;}
			case 'Hindu':{ $xagama='D';break;}
			case 'Buddha':{ $xagama='E';break;}
			case 'Konghucu':{ $xagama='F';break;}
			default: {$xagama='';break;}
			}
		}
		$ceknpsn=mysqli_num_rows(mysqli_query($sqlconn, "SELECT*FROM tb_skul_asal WHERE idskulasal='$xnpsn'"));
		if(strlen($xnpsn)<>8 || $xnpsn==''|| $ceknpsn==0){ 
			$pesan='Cek Kolom NPSN, '. $xnpsn.' belum terdata di database, isian kosong atau digit tidak sesuai';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xnik)<>16 || $xnik==''){
			$pesan='Cek Kolom NIK, kosong atau digit tidak sesuai!';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xnisn)<>10 || $xnisn==''){
			$pesan='Cek Kolom NISN, kosong atau digit tidak sesuai!';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xnama)<1 || $xnama==''){
			$pesan='Cek Kolom Nama Lengkap, kosong atau tidak wajar!';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xtmplhr)<1 || $xtmplhr==''){
			$pesan='Cek Kolom Tempat Lahir, kosong atau tidak wajar!';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xtgllhr)<1 || $xtgllhr==''){
			$pesan='Cek Kolom Tanggal Lahir, kosong atau tidak wajar!';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xjekel)>1 || $xjekel==''){
			$pesan='Cek Kolom Gender, kosong atau tidak wajar!';
			$jns='error';
			$gagal++;
		}
		else if($xagama==''){
			$pesan='Kolom Agama kosong!';
			$jns='error';
			$gagal++;
		}
		else {
			$ceksiswa=mysqli_num_rows(mysqli_query($sqlconn,"SELECT nopend FROM tb_calsis WHERE nik='$xnik' OR nisn='$xnisn'"));
			if($ceksiswa>0){
				$query=mysqli_query($sqlconn,"UPDATE tb_calsis SET nama='$xnama', tmplhr='$xtmplhr',tgllhr='$xtgllhr', gender='$xjekel', agama='$xagama', alamat='$xalmt', desa='$xdesa',kec='$xkec', kab='$xkab', prov='$xprov', kdpos='$xkdpos', nohp='$xnohp',tglinput='$tgl', pwd='$xpass', idskulasal='$xnpsn' WHERE nik='$xnik' OR nisn='$xnisn'");
				$pesan='Update Data Sukses!';
				$jns='success';
				$update++;
			} 
			else {
				$query=mysqli_query($sqlconn,"INSERT INTO tb_calsis (kdthpel, kdskul,nopend, nisn, nik, nama, tmplhr, tgllhr, gender, agama, alamat, desa, kec, kab, prov, kdpos, nohp, tglinput, idskulasal, deleted, mode, pwd) VALUES('$kdthpel','$kdskul','$nopes', '$xnisn', '$xnik', '$xnama','$xtmplhr', '$xtgllhr', '$xjekel', '$xagama', '$xalmt', '$xdesa','$xkec', '$xkab','$xprov', '$xkdpos', '$xnohp','$tgl','$xnpsn','0','2','$xpass')");
				$pesan='Simpan Data Sukses!';
				$jns='success';
				$sukses++;
			}
		}
?>
<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 3000
		});
		toastr.<?php echo $jns;?>("<?php echo $pesan;?>");
		//return false();
	})
</script>
<?php
	}
	flush();
?>
<script type="text/javascript">
	$(function() {
		const Toast = Swal.mixin({
			toast: true,
			position: 'top-end',
			showConfirmButton: false,
			timer: 2000
		});
		toastr.info("Ada <?php echo $gagal;?> gagal ditambahkan, <?php echo $update;?> data berhasil diupdate dan <?php echo $sukses;?> sukses ditambahkan");
		//return false();
	})
</script>
