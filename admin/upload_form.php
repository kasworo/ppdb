<?php
	include "../config/konfigurasi.php";
	$id=base64_decode($_REQUEST['id']);
	$qs=mysqli_query($sqlconn, "SELECT*FROM tb_calsis WHERE nopend='$id'");
	$s=mysqli_fetch_array($qs);
	if($s['foto']=='' || $s['foto']==null){
		$foto='../assets/img/avatar.gif';
	}
	else{
		if(file_exists('fotosiswa/'.$s['foto'])){
			$foto='../fotosiswa/'.$s['foto'];
		}
		else{
			$foto='.../assets/img/avatar.gif';
		}
	}

	$qa=mysqli_query($sqlconn, "SELECT*FROM tb_berkas WHERE jnsberkas='1' AND nopend='$id'");
	$a=mysqli_fetch_array($qa);
	if($a['fileberkas']=='' || $a['fileberkas']==null){
		$akte='../assets/img/pdf_bw.png';
	}
	else{
		if(file_exists('../aktesiswa/'.$a['fileberkas'])){
			$akte='../assets/img/pdf_clr.png';
		}
		else{
			$akte='../assets/img/pdf_bw.png';
		}
	}

	$qr=mysqli_query($sqlconn, "SELECT*FROM tb_berkas WHERE jnsberkas='2' AND nopend='$id'");
	$r=mysqli_fetch_array($qr);
	if($r['fileberkas']=='' || $r['fileberkas']==null){
		$rapor='../assets/img/pdf_bw.png';
	}
	else{
		if(file_exists('../raporsiswa/'.$r['fileberkas'])){
			$rapor='../assets/img/pdf_clr.png';
		}
		else{
			$rapor='../assets/img/pdf_bw.png';
		}
	}

	$qij=mysqli_query($sqlconn, "SELECT*FROM tb_berkas WHERE jnsberkas='3' AND nopend='$id'");
	$ij=mysqli_fetch_array($qij);
	if($ij['fileberkas']=='' || $ij['fileberkas']==null){
		$skhu='../assets/img/pdf_bw.png';
	}
	else{
		if(file_exists('../skhusiswa/'.$ij['fileberkas'])){
			$skhu='../assets/img/pdf_clr.png';
		}
		else{
			$skhu='../assets/img/pdf_bw.png';
		}
	}

?>
<script type="text/javascript">
	$(function(){
		var btnUpload=$('#fotosiswa');
		var status=$('#fotosiswa_status');
		new AjaxUpload(btnUpload, {
			action	: 'uploadfotosiswa.php?id=<?php echo $id;?>',
			name	: 'filefoto',
			onSubmit: function(filefoto, ext){
			if (! (ext && /^(jpg)$/.test(ext)))
			{
				toastr.error('Hanya Mendukung File *.jpg atau *.JPG Saja Bro!!');
				return false;
			}
				status.text('Upload Sedang Berlangsung...');
			},
			onComplete: function(file, response)
			{
				status.text('');
				if(response==="success")
				{
					$('#fotosiswa').html('<img src="fotosiswa/'+file+'" height="180px" alt="" />').addClass('success');
					//document.getElementById("files").placeholder = file;
					window.location.reload();
				} 
				else
				{
					toastr.error('Upload Gagal Bro!!');
				}
			}
		});
	});

	$(function(){
		var btnUpload=$('#aktesiswa');
		var status=$('#aktesiswa_status');
		new AjaxUpload(btnUpload, {
			action	: 'uploadaktesiswa.php?id=<?php echo $id;?>',
			name	: 'fileakte',
			onSubmit: function(fileakte, ext){
			if (! (ext && /^(pdf)$/.test(ext)))
			{
				toastr.error('Hanya Mendukung File *.pdf Saja Bro!!');
			}
				status.text('Upload Sedang Berlangsung...');
			},
			onComplete: function(fileakte, response)
			{
				status.text('');
				if(response==="success")
				{
					$('#aktesiswa').html('<img src="../assets/img/pdf_clr.png" height="180px" alt="" />').addClass('success');
					//document.getElementById("files").placeholder = file;
					window.location.reload();
				} 
				else
				{
					toastr.error('Upload Gagal Bro!!');
				}
			}
		});
	});

	$(function(){
		var btnUpload=$('#raporsiswa');
		var status=$('#raporsiswa_status');
		new AjaxUpload(btnUpload, {
			action	: 'uploadraporsiswa.php?id=<?php echo $id;?>',
			name	: 'filerapor',
			onSubmit: function(file, ext){
			if (! (ext && /^(pdf)$/.test(ext)))
			{
				toastr.error('Hanya Mendukung File *.pdf Saja Bro!!');
				return false;
			}
				status.text('Upload Sedang Berlangsung...');
			},
			onComplete: function(file, response)
			{
				status.text('');
				if(response==="success")
				{
					$('#raporsiswa').html('<img src="../assets/img/pdf_clr.png" height="180px" alt="" />').addClass('success');
					window.location.reload();
				} 
				else
				{
					toastr.error('Gagal Upload Bro!!');
				}
			}
		});
	});

	$(function(){
		var btnUpload=$('#skhusiswa');
		var status=$('#skhusiswa_status');
		new AjaxUpload(btnUpload, {
			action	: 'uploadskhusiswa.php?id=<?php echo $id;?>',
			name	: 'fileskhu',
			onSubmit: function(file, ext){
			if (! (ext && /^(pdf)$/.test(ext)))
			{
				toastr.error('Hanya Mendukung File *.pdf Saja Bro!!');
				return false;
			}
				status.text('Upload Sedang Berlangsung...');
			},
			onComplete: function(file, response)
			{
				status.text('');
				if(response==="success")
				{
					$('#skhusiswa').html('<img src="../assets/img/pdf_clr.png" height="180px" alt="" />').addClass('success');
					window.location.reload();
				} 
				else
				{
					toastr.error('Gagal Diupload Bro, Maafin Ya?');
				}
			}
		});
	});
