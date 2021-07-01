<?php
if(isset($_GET['m'])) {
	if($_GET['m']=='1') {
		$nopend='';
		$nik='';
		$nisn='';
		$nama='';
		$tmplhr='';
		$tgllhr='';
		$gender='';
		$agama='';
		$alamat='';
		$desa='';
		$kec='';
		$kab='';
		$prov='';
		$kdpos='';
		$nohp='';
		$idskulasal='';
	}
	else {
		$id=base64_decode($_GET['id']);
		$cs=viewdata("tb_calsis", "idcalsis",$id)[0];
		$nopend=$cs['nopend'];
		$nik=$cs['nik'];
		$nisn=$cs['nisn'];
		$nama=$cs['nama'];
		$tmplhr=$cs['tmplhr'];
		$tgllhr=$cs['tgllhr'];
		$gender=$cs['gender'];
		$agama=$cs['agama'];
		$alamat=$cs['alamat'];
		$desa=$cs['desa'];
		$kec=$cs['kec'];
		$kab=$cs['kab'];
		$prov=$cs['prov'];
		$kdpos=$cs['kdpos'];
		$nohp=$cs['nohp'];
		$idskulasal=$cs['idskulasal'];
	}
}

if(isset($_POST['simpan'])){
	if(isset($_GET['id'])){
		$id=base64_decode($_GET['id']);
		$data=array(
			'nik' => $_POST['nik'],
			'nisn' => $_POST['nisn'], 
			'nama' => $_POST['calsis'], 
			'tmplhr' => $_POST['tmplahir'], 
			'tgllhr' => $_POST['tgllahir'], 
			'agama' => $_POST['agama'], 
			'gender' => $_POST['gender'], 
			'alamat' => $_POST['almt'], 
			'desa' => $_POST['desa'], 
			'kec' => $_POST['kec'], 
			'kab' => $_POST['kab'], 
			'prov' => $_POST['prov'], 
			'kdpos' => $_POST['kdpos'], 
			'nohp' => $_POST['nohp'],
			'idskulasal'=>$_POST['skul']
		);
		$rows=editdata("tb_calsis",$data,"idcalsis",$id);
		if($rows>0){
			echo "<script>alert('Update Data Berhasil');
				window.location.href='index.php?p=addsiswa&m=2&id=$_GET[id]';
			</script>";
			
			exit;
		}
		else {
			echo "<script>alert('Update Data Gagal')</script>";
			exit;
		}
	}
	else {		
		$pass=password_hash(str_replace('-',$_POST['tgllahir']),PASSWORD_DEFAULT);
		$data=array(
			'nopend'=>getnomor(),
			'kdskul'=>getskul(),
			'kdthpel'=>getthpel(),
			'nik' => $_POST['nik'],
			'nisn' => $_POST['nisn'], 
			'nama' => $_POST['calsis'], 
			'tmplhr' => $_POST['tmplahir'], 
			'tgllhr' => $_POST['tgllahir'], 
			'agama' => $_POST['agama'], 
			'gender' => $_POST['gender'], 
			'alamat' => $_POST['almt'], 
			'desa' => $_POST['desa'], 
			'kec' => $_POST['kec'], 
			'kab' => $_POST['kab'], 
			'prov' => $_POST['prov'], 
			'kdpos' => $_POST['kdpos'], 
			'nohp' => $_POST['nohp'], 
			'pwd'=>$pass, 
			'deleted'=>'0',
			'idskulasal'=>$_POST['skul']
		);	
		$rows=adddata("tb_calsis",$data);
		if($rows>0){
			echo "<script>
				alert('Tambah Data Berhasil');
				window.location.href='index.php?p=addsiswa&m=2';
			</script>";
			exit;
		}
		else {
			echo "<script>alert('Tambah Data Gagal')</script>";
			exit;
		}
	}
}
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Data Calon Peserta Didik</h5>
	</div>
	<form action="" method="post">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I K</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="nik" id="nik" value="<?php echo $nik;?>" onkeyup="validAngka(this)" placeholder="N I K Sesuai KK"> 
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I S N</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="nisn" id="nisn" value="<?php echo $nisn;?>" onkeyup="validAngka(this)" placeholder="Nomor Induk Siswa Nasional Yang Valid">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nama Calon Peserta Didik</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="calsis" id="calsis" value="<?php echo $nama;?>" placeholder="Nama Lengkap Calon Peserta Didik">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="tmplahir" id="tmplahir" value="<?php echo $tmplhr;?>" placeholder="Tempat Lahir Sesuai Akte">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="tgllahir" id="tgllahir" value="<?php echo $tgllhr;?>" placeholder="Tanggal Lahir Sesuai Akte">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Jenis Kelamin</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="gender" id="gender">
							<?php
							if($gender=="L"){$jk0="";$jk1="selected";$jk2="";}
							else if($cs['gender']=="P"){$jk0="";$jk1="";$jk2="selected";}
							else {$jk0="selected";$jk1="";$jk2="";}
							?>
							<option value="" <?php echo $jk0;?>>..Pilih Gender..</option>
							<option value="L" <?php echo $jk1;?>>Laki-laki</option>
							<option value="P" <?php echo $jk2;?>>Perempuan</option>
						</select>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Agama</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="agama" id="agama">
							<?php
								switch ($agama) {
									case 'A':
									{
										$agm1="selected";
										$agm2="";
										$agm3="";
										$agm4="";
										$agm5="";
										$agm6="";
										break;
									}
									case 'B':
									{
										$agm1="";
										$agm2="selected";
										$agm3="";
										$agm4="";
										$agm5="";
										$agm6="";
										break;
									}
									case 'C':
									{
										$agm1="";
										$agm2="";
										$agm3="selected";
										$agm4="";
										$agm5="";
										$agm6="";
										break;
									}
									case 'D':
									{
										$agm1="";
										$agm2="";
										$agm3="";
										$agm4="selected";
										$agm5="";
										$agm6="";
										break;
									}
									case 'E':
									{
										$agm1="";
										$agm2="";
										$agm3="";
										$agm4="";
										$agm5="selected";
										$agm6="";
										break;
									}
									case 'F':
									{
										$agm1="";
										$agm2="";
										$agm3="";
										$agm4="";
										$agm5="";
										$agm6="selected";
										break;
									}
									default:
									{
										$agm1="";
										$agm2="";
										$agm3="";
										$agm4="";
										$agm5="";
										$agm6="";
										break;
									}
								}
							?>
							<option value="">..Pilih Agama..</option>
							<option <?php echo $agm1;?> value="A">Islam</option>
							<option <?php echo $agm2;?> value="B">Kristen</option>
							<option <?php echo $agm3;?> value="C">Katholik</option>
							<option <?php echo $agm4;?> value="D">Hindu</option>
							<option <?php echo $agm5;?> value="E">Buddha</option>
							<option <?php echo $agm6;?> value="F">Konghucu</option>
						</select>
					</div>
				</div>
			</div>
			<div class="col-sm-6">
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Alamat</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="almt" id="almt" value="<?php echo $alamat;?>" placeholder="Alamat Sesuai KK">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="desa" id="desa" value="<?php echo $desa;?>" placeholder="Desa/Kelurahan Sesuai KK">		
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kecamatan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="kec" id="kec" value="<?php echo $kec;?>" placeholder="Kecamatan Sesuai KK">	
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kabupaten</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="kab" id="kab" value="<?php echo $kab;?>" placeholder="Kabupaten Sesuai KK">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Provinsi</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="prov" id="prov" value="<?php echo $prov;?>" placeholder="Provinsi Sesuai KK">
					</div>
				</div>					
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kode Pos</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="kdpos" id="kdpos" value="<?php echo $kdpos;?>" placeholder="Kode Pos Sesuai KK">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nomor HP</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="nohp" id="nohp" value="<?php echo $nohp;?>" placeholder="Nomor Telepon Seluler Yang Aktif">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Sekolah Asal</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="skul" id="skul">
							<option value=''>..Pilih Sekolah Asal..</option>
							<?php 
								$qsek = viewdata("tb_skul_asal");
								foreach($qsek as $sek){
								if($idskulasal==$sek['idskulasal']){$sekul='selected';} else {$sekul='';}
							?>
								<option value="<?php echo $sek['idskulasal'];?>" <?php echo $sekul;?>><?php echo $sek['nmskulasal'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
			</div> 
		</div>
	</div>
	<div class="card-footer justify-content-around">
		<div class="row">
			<div class="col-sm-3 offset-sm-2">
				<a href="index.php?p=datacalsis" class="btn btn-secondary btn-md btn-flat btn-block mb-2">
					<i class="fas fa-reply"></i>
					<span>&nbsp;Kembali</span>
				</a>
			</div>
			<div class="col-sm-3">
				<button class="btn btn-primary btn-md btn-flat btn-block mb-2" id="simpan" name="simpan">
					<i class="fas fa-fw fa-save"></i>
					<span>&nbsp;Simpan</span>
				</button> 
			</div>
			<div class="col-sm-3">		   
				<a href="index.php?p=addortu&id=<?php echo base64_encode($id);?>" class="btn btn-success btn-md btn-flat btn-block mb-2">
					<i class="fas fa-fw fa-arrow-right"></i>
					<span>&nbsp;Berikutnya</span>
				</a>
			</div>
		</div>
	</div>
	</form>
</div>
<script type="text/javascript">
	function validAngka(a)
	{
		if(!/^[0-9.]+$/.test(a.value))
		{
			a.value = a.value.substring(0,a.value.length-1000);
		}
	}
	$(document).ready(function(){
		$('#tgllahir').datetimepicker({
			timepicker:false,
			format: 'Y-m-d'
		});
	})
</script>