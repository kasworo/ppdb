<?php
	session_start();
	if(!isset($_SESSION['login'])){header("Location: login.php");}
	include "dbfunction.php";
	$quser=mysqli_query($conn, "SELECT nama, foto, `level` FROM tb_user WHERE iduser='$_COOKIE[id]'");
	$u=mysqli_fetch_assoc($quser);
	$nama=$u['nama'];
	$foto=$u['foto'];
	$level=$u['level'];
	
	if($foto=='' || $foto==null){
		$fotouser='../assets/img/avatar.gif';
	}
	else{
		if(file_exists('foto/'.$foto)){
			$fotouser='foto/'.$foto;
		}
		else{
			$fotouser='../assets/img/avatar.gif';
		}
	}
	
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<title>Sistem Informasi PPDB</title>
	<link href='../assets/img/tutwuri.png' rel='icon' type='image/png'/>
	<!-- Font Awesome Icons -->
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="../assets/css/adminlte.min.css">
	<link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
	<link rel="stylesheet" href="../assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="../assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- Google Font: Source Sans Pro -->
	<!--<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">-->
	<link rel="stylesheet" type="text/css" href="../assets/css/jquery.datetimepicker.css"> 
	<link rel="stylesheet" type="text/css" href="../assets/css/dropzone.css"/>
	<script type="text/javascript" src="../assets/js/dropzone.js"></script>
	<script type="text/javascript" src="../assets/js/jquery-1.4.js"></script>
	<script type="text/javascript" src="../assets/js/ajaxupload.3.5.js"></script>
</head>
<body class="skihold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
<div class="modal fade" id="myPassword" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title">Ganti Password</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-10 offset-sm-1">
						<div class="form-group mb-2">
							<label >Password Lama</label>
							<input type="password" class="form-control input-sm" id="passlama" name="passlama">
						</div>
						<div class="form-group mb-2">
							<label >Password Baru</label>
							<input type="password" class="form-control input-sm" id="passbaru" name="passbaru">
						</div>
						<div class="form-group mb-2">
							<label >Konfirmasi Password</label>
							<input type="password" class="form-control input-sm" id="passkonf" name="passkonf">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
                    <button type="submit" class="btn btn-primary btn-md btn-flat" id="gantipass">
                        <i class="fas fa-save"></i> Update
                    </button>
					<button type="button" class="btn btn-danger btn-md btn-flat" data-dismiss="modal">
						<i class="fas fa-power-off"></i> Tutup
					</button>
				</div>
		</div>
			<!-- /.modal-content -->
	</div>
		<!-- /.modal-dialog -->
