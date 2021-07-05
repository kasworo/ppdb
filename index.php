<?php
	session_start();
	include "common.php";	
	$jd=viewdata("v_jadwal")[0];
	$awal=$jd['awal'];
	$thpel=substr($jd['nmthpel'],0,9);
	$bataslahir=getbataslahir();
	if(isset($_POST['cari'])){
		$sql="SELECT*FROM tb_calsis WHERE nama LIKE '$_POST[kunci]%'";
		$qcari=mysqli_query($conn,$sql);
		$cari=mysqli_num_rows($qcari);
		if($cari===1){
			$u=mysqli_fetch_assoc($qcari);
			$idsiswa=base64_encode($u['idcalsis']);
			header("Location:index.php?p=registrasi&m=2&id=".$idsiswa);
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Aplikasi PPDB Daring</title>
	<link href='assets/img/tutwuri.png' rel='icon' type='image/png'/>
	<link rel="stylesheet" href="assets/css/all.min.css">
	<link rel="stylesheet" href="assets/css/adminlte.min.css">
	<link rel="stylesheet" href="assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="assets/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="assets/css/jquery.datetimepicker.css"> 
	<script type="text/javascript" src="assets/js/jquery-1.4.js"></script>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed">
	<div class="wrapper">
		<nav class="main-header navbar navbar-expand-md navbar-light navbar-dark">
			<a href="index.php?p=home" class="navbar-brand">
				<img src="assets/img/tutwuri.png" alt="PPDB App" class="brand-image img-circle elevation-3"
					style="opacity: .8">
				<span class="brand-text font-weight-light">Aplikasi PPDB</span>
			</a>
			<button class="navbar-toggler order-1" type="button" data-toggle="collapse" 	data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse order-3" id="navbarCollapse">
				<?php if(isset($awal)):?>
				<?php if(isset($_SESSION['siswa'])): ?>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="index.php?p=isiform" class="nav-link">Data Pribadi</a>
					</li>
					<li class="nav-item">
						<a href="index.php?p=dataortu" class="nav-link">Data Orang Tua</a>
					</li>
					<li class="nav-item">
						<a href="index.php?p=datanilai" class="nav-link">Data Nilai</a>
					</li>
					<li class="nav-item">
						<a href="index.php?p=dataupload" class="nav-link">Upload Dokumen</a>
					</li>
				</ul>				
				<ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
					<li class="nav-item dropdown">
						<a class="nav-link"  href="index.php?p=kontak">Hubungi Kami</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right"></div>
					</li>		
					<li class="nav-item dropdown">
						<a class="nav-link" href="logout.php">
							<i class="fas fa-power-off"></i>&nbsp;LOGOUT
						</a>
					</li>
				</ul>
				<?php endif?>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="index.php?p=jadwal" class="nav-link">Jadwal</a>
					</li>
					<li class="nav-item">
						<a href="index.php?p=syarat" class="nav-link">Syarat</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link" data-toggle="dropdown" href="#">
							Registrasi
						</a>
						<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
							<a href="index.php?p=registrasi&m=1" class="dropdown-item">
								<i class="fas fa-user mr-2"></i> Individu
							</a>
							<a href="index.php?p=buatsiswa" class="dropdown-item">
								<i class="fas fa-users mr-2"></i> Kolektif
							</a>
						</div>
					</li>
					<li class="nav-item">
						<a href="index.php?p=seleksi" class="nav-link"><span style="color:red">Cek Hasil Seleksi</span></a>
					</li>		
					<li class="nav-item">
						<a href="index.php?p=kontak" class="nav-link">Hubungi Kami</a>
					</li>
				</ul>					
			<?php else:?>
				<ul class="navbar-nav">
					<li class="nav-item">
						<a href="index.php?p=jadwal" class="nav-link">Jadwal</a>
					</li>
					<li class="nav-item">
						<a href="index.php?p=syarat" class="nav-link">Syarat</a>
					</li>		
					<li class="nav-item">
						<a href="index.php?p=kontak" class="nav-link">Hubungi Kami</a>
					</li>
					<?php endif?>
					<form action ="" method="post" class="form-inline ml-0 ml-md-3">
						<div class="input-group input-group-sm">
						<input class="form-control form-control-navbar" type="search" placeholder="Pencarian" aria-label="Search" name="kunci">
							<div class="input-group-append">
								<button class="btn btn-navbar" type="submit" name="cari" id="cari">
									<i class="fas fa-search"></i>
								</button>
							</div>
						</div>
					</form>
				</ul>			
		</div>
	</nav>
	<?php 
	if(isset($_GET['p'])=='' || $_GET['p']=='home')
	{
		$link="?";
		$judul="Beranda";
		$subjudul="";
		$info="";
	}
	else if($_GET['p']=='jadwal')
	{
		$link="index.php?p=jadwal";
		$judul="Jadwal PPDB <small>(Penerimaan Peserta Didik Baru)</small>";
		$info="Informasi Jadwal PPDB";
	}
	else if($_GET['p']=='syarat')
	{
		$link="index.php?p=syarat";
		$judul="Syarat dan Ketentuan PPDB <small>(Penerimaan Peserta Didik Baru)</small>";
		$info="Informasi Syarat dan Ketentuan PPDB";
	}
	else if($_GET['p']=='dayatampung')
	{
		$link="index.php?p=dayatampung";
		$judul="Informasi Daya Tampung";
		$info="Registrasi";
	}
	else if($_GET['p']=='kontak')
	{
		$link="index.php?p=kontak";
		$judul="Kontak Person Panitia PPDB";
		$info="Hubungi Kami";
	}
	?>
	<div class="content-wrapper" style="background:url(assets/img/boxed-bg.png);height: auto;">
	<div class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-8">
					<h4 class="m-0 text-dark"> <?php echo $judul;?></h4>
				</div>
				<div class="col-sm-4">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?php echo $link;?>"><?php echo $info;?></a></li>
					</ol>
				</div>
			</div>
		</div>
	</div>
	<div class="content">
		<div class="container-fluid">
			<?php
			if(empty($_GET['p']) || $_GET['p']=='home'){include "home.php";}
			else if($_GET['p']=='jadwal'){include "jadwal.php";}
			else if($_GET['p']=='syarat'){include "syarat.php";}
			else if($_GET['p']=='kontak'){include "kontak.php";}
			else if($_GET['p']=='registrasi'){include "regisawal.php";}			
			else if($_GET['p']=='regisbukti'){include "regisbukti.php";}
			else if($_GET['p']=='seleksi'){include "cekseleksi.php";}
			else if($_GET['p']=='isiform'){include "formsiswa.php";}
			else if($_GET['p']=='dataortu'){include "formortu.php";}
			else if($_GET['p']=='datanilai'){include "formnilai.php";}
			else if($_GET['p']=='dataupload'){include "formupload.php";}
			else if($_GET['p']=='buatsiswa'){include "buatsiswa.php";}	
			else if($_GET['p']=='buatortu'){include "buatortu.php";}
			else if($_GET['p']=='buatnilai'){include "buatnilai.php";}
			else if($_GET['p']=='buatdokumen'){include "buatdokumen.php";}
			else if($_GET['p']=='cekupload'){include "cekupload.php";}
			else { echo "Under Construction";}
			?>
		</div>
	</div>
	</div>
	<footer class="main-footer text-sm">
	<div class="float-right d-none d-sm-inline">
		Created By Kasworo Wardani, S.T
	</div>
	<strong>Copyright &copy; 2021, Template By <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
	</footer>
</div>
<script src="assets/plugins/jquery/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/adminlte.min.js"></script>
<script src="assets/plugins/toastr/toastr.min.js"></script>
<script src="assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="assets/js/jquery.datetimepicker.full.js"></script>
</body>
</html>
