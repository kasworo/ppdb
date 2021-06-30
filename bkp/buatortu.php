<script type="text/javascript">
$(document).ready(function () {
  bsCustomFileInput.init();
});
</script>
<?php if(!empty($_REQUEST['data'])&&$_REQUEST['data']=='1'){include "uploadortu.php";}?>
<div class="modal fade" id="myUploadOrtu" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?p=buatortu&data=1" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Upload Template Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="row">
							<label for="tmportu">Pilih File Template</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" name="tmportu" id="tmportu">
								<label class="custom-file-label" for="tmportu">Pilih file</label>
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
	<div class="card-header">
		<h3 class="card-title">Kelola Template Data Orang Tua/Wali Calon Peserta Didik</h3>
        <div class="card-tools">
            <a href="?p=buatsiswa" class="btn btn-tool" title="Template Calon Peserta Didik">
				<i class="fas fa-user-graduate"></i>
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
					<li>Silahkan mengunduh template data orang tua/wali melalui tombol <strong>Download</strong> berikut ini, kemudian bukalah dengan menggunakan program pengolah angka, misalnya Microsoft Office Excel&trade; dengan catatan<strong style="color:red"><em> tidak diperkenankan mengubah susunan kolom</em></strong> dalam file tersebut</li>
					<li>Isilah sesuai dengan petunjuk berikut ini:</li>
					<ul>
						<li>
							Kolom NISN dan Nama Calon Peserta Didik diisi dengan sesuai dengan yang diketikkan di template data calon peserta didik, NISN Wajib diisi sedangkan untuk Nama Calon Peserta didik boleh dikosongkan
						</li>
						<li>
							Kolom Nama Lengkap,  NIK, Tempat Lahir, Tanggal Lahir , Agama dan Alamat Lengkap orang tua/wali diisi sesuai dengan Kartu Keluarga. Perhatikan format penulisan tanggal lahir, dan kode Agama  pada template peserta didik
						</li>
						<li>
							Kolom Pendidikan Terakhir, diisi dengan angka (1) Tidak Sekolah, (2) Tamat SD/Sederajat, (3) Tamat SMP/Sederajat, (4) Tamat SMA/Sederajat, (5) Diploma 1, (6) Diploma 2, (7) Diploma 3 (8) Sarjana (s1)/Diploma 4, (9) Pasca Sarjana (S2), dan(10) Doktoral (S3).
						</li>
						<li>
							Kolom Pekerjaan, diisi dengan angka (0) Tidak Bekerja, (1) Aparatur Sipil Negara, (2) Karyawan Swasta, (3) Wiraswasta / Wirausaha, (4) Petani/Pekebun, (5) Pedagang, (6) Buruh, dan (7) Mengurus Rumah Tangga.
						</li>
						<li>
							Kolom Penghasilan, diisi dengan angka (1) Kurang dari Rp 500.000, (2) Antara Rp 500.000 s/d Rp 1.000.000, (3) Antara Rp 1.000.000 s/d Rp 2.000.000, (4) Antara Rp 2.000.000 s/d Rp 5.000.000, dan (5) Lebih dari Rp 5.000.000
						</li>
						<li>
							Kolom Hubungan Keluarga, diisi dengan hubungan keluarga dengan peserta didik. Ketikkan angka (1) Ayah Kandung, (2) Ibu Kandung,  (3) Kakek (4) Nenek, (5) Paman (6) Bibi dan (7) Kakak Kandung.
						</li>
						<li>Kolom No. HP, harap diisi dengan nomor HP yang aktif</li>
					</ul>
					<li><strong style="color:blue"><em>Cek kembali kesesuaian data yang diketikkan dengan dokumen terkait</em></strong>, hapus baris yang tidak terpakai</li>
				
					<li>Setelah selesai diisi kemudian simpanlah ke dalam format *.xls (Microsoft Excel 97-2003) kemudian unggah kembali melalui tombol <strong>Upload</strong> di bawah ini</li>
				</ol>
			</div>
		</div>	
	</div>
	<div class="card-footer">
	<div class="row" align="center">
            <div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="?p=buatsiswa" class="btn btn-lg btn-default btn-flat btn-block col-8">
					<i class="fas fa-fw fa-arrow-left"></i>
					<span>&nbsp;Sebelumnya</span>
				</a>
			</div>
            <div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="templateortu.php" target="_blank" class="btn btn-lg btn-success btn-flat btn-block col-8">
					<i class="fas fa-fw fa-cloud-download-alt"></i>
					<span>&nbsp;Download</span>
				</a>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<button class="btn btn-lg btn-primary btn-flat btn-block col-8" data-toggle="modal" data-target="#myUploadOrtu">
					<i class="fas fa-fw fa-cloud-upload-alt"></i>
					<span>&nbsp;Upload</span>
				</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="?p=buatnilai" class="btn btn-lg btn-warning btn-flat btn-block col-8">
					<i class="fas fa-fw fa-arrow-right"></i>
					<span>&nbsp;Berikutnya</span>
				</a>
			</div>
		</div>
	</div>
</div>