</script>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h4 class="card-title"><strong>Upload Dokumen Pendukung</strong></h4>
	</div>
	<div class="card-body">
		<div class="col-sm-12">
			<div class="alert alert-warning">
				<h5>Petunjuk:</h5>
				<p>Sebelum mengunggah dokumen pendukung pastikan ekstensi file benar. Untuk file foto <em>hanya mendukung file berekstensi *.jpg</em>, untuk <em>akte kelahiran dan KK</em>, <em>rapor</em>, serta <em>Ijazah/SKL/SKHU</em> file <em>harus berekstensi *.pdf</em>.
				</p>
			</div>
			<div class="row">
				<div class="col-sm-3">
					<div class="card card-info" style="text-align:Center">
						<div class="card-header">
							<h4 class="card-title">File Foto</h4>
						</div>
						<div class="card-body">
							<div id="fotosiswa" style="text-align:center">
								<img class="img img-responsive img-rounded" src="<?php echo $foto;?>" height="180px"/>
								<span id="fotosiswa_status"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="card card-info" style="text-align:center">
						<div class="card-header">
							<h4 class="card-title">File Akte Kelahiran</h4>
						</div>
						<div class="card-body" style="text-align:center">
							<div id="aktesiswa" style="text-align:center">
								<img class="img img-responsive img-rounded" src="<?php echo $akte;?>" height="180px"/>
								<span id="aktesiswa_status"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title">File Kartu Keluarga</h4>
						</div>
						<div class="card-body">
							<div id="raporsiswa" style="text-align:center">
								<img class="img img-responsive img-rounded" src="<?php echo $rapor;?>" height="180px"/>
								<span id="raporsiswa_status"></span>
							</div>
						</div>
					</div>
				</div>
				<div class="col-sm-3">
					<div class="card card-info">
						<div class="card-header">
							<h4 class="card-title">File Ijazah / SKHU / SKL</h4>
						</div>
						<div class="card-body">
							<div id="skhusiswa" style="text-align:center">
								<img class="img img-responsive img-rounded" src="<?php echo $skhu;?>" height="180px"/>
								<span id="skhusiswa_status"></span>
							</div>
						</div>
					</div>
				</div>			
			</div>
		</div>
	</div>
	<div class="card-footer justify-content-between">
		<div class="row">
			<div class="col-sm-3 offset-sm-2">
				<a href="?p=addsiswa&m=3&id=<?php echo base64_encode($id);?>" class="btn btn-secondary btn-md btn-flat btn-block mb-2">
					<i class="fas fa-reply"></i>
					<span>&nbsp;Kembali</span>
				</a>
			</div>		
			<div class="col-sm-3">
				<button class="btn btn-primary btn-md btn-flat btn-block mb-2" id="btnRefresh">
					<i class="fas fa-fw fa-sync-alt"></i>
					<span>&nbsp;Refresh</span>
				</button>
			</div>
			<div class="col-sm-3">
				<a href="?p=cekberkas" class="btn btn-danger btn-md btn-flat btn-block mb-2" id="simpan">
					<i class="fas fa-fw fa-power-off"></i>
					<span>&nbsp;Selesai</span>
				</a> 
			</div>
		</div>
	</div>	
</div>