</div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<!-- Left navbar links -->
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button">
				<i class="fas fa-bars"></i>
			</a>
		</li>
	</ul>
	<!-- SEARCH FORM -->
	<div class="form-inline ml-2">
	  <div class="input-group input-group-sm">
		<input class="form-control form-control-navbar" type="search" id="dicari" placeholder="Cari Peserta Didik..." aria-label="Search">
		<div class="input-group-append">
		  <button class="btn btn-navbar" id="goleki">
			<i class="fas fa-search"></i>
		  </button>
		</div>
	  </div>
	</div>
	<!-- Right navbar links -->
	<ul class="navbar-nav ml-auto">	
		<li class="nav-item">
			<span class="btn nav-link">
				<?php echo $nama;?>
			</span>
	  	</li>
		<li class="nav-item">
			<span class="btn nav-link"  data-toggle="modal" data-target="#myPassword" title="Ganti Password">
			<i class="fas fa-key"></i>
			</span>
	  	</li>
		<li class="nav-item">
			<a href="index.php?p=adduser&m=3" class="nav-link" title="Edit Data">
			<i class="fas fa-edit"></i>
			</a>
	  	</li>
		<li class="nav-item">
			<a class="nav-link" href="logout.php" title="Keluar / Logout">
		  		<i class="fas fa-power-off"></i>
			</a>
	  </li>
	</ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="index.php?p=dashboard" class="brand-link">
	  <img src="../assets/img/logo.png" width="100" class="brand-image elevation-3"
		   style="opacity: 1.0">
	 <span class="brand-text font-weight-light">Aplikasi PPDB 1.1</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
	  <nav class="mt-3 pb-3 mb-3">
		<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
		  <!-- Add icons to the links using the .nav-icon class
			   with font-awesome or any other icon font library -->
		  <?php	if($level=='1'){ ?>
		  <li class="nav-item has-treeview">
		  	<a href="#" class="nav-link">
				<i class="nav-icon fas fa-cogs"></i>
				<p>
					Pengaturan
				</p>
				<i class="fas fa-angle-left right"></i>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="index.php?p=datasekolah" class="nav-link">
						<i class="fas fa-school nav-icon"></i>
						<p>Identitas Sekolah</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?p=datauser" class="nav-link">
						<i class="fas fa-users nav-icon"></i>
						<p>Pengguna</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?p=datamapel" class="nav-link">
					<i class="far fa-check-square nav-icon"></i>
					<p>Mata Pelajaran</p>
					</a>
				</li>
				<li class="nav-item">
				<a href="index.php?p=skulasal" class="nav-link">
				  <i class="fas fa-graduation-cap nav-icon"></i>
				  <p>Sekolah Asal</p>
				</a>
			  </li>
			</ul>
		  </li>
		  <li class="nav-item has-treeview">
			<a href="#" class="nav-link">
			  <i class="nav-icon fas fa-database"></i>
			  <p>
				Data PPDB
				<i class="fas fa-angle-left right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
				<li class="nav-item">
					<a href="index.php?p=jadwal" class="nav-link">
					<i class="far fa-calendar nav-icon"></i>
					<p>Jadwal PPDB</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?p=syarat" class="nav-link">
					<i class="far fa-check-square nav-icon"></i>
					<p>Persyaratan PPDB</p>
					</a>
				</li>
			  <li class="nav-item">
				<a href="index.php?p=datacalsis" class="nav-link">
				  <i class="fas fa-user-graduate nav-icon"></i>
				  <p>Calon Peserta Didik</p>
				</a>				
			  </li>
			  <li class="nav-item">
				<a href="index.php?p=datanilai" class="nav-link">
				  <i class="fas fa-chart-pie nav-icon"></i>
				  <p>Nilai Rapor dan USBN </p>
				</a>				
			  </li>
			  <li class="nav-item">
				<a href="index.php?p=cekberkas" class="nav-link">
				  <i class="fas fa-check nav-icon"></i>
				  <p>Kelengkapan Berkas</p>
				</a>
			  </li>				  
			</ul>
		  </li>
		  <li class="nav-item has-treeview">
			<a href="#" class="nav-link">
			  <i class="nav-icon fas fa-print"></i>
			  <p>
				Laporan
				<i class="fas fa-angle-left right"></i>
			  </p>
			</a>
			<ul class="nav nav-treeview">
			  <li class="nav-item">
				<a href="index.php?p=hasilseleksi" class="nav-link">
				  <i class="fas fa-list-alt nav-icon"></i>
				  <p>Hasil Seleksi</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="index.php?p=bataldaftar" class="nav-link">
				  <i class="far fa-list-alt nav-icon"></i>
				  <p>Batal Registrasi</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="index.php?p=buktitampil" class="nav-link">
				  <i class="far fa-file-pdf nav-icon"></i>
				  <p>Formulir Daftar Ulang</p>
				</a>
			  </li>
			</ul>
		  </li>
		  <?php } else { ?>
			<li class="nav-item">
					<a href="index.php?p=jadwal" class="nav-link">
					<i class="far fa-calendar nav-icon"></i>
					<p>Jadwal PPDB</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="index.php?p=syarat" class="nav-link">
					<i class="far fa-check-square nav-icon"></i>
					<p>Persyaratan PPDB</p>
					</a>
				</li>
			  <li class="nav-item">
				<a href="index.php?p=datacalsis" class="nav-link">
				  <i class="fas fa-user-graduate nav-icon"></i>
				  <p>Calon Peserta Didik</p>
				</a>				
			  </li>
			  <li class="nav-item">
				<a href="index.php?p=datanilai" class="nav-link">
				  <i class="fas fa-chart-pie nav-icon"></i>
				  <p>Nilai Rapor dan USBN </p>
				</a>				
			  </li>
			  <li class="nav-item">
				<a href="index.php?p=cekberkas" class="nav-link">
				  <i class="fas fa-check nav-icon"></i>
				  <p>Kelengkapan Berkas</p>
				</a>
			  </li>
			  <li class="nav-item">
				<a href="index.php?p=buktitampil" class="nav-link">
				  <i class="far fa-file-pdf nav-icon"></i>
				  <p>Formulir PPDB</p>
				</a>
			  </li>	
		  <?php } ?>
		  <li class="nav-item">
			<a href="#" class="nav-link">
			  <i class="far fa-question-circle nav-icon"></i>
			  <p>
				Bantuan
				<i class="fas fa-angle-left right"></i>
			  </p>
			</a>
		   </li>
		   <li class="nav-item">
			   <a href="#" class="nav-link">
				 <i class="fas fa-info-circle nav-icon"></i>
				 <p>Tentang</p>
			   </a>
			</li>
			  <li class="nav-item">
				<a href="logout.php" class="nav-link">
				  <i class="fas fa-power-off nav-icon"></i>
				  <p>Keluar</p>
				</a>
			  </li>
		</ul>
	  </nav>
	  <!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<div class="content-header">
	  <div class="container-fluid">
		<div class="row mb-2">
		  <div class="col-sm-6">
			<h1 class="m-0 text-dark">Dashboard</h1>
		  </div><!-- /.col -->
		  <div class="col-sm-6">
			<ol class="breadcrumb float-sm-right">
			  <li class="breadcrumb-item"><a href="#">Home</a></li>
			  <li class="breadcrumb-item active">Dashboard v1</li>
			</ol>
		  </div><!-- /.col -->
		</div><!-- /.row -->
	  </div><!-- /.container-fluid -->
	</div>
	<!-- /.content-header -->

	<!-- Main content -->
	<section class="content">
	  <div class="container-fluid">
		<!-- Small boxes (Stat box) -->
		<div class="form-group">
		<?php
			if(!isset($_GET['p']) || $_GET['p']=='' || $_GET['p']=='dashboard') {include "dashboard.php";}
			else if($_GET['p']=='datasekolah') {include "sekolah_tampil.php";}
			else if($_GET['p']=='datauser') {include "user_tampil.php";}
			else if($_GET['p']=='adduser'){include "user_form.php";}
			else if($_GET['p']=='jadwal') {include "jadwal_tampil.php";}
			else if($_GET['p']=='syarat') {include "syarat_tampil.php";}
			else if($_GET['p']=='datamapel') {include "mapel_tampil.php";}
			else if($_GET['p']=='skulasal') {include "skulasal_tampil.php";}
			else if($_GET['p']=='datacalsis') {include "calsis_tampil.php";}
			else if($_GET['p']=='datanilai') {include "nilai_tampil.php";}
			else if($_GET['p']=='addsiswa'){include "calsis_form.php";}
			else if($_GET['p']=='addortu'){include "ortu_form.php";}
			else if($_GET['p']=='addnilai'){include "nilai_form.php";}
			else if($_GET['p']=='addupload'){include "upload_form.php";}
			else if($_GET['p']=='cekberkas'){include "berkas_tampil.php";}
			else if($_GET['p']=='ceklisberkas'){include "berkas_ceklis.php";}
			else if($_GET['p']=='berkasupload'){include "berkas_upload.php";}
			else if($_GET['p']=='buktitampil'){include "bukti_tampil.php";}
			
			else if($_GET['p']=='hasilseleksi'){include "seleksi_tampil.php";}
			
		?>		  
		</div>
		<!-- /.row (main row) -->
	  </div><!-- /.container-fluid -->
	</section>
	<!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer text-sm">
	<strong>Copyright &copy;</strong> Kasworo Wardani, Template By <a href="http://adminlte.io">AdminLTE.io</a>.
	All rights reserved.
	<div class="float-right d-none d-sm-inline-block">
	  <b>Versi</b> 1.0.0
	</div>
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
	<!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->
