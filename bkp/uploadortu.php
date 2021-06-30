<?php
	require_once "assets/library/PHPExcel.php";
	require_once "assets/library/excel_reader.php";
	include "config/konfigurasi.php";
	
	$data = new Spreadsheet_Excel_Reader($_FILES['tmportu']['tmp_name']);
	$baris = $data->rowcount($sheet_index=0);
	$tgl=date('Y-m-d');
	$isidata=$baris-5;
	$sukses = 0;
	$gagal = 0;
	$update=0;
	for ($i=6; $i<=$baris; $i++)
	{
		$xnisn=$data->val($i,2);
		$xnmwali= mysqli_real_escape_string($sqlconn, $data->val($i, 4));
		$xnik=$data->val($i,5);
		$xtmplhr = $data->val($i,6); 
		$xtgllhr = $data->val($i,7); 
		$nmagama = $data->val($i,8);
		$xpddk = $data->val($i,9);
		$xkerja = $data->val($i,10);
		$xhasil = $data->val($i,11);
		$xhubkel= $data->val($i,12);
		$xalmt = $data->val($i,13);
		$xdesa	= $data->val($i, 14);
		$xkec	= $data->val($i, 15);
		$xkab	= $data->val($i, 16);
		$xprov = $data->val($i, 17);
		$xkdpos = $data->val($i, 18);
		$xnohp = $data->val($i, 19);
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
		if(strlen($xnisn)<>10 || $xnisn==''){
			$pesan='Cek Kolom NISN, kosong atau digit tidak sesuai!';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xnik)<>16 || $xnik==''){
			$pesan='Cek Kolom NIK, kosong atau digit tidak sesuai!';
			$jns='error';
			$gagal++;
		}
		else if(strlen($xnmwali)<1 || $xnmwali==''){
			$pesan='Cek Kolom nmwali Lengkap, kosong atau tidak wajar!';
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
		else if($xagama==''){
			$pesan='Kolom Agama kosong!';
			$jns='error';
			$gagal++;
		}
		else {
			$qsiswa=mysqli_query($sqlconn,"SELECT nopend FROM tb_calsis WHERE nisn='$xnisn'");
			$ds=mysqli_fetch_array($qsiswa);
			$nopend=$ds['nopend'];
			$cekortu=mysqli_num_rows(mysqli_query($sqlconn, "SELECT*FROM tb_ortu WHERE nopend='$nopend'"));
			if($cekortu>0){
				$query=mysqli_query($sqlconn,"UPDATE tb_ortu SET nmwali='$xnmwali', tmplhr='$xtmplhr',tgllhr='$xtgllhr', agama='$nmagama',kdpdk='$xpddk', kdkerja='$xkerja',kdhasil='$xhasil',hubkel='$xhubkel',alamat='$xalmt', desa='$xdesa',kec='$xkec', kab='$xkab', prov='$xprov', kdpos='$xkdpos', nohp='$xnohp' WHERE nopend='$nopend'");
				$pesan='Update Data Sukses!';
				$jns='success';
				$update++;
			} 
			else {
				$query=mysqli_query($sqlconn,"INSERT INTO tb_ortu (nopend, nik, nmwali, tmplhr, tgllhr, agama, kdpdk, kdkerja, kdhasil, hubkel, alamat, desa, kec, kab, prov, kdpos, nohp, tglinput) VALUES('$nopend', '$xnisn', '$xnmwali','$xtmplhr', '$xtgllhr', '$nmagama', '$xpddk','$xkerja','$xhasil', '$xhubkel','$xalmt', '$xdesa','$xkec', '$xkab','$xprov', '$xkdpos', '$xnohp','$tgl')");
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
		toastr.info("Ada <?php echo $gagal;?> Gagal Diimport, <?php echo $update;?> data Sukse Diupdate, dan <?php echo $sukses;?> Sukses Diimport");
		//return false();
	})
</script>
