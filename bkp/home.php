<?php
include("config/konfigurasi.php");
if(isset($_SESSION['s_user']))
{
	$qdt=mysqli_query($sqlconn,"SELECT d.jrombel*d.jsiswa as dayatampung FROM tb_dayatampung d INNER JOIN tb_skul s ON s.kdskul=d.kdskul INNER JOIN tb_thpel t ON t.kdthpel=d.kdthpel WHERE t.aktif='Y'");
	$dt=mysqli_fetch_array($qdt);
	$dayatampung=$dt['dayatampung'];
	$qcs=mysqli_query($sqlconn,"SELECT COUNT(*) as pendaftar FROM tb_calsis c INNER JOIN tb_skul s ON s.kdskul=c.kdskul INNER JOIN tb_thpel t ON t.kdthpel=c.kdthpel WHERE t.aktif='Y'");
	$cs=mysqli_fetch_array($qcs);
	$pendaftar=$cs['pendaftar'];

	//$qnilai=mysqli_query($sqlconn,"SELECT (nilai) ")
?>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0"><marquee>Selamat datang Calon Peserta Didik SMP Negeri 5 Pelepat</marquee></h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6" style="text-align:justify">
				<p class="card-text">
					Silahkan klik tombol <strong><em>Cek Data</em></strong>, kemudian lengkapi data anda berdasarkan dokumen-dokumen pendukung yaitu Akte Kelahiran, Kartu Keluarga, Rapor serta Ijazah atau Surat Keterangan Lulus (SKL) atau Surat Keterangan Hasil Ujian (SKHU).
				</p>
				<p class="card-text">
					Mohon diperhatikan data yang anda yang sudah lengkap nantinya akan dipakai dalam proses verifikasi, validasi dan seleksi data Calon Peserta Didik.
				</p>
				<p class="card-text">
					Silahkan tunggu sampai verifikasi, validasi dan seleksi oleh panitia PPDB selesai sesuai dengan jadwal pengumuman hasil seleksi PPDB, silahkan klik link <a href="?p=jadwal">berikut ini</a>.
				</p>
				<p class="card-text">
					Cetaklah atau mintalah bukti registrasi kepada panitia PPDB, silahkan dilengkapi lagi dan ditandatangani sebelum diserahkan kepada	panitia PPDB pada saat daftar ulang.
				</p>
				<hr/>
			</div>
			<div class="col-sm-6">
				<div class="card card-success">
					<div class="card-header">
						<h4 class="card-title">Ringkasan Data PPDB</h4>
					</div>
					<div class="card-body">
						<div class="row">					
							<div class="col-12 col-sm-6 col-md-6">
								<div class="info-box mb-3">
								<span class="info-box-icon bg-primary elevation-1" title="Kapasitas Daya Tampung"><i class="fas fa-users"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Daya Tampung</span>
									<span class="info-box-number"><?php echo $dayatampung;?></span>
								</div>
								<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
										<!-- /.col -->
							<!-- fix for small devices only -->
							<div class="clearfix hidden-md-up"></div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Pendaftar</span>
										<span class="info-box-number"><?php echo $pendaftar;?></span>
									</div>
								<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
						</div>
						<div class="row">					
							<div class="col-12 col-sm-6 col-md-6">
								<div class="info-box mb-3">
								<span class="info-box-icon bg-success elevation-1" title="Jumlah Nilai Tertinggi"><i class="fas fa-chart-bar"></i></span>
								<div class="info-box-content">
									<span class="info-box-text">Tertinggi</span>
									<span class="info-box-number">41,410</span>
								</div>
								<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
										<!-- /.col -->
							<!-- fix for small devices only -->
							<div class="clearfix hidden-md-up"></div>
							<div class="col-12 col-sm-6 col-md-6">
								<div class="info-box mb-3">
									<span class="info-box-icon bg-danger elevation-1" title="Jumlah Nilai Terendah"><i class="fas fa-chart-line"></i></span>
									<div class="info-box-content">
										<span class="info-box-text">Terendah</span>
										<span class="info-box-number">760</span>
									</div>
								<!-- /.info-box-content -->
								</div>
								<!-- /.info-box -->
							</div>
							<!-- /.col -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php }	else {?>
<script type="text/javascript" src="assets/js/jquery.js"></script>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Selamat datang</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-lg-8" style="padding-right:40px;text-align:justify">
				<p class="card-text">
					Pendaftaran daring dapat dilakukan secara mandiri oleh peserta didik atau orang tua/wali, atau secara kolektif oleh sekolah asal, silahkan klik menu <strong>Registrasi</strong> pada halaman ini, kemudian pilih <em>Individu</em> atau <em>Kolektif</em>
				</p>
				<p class="card-text">
					Sebelum melakukan pendaftaran terlebih dahulu siapkan dokumen-dokumen pendukung seperti Akte Kelahiran, Kartu Keluarga, serta Ijazah atau Surat Keterangan Lulus (SKL)atau Surat Keterangan Hasil Ujian (SKHU).
				</p>
				<p class="card-text">
					Mohon diperhatikan pengisian data pada formulir PPDB nantinya akan dipakai dalam proses verifikasi data Calon Peserta Didik.
				</p>
				<p class="card-text">
					Setelah proses pengisian form PPDB secara online berhasil dilakukan, calon peserta didik akan mendapat bukti daftar dengan nomor pendaftaran dan harus disimpan yang akan digunakan untuk proses selanjutnya.
				</p>
				<hr/>
			</div>
			<div class="col-lg-4">
			<div class="card card-warning">
					<div class="card-header">
						<h3 class="card-title">Login Calon Peserta Didik</h3>
					</div>
					<div class="card-body">
						<div class="form-group row">
						<div class="col-sm-12">
							<input type="text" class="form-control" id="username" name="username" placeholder="Ketikkan Nomor Pendaftaran, NIK atau NISN">
						</div>
						</div>
						<div class="form-group row">
						<div class="col-sm-12">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
						</div>
						</div>
					</div>
					<!-- /.card-body -->
					<div class="card-footer">
						<button class="btn btn-primary btn-flat" id="btnlogin">
							<i class="fas fa-fw fa-lock"></i> Login
						</button>
						<a href="?p=registrasi&m=1" class="btn btn-success btn-flat">
							<i class="far fa-fw fa-check-square"></i> Registrasi
						</a>
					</div>
					<!-- /.card-footer -->
			</div> 
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btnlogin").click(function(){
			var user=$("#username").val();	
			var pass=$("#password").val();
			if(user=='' || user==null)
			{
				toastr.error('Username Wajib Diisi!');
				$("#username").focus();
			}
			else if(pass=='' || pass==null)
			{
				toastr.error('Password Tidak Boleh Kosong');
				$("#password").focus();
			}
			else
			{
				$.ajax({
					type:"POST",
					url:"ceklogin.php",	
					data: "user="+user+"&pass="+pass,
						success: function(data){
						if(data==1)
						{
							window.location.href='?p=home';
						}
						else
						{
							toastr.error('Login Gagal, Cek Username dan Password Pastikan Anda Sudah Terdaftar!');	
						}						 
					}
				});
			}
		})
	});
</script>
<?php } ?>