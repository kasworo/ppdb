<script type="text/javascript">
$(document).ready(function () {
	bsCustomFileInput.init();
});
</script>
<?php if(!empty($_REQUEST['data'])&&$_REQUEST['data']=='1'){include "uploadsiswa.php";}?>
<div class="modal fade" id="myUploadSiswa" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?p=buatsiswa&data=1" method="POST" enctype="multipart/form-data" target="_self">
				<div class="modal-header">
					<h5 class="modal-title">Upload Template Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="row">
							<label for="customFile">Pilih File Template</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="tmpsiswa" id="tmpsiswa">
								<label class="custom-file-label" for="customFile">Pilih file</label>
							</div>
							<p style="color:red"><em>Hanya mendukung file *.xls (Microsotft Excel 97-2003)</em></p>
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
	<!--<div class="card-header">
		<h5 class="m-0">Kelola Template Data Calon Peserta Didik</h5>
		<div class="card-tools">
			<a href="?p=buatortu" class="btn btn-tool">
				<i class="fas fa-users"></i> Data Orang Tua
			</a>
		</div>
	</div>-->
	
	<div class="card-header">
        <h3 class="card-title">Kelola Template Data Pribadi Calon Peserta Didik</h3>
        <div class="card-tools">
            <a href="?p=buatortu" class="btn btn-tool" title="Template Orang tua/Wali">
			  <i class="fas fa-users"></i>
			</a>
			<a href="?p=buatnilai" class="btn btn-tool" title="Template Nilai">
			  <i class="fas fa-list"></i>
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
					<li>Silahkan mengunduh template data calon peserta didik melalui tombol <strong>Download</strong> berikut ini.</li>
					<li>Setelah selesai bukalah dengan menggunakan program pengolah angka, misalnya Microsoft Office Excel&trade; dengan catatan<strong style="color:red"><em> tidak diperkenankan mengubah susunan kolom</em></strong> dalam file tersebut</li>
					<li>Isilah sesuai dengan petunjuk berikut ini:</li>
					<ul>
						<li>
							Kolom NPSN, diisi dengan NPSN Sekolah Asal Calon Peserta Didik
						</li>
						<li>
							Kolom NISN, diisi dengan Nomor Induk Siswa Nasional Calon Peserta Didik
						</li>
						<li>
							Kolom NIK, diisi dengan Nomor Induk Kependudukan Calon Peserta Didik
						</li>
						<li>
							Kolom Nama Lengkap, diisi dengan Nama Lengkap Calon Peserta Didik
						</li>
						<li>
							Kolom Tempat dan Tanggal Lahir, diisi dengan Tempat dan Tanggal Lahir Calon Peserta Didik, sesuaikan dengan dokumen kependudukan resmi atau Ijazah / SKL / SKHU. Tanggal lahir menggunakan format <strong><em>yyyy-mm-dd</em></strong>
						</li>
						<li>
							Kolom Gender, diisi dengan Jenis Kelamin Calon Peserta Didik, ketikkan <strong><em>L</em></strong> untuk <strong><em>Laki-laki</em></strong> dan <strong><em>P</em></strong> untuk <strong><em>Perempuan</em></strong>
						</li>
						<li>
							Kolom Agama, diisi dengan agama yang dianut Calon Peserta Didik. Ketikkan kode (A) Islam, (B) Kristen, (C) Katholik, (D) Hindu, (E) Buddha dan (F) Konghucu
						</li>
						<li>
							Kolom Alamat Calon Peserta Didik, diisi dengan domisili berdasarkan Kartu Keluarga, dimulai dari Jalan sampai dengan kode pos.
						</li>
						<li>
							Kolom No. HP, diisi dengan nomor HP yang aktif.
						</li>
					</ul>
					<li><strong style="color:blue"><em>Cek kembali kesesuaian data yang diketikkan dengan dokumen terkait</em></strong>, hapus baris yang tidak terpakai.</li>
				
					<li>Setelah selesai diisi kemudian simpanlah ke dalam format *.xls (Microsoft Excel 97-2003) kemudian unggah kembali melalui tombol <strong>Upload</strong> di bawah ini</li>
				</ol>
			</div>
		</div>	
	</div>
	<div class="card-footer">
		<div class="row" align="center">
			<div class="col-sm-4 col-md-4 col-lg-4" style="padding-bottom:5px">
				<a href="templatesiswa.php" target="_blank" class="btn btn-lg btn-success btn-flat btn-block col-8">
					<i class="fas fa-fw fa-cloud-download-alt"></i>
					<span>&nbsp;Download</span>
				</a>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4" style="padding-bottom:5px">
				<button class="btn btn-lg btn-primary btn-flat btn-block col-8" data-toggle="modal" data-target="#myUploadSiswa">
					<i class="fas fa-fw fa-cloud-upload-alt"></i>
					<span>&nbsp;Upload</span>
				</button>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4" style="padding-bottom:5px">
				<a href="?p=buatortu" class="btn btn-lg btn-warning btn-flat btn-block col-8">
					<i class="fas fa-fw fa-arrow-right"></i>
					<span>&nbsp;Berikutnya</span>
				</a>
			</div>
		</div>
	</div>
</div>