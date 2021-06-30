<?php
	include "config/konfigurasi.php";
	function getExtension($str)
	{
		$i = strrpos($str,".");
		if (!$i) { return ""; }
		$l = strlen($str) - $i;
		$ext = substr($str,$i+1,$l);
		return $ext;
	}
	function getprefix($str)
	{
		$pref=substr($str,0,4);
		return $pref;
	}
	$valid_formats = array("jpg", "pdf");
	if(!empty($_FILES)){	
		$filename = $_FILES['file']['name'];
		$size=$_FILES['file']['size'];
		$ext = getExtension($filename);
		$ext = strtolower($ext);
		$prefix=getprefix($filename);
		$getnisn=substr($filename,5,10);
		$qcalsis=mysqli_query($sqlconn,"SELECT nopend FROM tb_calsis WHERE nisn='$getnisn'");
		$s=mysqli_fetch_array($qcalsis);
		$userid=$s['nopend'];
		if(in_array($ext, $valid_formats))
		{
			if($ext=='jpg' || $ext=='JPG'){
				$uploaddir="fotosiswa/";
				$ukuran=250*1024;
				if($size<=$ukuran){
					$file = $uploaddir.basename($filename); 
					if (move_uploaded_file($_FILES['file']['tmp_name'], $file))
					{ 
						$nfoto=$uploaddir.sha1($userid).".jpg";
						$nfhoto=sha1($userid).".jpg";	 
						rename ($file, $nfoto);
						$sql = mysqli_query($sqlconn, "UPDATE tb_calsis SET foto = '$nfhoto' WHERE nopend='$userid'");	
						$pesan="Foto Peserta Didik Berhasil Diupload!";
					}					
				}
				else {
					$pesan="Melebihi Batas Ukuran File Yang Diizinkan!";
				}
			}
			else{
				if($prefix=='akte'){
					$uploaddir = "aktesiswa/";
					$ukuran=500*1024;
					if($size<=$ukuran){
						$file = $uploaddir.basename($filename); 
						if (move_uploaded_file($_FILES['file']['tmp_name'], $file)){ 
							$nakte=$uploaddir."akte_".sha1($userid).".pdf";
							$nfakte="akte_".sha1($userid).".pdf";	 
							rename ($file, $nakte);
							$cek=mysqli_num_rows(mysqli_query($sqlconn,"SELECT fileberkas FROM tb_berkas WHERE nopend='$userid' AND jnsberkas='1'"));
							if($cek==0)
							{
							$sql = mysqli_query($sqlconn, "INSERT INTO tb_berkas (nopend, jnsberkas, fileberkas) VALUE ('$userid','1','$nfakte')");
							}
							else
							{
								$sql = mysqli_query($sqlconn, "UPDATE tb_berkas SET fileberkas='$nfakte' WHERE nopend='$userid' AND jnsberkas='1'");
							}
							$pesan="Dokumen Akte dan Kartu Keluarga Berhasil Diupload!";
						}
					}
					else {
						$pesan="Melebihi Batas Ukuran File Yang Diizinkan!";
					}
				}
				else if($prefix=='rapr'){
					$uploaddir = "raporsiswa/";
					$ukuran=1000*1024;
					$file = $uploaddir.basename($filename); 
					if($size<=$ukuran){
						$nrapor=$uploaddir."rapor_".sha1($userid).".pdf";
						$nfrapor="rapor_".sha1($userid).".pdf";	 
						rename ($file, $nrapor);
						$cek=mysqli_num_rows(mysqli_query($sqlconn,"SELECT fileberkas FROM tb_berkas WHERE nopend='$userid' AND jnsberkas='1'"));
						if($cek==0)
						{
						$sql = mysqli_query($sqlconn, "INSERT INTO tb_berkas (nopend, jnsberkas, fileberkas) VALUE ('$userid','2','$nfrapor')");
						}
						else
						{
							$sql = mysqli_query($sqlconn, "UPDATE tb_berkas SET fileberkas='$nfrapor' WHERE nopend='$userid' AND jnsberkas='2'");
						}
						$pesan="Dokumen Rapor Berhasil Diupload!";
					}
					else {
						$pesan="Melebihi Batas Ukuran File Yang Diizinkan!";
					} 
				}
				else if($prefix=='ijzh'){
					$uploaddir = "skhu/";
					$ukuran=250*1024;
					if($size<=$ukuran){
						$nskhu=$uploaddir."skhu_".sha1($userid).".pdf";
						$nfskhu="skhu_".sha1($userid).".pdf";	 
						rename ($file, $nskhu);
						$cek=mysqli_num_rows(mysqli_query($sqlconn,"SELECT fileberkas FROM tb_berkas WHERE nopend='$userid' AND jnsberkas='1'"));
						if($cek==0){
						$sql = mysqli_query($sqlconn, "INSERT INTO tb_berkas (nopend, jnsberkas, fileberkas) VALUE ('$userid','3','$nfskhu')");
						}
						else
						{
							$sql = mysqli_query($sqlconn, "UPDATE tb_berkas SET fileberkas='$nfskhu' WHERE nopend='$userid' AND jnsberkas='3'");
						}
						$pesan="Dokumen Ijazah / SKHU /SKL Berhasil Diupload!";
					}
					else{
						$pesan="Melebihi Batas Ukuran File Yang Diizinkan!";
					}
				}
				else {
					$pesan="Cek Ekstensi File";
				}
			}
		}
		else {
				$pesan="Cek Nama File";
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
		toastr.info("<?php echo $pesan;?>");
		//return false();
	})
</script>