<!-- jQuery -->
<script type="text/javascript" src="../assets/js/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#goleki").click(function(){
			var cari=$("#dicari").val();
			if(cari==null || cari=='' || cari==' '){
				toastr.error('Tidak Boleh Kosong!');	
			}
			else {
				$.ajax({
					type:"POST",
					url:"calsis_cari.php",
					data: "cari="+cari,
					success:function(data)
					{
						if(data==1)
							{
								window.location.href='index.php?p=addsiswa&m=2&id='+cari;
							}
							else
							{
								toastr.error('Data Tidak Ada');	
							}
					}	
				})
			}
		})
		$("#gantipass").click(function(){
			var passlama=$("#passlama").val();
			var passbaru=$("#passbaru").val();
			var passkonf=$("#passkonf").val();
			var id="<?php echo $_COOKIE['c_user'];?>";
			if(passlama==''){
				toastr.error('Password Lama Tidak Boleh Kosong');
				$("#passbaru").focus();
			}
			else if(passkonf!==passbaru){
				toastr.error('Password Tidak Sama');
				$("#passbaru").focus();
			}
			$.ajax({
                type:"POST",
				url:"user_simpan.php",
				data: "aksi=pass&id="+id+"&passbaru="+passbaru,
				success:function(data){
					toastr.success(data)
				}	
			})	
		})		
	})
</script>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../assets/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/js/adminlte.min.js"></script>
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/js/jquery.datetimepicker.full.js"></script>
<script src="../assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<script src="../assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
</body>
</html>
