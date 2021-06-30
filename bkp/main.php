<?php 
session_start();
include "config/konfigurasi.php";
include "config/fungsi_tgl.php";
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
	<link rel="stylesheet" type="text/css" href="assets/css/dropzone.css"/>
	<script type="text/javascript" src="assets/js/dropzone.js"></script>
	<script type="text/javascript" src="assets/js/jquery-1.4.js"></script>
	<script type="text/javascript" src="assets/js/ajaxupload.3.5.js" ></script>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
	<?php if(isset($_SESSION['s_user'])){ ?>
	<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
		<a href="?p=home" class="navbar-brand">
				<img src="assets/img/tutwuri.png" alt="PPDB App" class="brand-image img-circle elevation-3"
					style="opacity:0.8">		
			</a>	
			<button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
				<!-- Left navbar links -->
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="?p=isiform" class="nav-link">Data Pribadi</a>
					</li>
					<li class="nav-item">
						<a href="?p=dataortu" class="nav-link">Data Orang Tua</a>
					</li>
					<li class="nav-item">
						<a href="?p=datanilai" class="nav-link">Data Nilai</a>
					</li>
					<li class="nav-item">
						<a href="?p=dataupload" class="nav-link">Upload Dokumen</a>
					</li>
				</ul>
				<!-- SEARCH FORM -->
				<form class="form-inline ml-0 ml-md-3">
					<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Cari..." aria-label="Search">
						<div class="input-group-append">
							<button class="btn btn-navbar" type="submit">
								<i class="fas fa-search"></i>
							</button>
						</div>
					</div>
				</form>
			</div>
			<!-- Right navbar links -->
			<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
				<!-- Messages Dropdown Menu -->
				<li class="nav-item dropdown">
		 			<a class="nav-link"  href="?p=kontak">HUBUNGI KAMI</a>
					<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"></div>
				</li>		
				<li class="nav-item dropdown">
					<a class="nav-link" href="logout.php">
						<i class="fas fa-power-off"></i>&nbsp;LOGOUT
					</a>
				</li>
			</ul>
	</nav>
	<?php	} else { ?>
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
			<?php
			$sql=mysqli_query($sqlconn, "SELECT awal, akhir FROM tb_jadwal WHERE main='1'");
			$s=mysqli_fetch_array($sql);
			$awal=$s['awal'];
			$akhir=$s['akhir'];
			$tgl=date('Y-m-d H:i:s');
			if($tgl<$awal){
			?>
			<li class="nav-item">
				<a href="?p=jadwal" class="nav-link">Jadwal</a>
			</li>
			<li class="nav-item">
				<a href="?p=syarat" class="nav-link">Syarat</a>
			</li>
			<?php } else if($tgl>=$awal && $tgl<=$akhir){
			?>
			<li class="nav-item">
				<a href="?p=jadwal" class="nav-link">Jadwal</a>
			</li>
			<li class="nav-item">
				<a href="?p=syarat" class="nav-link">Syarat</a>
			</li>
			<li class="nav-item dropdown">
				<a class="nav-link" data-toggle="dropdown" href="#">
					Registrasi
				</a>
				<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
					<a href="?p=registrasi&m=1" class="dropdown-item">
						<i class="fas fa-user mr-2"></i> Individu
					</a>
					<a href="?p=buatsiswa" class="dropdown-item">
						<i class="fas fa-users mr-2"></i> Kolektif
					</a>
				</div>
			</li>
			<?php } else {?>
			<li class="nav-item">
				<a href="?p=jadwal" class="nav-link">Jadwal</a>
			</li>
			<li class="nav-item">
				<a href="?p=syarat" class="nav-link">Syarat</a>
			</li>
			<li class="nav-item">
				<a href="?p=seleksi" class="nav-link"><span style="color:red">Cek Hasil Seleksi</span></a>
			</li>
			<?php } ?>
			<li class="nav-item">
				<a href="?p=kontak" class="nav-link">Hubungi Kami</a>
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
	<?php }
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
	else if($_REQUEST['p']=='registrasi')
	{
		$link="?p=registrasi";
		$judul="Registrasi Peserta Didik";
		$info="Registrasi";
	}

	else if($_REQUEST['p']=='buatsiswa' || $_REQUEST['p']=='buatortu' || $_REQUEST['p']=='buatnilai' || $_REQUEST['p']=='buatdokumen' || $_REQUEST['p']=='cekupload')
	{
		$link="?p=registrasi";
		$judul="Registrasi Peserta Didik Kolektif";
		$info="Registrasi";
	}
	
	else if($_REQUEST['p']=='isiform' || $_REQUEST['p']=='dataortu' || $_REQUEST['p']=='datanilai' || $_REQUEST['p']=='dataupload')
	{
		$link="?p=isiform";
		$judul="Formulir Calon Peserta Didik";
		$info="Registrasi";
	}
	
	else if($_REQUEST['p']=='kontak')
	{
		$link="?p=kontak";
		$judul="Kontak Person Panitia PPDB";
		$info="Kontak";
	}
	
	else if($_REQUEST['p']=='templatenilai')
	{
		$link="?p=templatenilai";
		$judul="Nilai Calon Peserta Didik";
		$info="Registrasi";
	}
	else if($_REQUEST['p']=='templatedokumen')
	{
		$link="?p=templatedokumen";
		$judul="Dokumen Pendukung Data Calon Peserta Didik";
		$info="Registrasi";
	}
	else if($_REQUEST['p']=='seleksi')
	{
		$link="?p=seleksi";
		$judul="Hasil Seleksi Calon Peserta Didik";
		$info="Hasil Seleksi";
	}
	else
	{
		$link="?";
		$judul="Under Construction";
		$info="Lagi Digawe";
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
			//ob_start();
			if(isset($_REQUEST['p'])=='' || $_REQUEST['p']=='home'){include "home.php";}
			else if($_REQUEST['p']=='jadwal'){include "jadwal.php";}
			else if($_REQUEST['p']=='syarat'){include "syarat.php";}
			else if($_REQUEST['p']=='kontak'){include "kontak.php";}
			else if($_REQUEST['p']=='registrasi'){include "registrasi.php";}
			else if($_REQUEST['p']=='seleksi'){include "cekseleksi.php";}
			else if($_REQUEST['p']=='isiform'){include "formsiswa.php";}
			else if($_REQUEST['p']=='dataortu'){include "formortu.php";}
			else if($_REQUEST['p']=='datanilai'){include "formnilai.php";}
			else if($_REQUEST['p']=='dataupload'){include "formupload.php";}
			else if($_REQUEST['p']=='buatsiswa'){include "buatsiswa.php";}	
			else if($_REQUEST['p']=='buatortu'){include "buatortu.php";}
			else if($_REQUEST['p']=='buatnilai'){include "buatnilai.php";}
			else if($_REQUEST['p']=='buatdokumen'){include "buatdokumen.php";}
			else if($_REQUEST['p']=='cekupload'){include "cekupload.php";}
			else { echo "Under Construction";}
			//ob_flush();
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
		Created by Kasworo Wardani, S.T 
	</div>
	<!-- Default to the left -->
	<strong>Copyright &copy; 2020, Template by <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
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
<script src="assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
</body>
</html>
