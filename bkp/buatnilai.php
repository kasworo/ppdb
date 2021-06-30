<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<?php if(!empty($_REQUEST['data'])&&$_REQUEST['data']=='1'){include "uploadnilai.php";}?>
<div class="modal fade" id="myUploadNilai" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?p=buatnilai&data=1" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Upload Template Nilai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="row">
							<label for="tmpnilai">Pilih File Template</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="tmpnilai" name="filenilai">
								<label class="custom-file-label" for="tmpnilai">Pilih file</label>
							</div>
							<p style="color:red"><em>Hanya mendukung file *.xls (Microsoft Excel 97-2003)</em></p>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" class="btn btn-primary btn-flat"><i class="fas fa-upload"></i> Upload</button>
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
			  <i class="fas fa-users"></i>
			</a>
			<a href="?p=buatdokumen" class="btn btn-tool" title="Upload Dokumen Pendukung">
			  <i class="fas fa-upload"></i>
			</a>  
        </div>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-12">
				<h5>
					Petunjuk:
				</h5>
				<ol>
				<li>Silahkan mengunduh template nilai calon peserta didik melalui tombol <strong>Download</strong> berikut ini.</li>
					<li>Setelah selesai bukalah dengan menggunakan program pengolah angka, misalnya Microsoft Office Excel&trade; dengan catatan<strong style="color:red"><em> tidak diperkenankan mengubah susunan kolom</em></strong> dalam file tersebut</li>
					<li>Isilah sesuai dengan petunjuk berikut ini:</li>
					<ul>
						<li>
							Kolom NISN dan Nama Calon Peserta Didik diisi dengan sesuai dengan yang diketikkan di template data calon peserta didik, NISN Wajib diisi sedangkan untuk Nama Calon Peserta didik boleh dikosongkan.
						</li>
						<li>
							Kolom Semester diisi dengan angka 1 sampai dengan 6, sesuai dengan nilai rapor per semester yang akan dimasukkan, begitu juga untuk nilai US.
						</li>
						<li>
							Kolom Nilai Per Mata Pelajaran Gender, diisi dengan nilai Rapor atau nilai US yang diperoleh oleh Calon Peserta Didik
						</li>
						<li>
							Kolom Keterangan, diisi dengan angka <strong><em>1</em></strong> jika nilai yang diketikkan pada kolom Nilai Per Mata Pelajaran adalah nilai Rapor, dan diisi <strong><em>2</em></strong> jika yang diisikan adalah nilai US
						</li>
					</ul>
					<li>Kosongkan baris yang tidak terpakai, setelah selesai diisi kemudian simpanlah ke dalam format *.xls (Microsoft Excel 97-2003) kemudian unggah kembali melalui tombol <strong>Upload Template</strong> di bawah ini</li>
				</ol>
			</div>
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
				<a href="templatenilai.php" target="_blank" class="btn btn-lg btn-success btn-flat btn-block col-8">
					<i class="fas fa-fw fa-cloud-download-alt"></i>
					<span>&nbsp;Download</span>
				</a>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<button class="btn btn-lg btn-primary btn-flat btn-block col-8" data-toggle="modal" data-target="#myUploadNilai">
					<i class="fas fa-fw fa-cloud-upload-alt"></i>
					<span>&nbsp;Upload</span>
				</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="?p=buatdokumen" class="btn btn-lg btn-warning btn-flat btn-block col-8">
					<i class="fas fa-fw fa-arrow-right"></i>
					<span>&nbsp;Berikutnya</span>
				</a>
			</div>
		</div>
	</div>
</div>