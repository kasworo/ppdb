<?php
  session_start();
  include "dbfunction.php";
  $skul=query("SELECT*FROM tb_skul")[0];
  
  if(isset($_COOKIE['id'],$_COOKIE['key'])){
		$id=$_COOKIE['id'];
		$key=$_COOKIE['key'];
		$sql = "SELECT username, passwd FROM tb_user WHERE iduser = '$id'";
    $query=mysqli_query($conn, $sql);
		$data=mysqli_fetch_assoc($query);
		if($key===hash('sha256',$data['passwd'])){
			$_SESSION['login']=true;
		}
	}

	if(isset($_SESSION['login'])){
		header("Location: index.php?p=dashboard");
		exit;
	}
	
	if(isset($_POST['login'])){
		$tgl=date('Y-m-d H:i:s');	
		$user=mysqli_real_escape_string($conn,$_POST['user']);
		$pass=mysqli_real_escape_string($conn,$_POST['pass']);		
    $sql ="SELECT iduser,username, passwd FROM tb_user WHERE username = '$user'";
    $query=mysqli_query($conn,$sql);
    $cekuser=mysqli_num_rows($query);
		if($cekuser===1){
			$data=mysqli_fetch_assoc($query);
      if(password_verify($pass, $data['passwd'])){
				$_SESSION['login']=true;
				setcookie('id',$data['iduser'],time()+7200);
				if(isset($_POST['ingat'])){
					setcookie('id',$data['id'],time()+7200); 				
					setcookie('key',hash('sha256',$data['passwd']),time()+7200);
				}
        header("Location: index.php?p=dashboard");
				exit;
			}
		}
		$error=true;
	}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Sistem Informasi PPDB</title>
	<link href='../assets/img/tutwuri.png' rel='icon' type='image/png'/>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="../assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="../assets/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
	<link rel="stylesheet" href="../assets/plugins/toastr/toastr.min.css">
  <link rel="stylesheet" href="../assets/css/adminlte.min.css">
</head>
<body class="hold-transition login-page" style="background:url(../assets/img/boxed-bg.png)">
<div class="login-box">
  <div class="login-logo">
    <span style="font-size:20pt">Aplikasi <b>Sistem Informasi</b></span><p style="font-size:14pt">Penerimaan Peserta Didik Baru (PPDB)</p>
    </span>
  </div>
  <div class="card">
    <form action="" method="post">
      <div class="card-body register-card-body">
        <p class="login-box-msg">Silahkan Login <br/>Menggunakan Username dan Password Yang Anda Miliki</p>
        <div class="input-group mb-3">
          <input type="text" class="form-control" id="user" name="user" placeholder="Username">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8">
              <div class="icheck-primary">
                <input type="checkbox" id="ingat" name="ingat">
                <label for="ingat">
                  Tetap Masuk
                </label>
              </div>
            </div>
            
            <div class="col-4">
              <button class="btn btn-primary btn-block" id="btnlogin" name="login">
                <i class="fas fa-sign-in-alt"></i>&nbsp;Login
              </button>
            </div>            
          </div>
          <br/>
          <div class="row mt-3">
          <?php echo $skul['nmskul'];?>&nbsp;&copy;&nbsp;2021
          </div>
      </div>
    </form>
  </div>
</div>
<script src="../assets/plugins/jquery/jquery.min.js"></script>
<script src="../assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/plugins/toastr/toastr.min.js"></script>
<script src="../assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<script src="../assets/js/adminlte.min.js"></script>
</body>
</html>
