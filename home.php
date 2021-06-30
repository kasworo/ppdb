<?php
	session_start();
	if(isset($_POST['login'])){		
		$user = mysqli_real_escape_string($conn, $_POST['user']);
		$passz = mysqli_real_escape_string($conn, $_POST['pass']);
		
		$sqlcek = "SELECT nopend, pwd FROM tb_calsis cs INNER JOIN tb_thpel tp ON tp.kdthpel=cs.kdthpel WHERE nopend = '$user' OR nik='$user' OR nisn='$user' AND tp.aktif='Y'";
		$cek=cekdata($sqlcek);
		if($cek>0)
		{
			$data=query($sqlcek);
			if(password_verify($passz, $data['pwd'])){
				$_SESSION['login']=true;
				setcookie('id',$data['username'],time()+3600);
				$qskul=$conn->query("SELECT idskul FROM tbskul");
				$sk=$qskul->fetch_assoc();
				setcookie('kdskul',hash('sha256',$sk['kdskul']), time()+3600);
				
				if(isset($_POST['ingat'])){					
					setcookie('key',hash('sha256',$data['passwd']),time()+3600);
				}
				header("Location:index.php?p=dashboard");
				exit;
			}
		}
				
	}
	if(isset($awal)): ?>
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
                    <form action="" method="post">
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
                        <div class="card-footer">
                            <button class="btn btn-primary btn-flat" id="btnlogin" name="login">
                                <i class="fas fa-fw fa-lock"></i> Login
                            </button>
                            <a href="index.php?p=registrasi&m=1" class="btn btn-success btn-flat">
                                <i class="far fa-fw fa-check-square"></i> Registrasi
                            </a>
                        </div>
                    </form>
			</div> 
		</div>
	</div>
</div>
<?php else:?>
<div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0"><marquee>Selamat Datang Calon Peserta Didik</marquee></h5>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6" style="padding-right:40px;text-align:justify">
                <p class="card-text">
                  <strong>Petunjuk:</strong>
				</p>
				<p class="card-text">
				Pendaftaran daring dapat dilakukan secara mandiri oleh peserta didik atau orang tua/wali, atau secara kolektif oleh sekolah asal. Ikuti langkah-langkah berikut ini!
					<ol>
						<li>
							Kunjungi website PPDB di alamat <a href="https://ppdb.smpnlipat.sch.id">https://ppdb.smpnlipat.sch.id</a>, kemudian  klik menu <strong>Registrasi</strong> lalu pilih <em>Individu</em> atau <em>Kolektif</em>.
						</li>
						<li>
							Untuk pendaftaran secara individu isilah formulir yang ditampilkan dengan data pribadi calon peserta didik. Setelah selesai pastikan anda menyimpan atau mencetak bukti pendaftaran.<br/><em> Untuk pendaftaran secara kolektif silahkan ikuti petunjuk pada halaman yang ditampilkan</em>.
						</li>
						<li>
							Tunggu beberapa saat setelah akun selesai dibuat, kemudian siapkan dokumen-dokumen pendukung seperti Akte Kelahiran, Kartu Keluarga, serta Ijazah atau Surat Keterangan Lulus (SKL)atau Surat Keterangan Hasil Ujian (SKHU).
						</li>
						<li>
						    Silahkan login dengan menggunakan Nomor Pendaftaran, NIK, atau NISN dengan password yang sudah diberikan pada saat registrasi.
						</li>
						<li>
						    Setelah berhasil login silahkan lengkapi data calon peserta didik, data orang tua/wali, data nilai, dan mengunggah dokumen pendukung.
						</li>
						<li>
						    Panitia PPDB akan melakukan verifikasi, validasi dan seleksi data calon peserta didik.
						</li>
						<li>
						    Calon Peserta Didik yang memenuhi syarat boleh mencetak bukti pendaftaran, atau meminta bukti pendaftaran dari Panitia PPDB.
						</li>
						<li>
						    Calon Peserta Didik kemudian melengkapi kemudian menyerahkan bukti pendaftaran sesuai dengan jadwal pendaftaran ulang.
						</li>
					</ol>
				</p>
              </div>
			  <div class="col-lg-6" style="padding-right:40px;text-align:center">
			  	<p class="card-text">
                  <strong>Alur Pendaftaran PPDB</strong>
				</p>
				<img class="img" src="assets/img/alur_ppdb.png" width="100%">
			  </div>
            </div>
          </div>
        </div>
<?php endif?>