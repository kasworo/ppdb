<?php
include "config/konfigurasi.php";
?>
<div class="modal fade" id="myLihatHasil" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?p=cekupload" method="POST">
				<div class="modal-header">
					<h5 class="modal-title">Silahkan Pilih Sekolah Anda</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="row">
							<label>Pilih Sekolah Asal</label>
							<select class="form-control" id="aslskul" name="aslskul">
								<option value="">..Pilih..</option>
								<?php
									$qsa=mysqli_query($sqlconn,"SELECT*FROM tb_skul_asal");
									while($sa=mysqli_fetch_array($qsa))
									{
								?>
								<option value="<?php echo $sa['idskulasal'];?>"><?php echo $sa['nmskulasal'];?></option>
								<?php } ?> 
							</select>
							
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" class="btn btn-primary btn-flat"><i class="far fa-eye"></i>  Lihat</button>
					<button type="button" class="btn btn-danger btn-flat" data-dismiss="modal"><i class="fas fa-power-off"></i> Tutup</button>
				</div>
			</form>
			
		</div>
			<!-- /.modal-content -->
	</div>
		<!-- /.modal-dialog -->
</div>
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
	<div class="card-footer">
		<div class="row" align="center">
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="?p=buatortu" class="btn btn-lg btn-default btn-flat btn-block col-8">
					<i class="fas fa-fw fa-arrow-left"></i>
					<span>&nbsp;Sebelumnya</span>
				</a>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<button for="dokumen" class="btn btn-lg btn-primary btn-flat btn-block col-8">
					<i class="fas fa-fw fa-sync-alt"></i>
					<span>&nbsp;Refresh</span>
				</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<button class="btn btn-lg btn-secondary btn-flat btn-block col-8" data-toggle="modal" data-target="#myLihatHasil">
					<i class="fas fa-fw fa-eye"></i>
					<span>&nbsp;Lihat Hasil</span>
				</button>
			</div>
		</div>
	</div>	
</div>
