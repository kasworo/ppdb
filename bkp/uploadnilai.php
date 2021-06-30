<?php
	require_once "assets/library/PHPExcel.php";
	require_once "assets/library/excel_reader.php";
	include "config/konfigurasi.php";
	$data = new Spreadsheet_Excel_Reader($_FILES['filenilai']['tmp_name']);
	$baris = $data->rowcount($sheet_index=0);
	$tgl=date('Y-m-d');
	$isidata=$baris-5;
	$sukses = 0;
	$gagal = 0;
	$update=0;
	for ($i=6; $i<=$baris; $i++)
	{
		$xnisn=$data->val($i,2);
		$xsemester=$data->val($i,4);
		$mp=mysqli_num_rows(mysqli_query($sqlconn, "SELECT akmapel FROM tb_mapel"));
		$batas=$mp+5;
		$xjenis=$data->val($i,5+$mp);
		for($j=5;$j<=$batas;$j++)
		{
			$xakmapel=$data->val(4,$j);
			$qmp=mysqli_query($sqlconn,"SELECT kdmapel FROM tb_mapel WHERE akmapel='$xakmapel'");
			$mp=mysqli_fetch_array($qmp);
			$kdmapel=$mp['kdmapel'];
			$xnilai=$data->val($i,$j);
			if(strlen($xnisn)<>10 || $xnisn==''){
				$pesan='Cek Kolom NISN, kosong atau digit tidak sesuai!';
				$jns='error';
				$gagal++;
			}
			else if(strlen($xsemester)>1 || $xsemester==''){
				$pesan='Cek Kolom NIK, kosong atau digit tidak sesuai!';
				$jns='error';
				$gagal++;
			}
			else if(strlen($xjenis)>1 || $xjenis==''){
				$pesan='Cek Kolom Keterangan, kosong atau digit tidak sesuai!';
				$jns='error';
				$gagal++;
			}
			else {
				$qsiswa=mysqli_query($sqlconn,"SELECT nopend FROM tb_calsis WHERE nisn='$xnisn'");
				$ds=mysqli_fetch_array($qsiswa);
				$nopend=$ds['nopend'];
				$ceknilai=mysqli_num_rows(mysqli_query($sqlconn, "SELECT*FROM tb_nilai WHERE  jns='$xjenis' AND nopend='$nopend' AND semester='$xsemester' AND kdmapel='$kdmapel'"));
				if($ceknilai>0){
					$query=mysqli_query($sqlconn,"UPDATE tb_nilai SET nilai='$xnilai' WHERE  jns='$xjenis' AND nopend='$nopend' AND semester='$xsemester' AND kdmapel='$kdmapel'");
					$pesan='Update Data Sukses!';
					$jns='success';
					$update++;
				} 
				else {
					$query=mysqli_query($sqlconn,"INSERT INTO tb_nilai (nopend, kdmapel, semester, nilai, jns) VALUES('$nopend', '$kdmapel', '$xsemester','$xnilai', '$xjenis')");
					$pesan='Simpan Data Sukses!';
					$jns='success';
					$sukses++;
				}
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
