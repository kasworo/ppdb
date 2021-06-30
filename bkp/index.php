<?php
	session_start();
	include "config/konfigurasi.php";
	$qj=mysqli_query($sqlconn, "SELECT*FROM tb_jadwal ORDER BY awal ASC LIMIT 1");
	$j=mysqli_fetch_array($qj);
	$awal=$j['awal'];
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Aplikasi PPDB Daring</title>
	<link href='assets/img/tutwuri.png' rel='icon' type='image/png'/>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="assets/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="assets/css/adminlte.min.css">
	<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
	<!-- Google Font: Source Sans Pro -->
	<!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
	<link rel="stylesheet" href="assets/css/jquery.datetimepicker.css"> 
	<script type="text/javascript" src="assets/js/jquery-1.4.js"></script>
	<script type="text/javascript">
		// Set the date we're counting down to
		var countDownDate = new Date("<?php echo $awal;?>").getTime();

		// Update the count down every 1 second
		var x = setInterval(function() {

		// Get today's date and time
		var now = new Date().getTime();

		// Find the distance between now and the count down date
		var distance = countDownDate - now;

		// Time calculations for days, hours, minutes and seconds
		//var days = Math.floor(distance / (1000 * 60 * 60 * 24));
		var hours = '0'+Math.floor(distance / (1000 * 60 * 60));
		var minutes = '0'+Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
		var seconds = '0'+Math.floor((distance % (1000 * 60)) / 1000);
		var h = hours.substr(-2);
		var m=  minutes.substr(-2);
		var s = seconds.substr(-2);
		// Display the result in the element with id="demo"
		document.getElementById("demo").innerHTML =h+":" + m + ":" + s; 
		// If the count down is finished, write some text
		if (distance < 0) {
			clearInterval(x);
			//document.getElementById("demo").innerHTML = "EXPIRED";
			//window.location.href="main.php?p=home";
			var formUtama=document.getElementById("formUtama")
			formUtama.submit();
		}
		}, 1000);
	</script>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
	<!-- Navbar -->
	<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
	<a href="?p=home" class="navbar-brand">
		<img src="assets/img/tutwuri.png" alt="PPDB App" class="brand-image img-circle elevation-3"
			 style="opacity: .8">
		<span class="brand-text font-weight-light">Aplikasi PPDB</span>
		</a>
		<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
		<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse order-3" id="navbarCollapse">
		<!-- Left navbar links -->
		<ul class="navbar-nav">
			<li class="nav-item">
			<a href="?p=jadwal" class="nav-link">Jadwal</a>
			</li>
			<li class="nav-item">
			<a href="?p=syarat" class="nav-link">Syarat</a>
			</li>		
			<li class="nav-item">
			<a href="?p=kontak" class="nav-link">
			Hubungi Kami
			</a>
		</li>
		<!-- SEARCH FORM -->
		<form class="form-inline ml-0 ml-md-3">
			<div class="input-group input-group-sm">
			<input class="form-control form-control-navbar" type="search" placeholder="Pencarian" aria-label="Search">
			<div class="input-group-append">
				<button class="btn btn-navbar" type="submit">
				<i class="fas fa-search"></i>
				</button>
			</div>
			</div>
		</form>
		</div>
	</nav>


	<!-- /.navbar -->
	<?php 
	if(isset($_REQUEST['p'])=='' || $_REQUEST['p']=='home')
		{
		$link="?";
		$judul="Beranda";
		$subjudul="";
		$info="";
		}
	else if($_REQUEST['p']=='jadwal')
	{
		$link="?p=jadwal";
		$judul="Jadwal PPDB <small>(Penerimaan Peserta Didik Baru)</small>";
		$info="Informasi Jadwal PPDB";
	}
	else if($_REQUEST['p']=='syarat')
	{
		$link="?p=syarat";
		$judul="Syarat dan Ketentuan PPDB <small>(Penerimaan Peserta Didik Baru)</small>";
		$info="Informasi Syarat dan Ketentuan PPDB";
	}
	else if($_REQUEST['p']=='dayatampung')
	{
		$link="?p=dayatampung";
		$judul="Informasi Daya Tampung";
		$info="Registrasi";
	}
	else if($_REQUEST['p']=='kontak')
	{
		$link="?p=kontak";
		$judul="Kontak Person Panitia PPDB";
		$info="Hubungi Kami";
	}
	?>
	<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper" style="background:url(assets/img/boxed-bg.png);height: auto;">
	<!-- Content Header (Page header) -->
	<div class="content-header">
		<div class="container-fluid">
		<div class="row mb-2">
			<div class="col-sm-8">
			<h4 class="m-0 text-dark"> <?php echo $judul;?></h4>
			</div><!-- /.col -->
			<div class="col-sm-4">
			<ol class="breadcrumb float-sm-right">
				<li class="breadcrumb-item"><a href="<?php echo $link;?>"><?php echo $info;?></a></li>
			</ol>
			</div><!-- /.col -->
		</div><!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<div class="content">
		<div class="container-fluid">
			<?php
			ob_start();
			if(isset($_REQUEST['p'])=='' || $_REQUEST['p']=='home'){ ?>
        <div class="card card-primary card-outline">
          <div class="card-header">
            <h5 class="m-0"><marquee>PPDB akan dibuka dalam <span id="demo"></span> lagi</marquee></h5>
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
			  	<form action="main.php" method="POST" id="formUtama"><input class="d-none" name="token" value="buka">
				  <?php 
				  $_SESSION['token']=md5('buka');
				  ?>
				  </form>
				<p class="card-text">
                  <strong>Alur Pendaftaran PPDB</strong>
				</p>
				<img class="img" src="assets/img/alur_ppdb.png" width="100%">
			  </div>
            </div>
          </div>
        </div>
      <?php }
			else if($_REQUEST['p']=='jadwal'){include "jadwal.php";}
			else if($_REQUEST['p']=='syarat'){include "syarat.php";}
			else if($_REQUEST['p']=='dayatampung'){include "dayatampung.php";}
			else if($_REQUEST['p']=='kontak'){include "kontak.php";}
			else { echo "Under Construction";}
			ob_flush();
			?>
		<!-- /.row -->
		</div><!-- /.container-fluid -->
	</div>
	<!-- /.content -->
	</div>
	<!-- /.content-wrapper -->

	<!-- Main Footer -->
	<footer class="main-footer text-sm">
	<!-- To the right -->
	<div class="float-right d-none d-sm-inline">
		Created By Kasworo Wardani, S.T
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2020, Template By <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
	</footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="assets/js/adminlte.min.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/js/jquery.datetimepicker.full.js"></script>
</body>
</html>
