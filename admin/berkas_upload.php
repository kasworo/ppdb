<?php
    if(!isset($_COOKIE['c_user'])){header("Location: login.php");}
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h3 class="card-title">Kelola Template Data Nilai Calon Peserta Didik</h3>
        <div class="card-tools">
            <a href="?p=buatsiswa" class="btn btn-tool" title="Template Calon Siswa">
				<i class="fas fa-user-graduate"></i>
			</a>
			<a href="?p=buatortu" class="btn btn-tool" title="Template Orang tua/Wali">
			  <i class="fas fa-user"></i>
			</a>
			<a href="?p=buatnilai" class="btn btn-tool" title="Upload Dokumen Pendukung">
			  <i class="fas fa-list"></i>
			</a>  
        </div>
	</div>
	<div class="card-body">
		<div class="col-sm-12">
			<div class="alert alert-success">
				<h5>Petunjuk:</h5>
				<p>Sebelum mengunggah dokumen pendukung, renamelah file yang akan diupload. Untuk foto gunakan nama file <em>foto_NISN.jpg</em>, untuk akte kelahiran dan KK harus menggunakan nama file <em>akte_NISN.pdf</em>, untuk rapor <em>rapr_NISN.pdf</em>, dan untuk Ijazah/SKL/SKHU wajib menggunakan nama file <em>ijzh_NISN.pdf</em>.
				</p>
			</div>
			<form class="dropzone" method="post" enctype="multipart/form-data" action="uploaddokumen.php">
			</form>
		</div>
	</div>
    <div class="card-footer justify-content-between">
		<div class="row">
			<div class="col-sm-3 offset-sm-2">
				<a href="?p=cekberkas" class="btn btn-secondary btn-md btn-flat btn-block mb-2">
					<i class="fas fa-reply"></i>
					<span>&nbsp;Kembali</span>
				</a>
			</div>
			<div class="col-sm-3">
				<button class="btn btn-primary btn-md btn-flat btn-block mb-2">
					<i class="fas fa-fw fa-sync-alt"></i>
					<span>&nbsp;Refresh</span>
				</button> 
			</div>
			<div class="col-sm-3">           
				<a href="?" class="btn btn-danger btn-md btn-flat btn-block mb-2">
					<i class="fas fa-fw fa-power-off"></i>
					<span>&nbsp;Selesai</span>
				</a>
			</div>
		</div>
	</div>
</div>
