<?php
	$nisn=base64_decode($_GET['id']);
	$sql="SELECT*FROM tb_calsis WHERE nisn='$nisn'";
	$row=query($sql)[0];
	$idcalsis=base64_encode($row['idcalsis']);
	$nopend=$row['nopend'];
	$nama=$row['nama'];
	$nik=$row['nik'];
	$nisn=$row['nisn'];
	$tmplhr=$row['tmplhr'];
	$tgllhr=$row['tgllhr'];
	$agama=$row['agama'];
	$gender=$row['gender'];
	$alamat=$row['alamat'];
	$desa=$row['desa'];
	$kec=$row['kec'];
	$kab=$row['kab'];
	$prov=$row['prov'];
	$kdpos=$row['kdpos'];
	$nohp=$row['nohp'];
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Cetak Bukti Registrasi Calon Peserta Didik</h5>
	</div>
	<form method="post" enctype="multipart/form-data" action="">
		<div class="card-body">
			<div class="row">
				<div class="col-sm-2">
					<div id="fotosiswa" style="text-align:center;margin-bottom:10px">
						<img class="img img-responsive img-rounded" id="image-preview" src="assets/img/nouser.png" height="180px"/>
						<span id="fotosiswa_status"></span>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Nama Calon Peserta Didik</label>
						<div class="col-sm-6">
							<input class="form-control" name="nama" id="nama" value="<?php echo $nama;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">N I K</label>
						<div class="col-sm-6">
							<input class="form-control" name="nik" id="nik" value="<?php echo $nik;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">N I S N</label>
						<div class="col-sm-6">
							<input class="form-control" name="nisn" id="nisn" value="<?php echo $nisn;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
						<div class="col-sm-6">
							<input class="form-control" name="tmplahir" id="tmplahir" value="<?php echo $tmplhr;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
						<div class="col-sm-6">
							<input class="form-control" name="tgllahir" id="tgllahir" value="<?php echo $tgllhr;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Jenis Kelamin</label>
						<div class="col-sm-6">
							<?php 
							if($gender=="L"){$j="";$l="selected";$p="";} 
							else if($gender=="P") {$j=""; $l="";$p="selected";} 
							else {$j="";$l="";$p="";}
							 ?>
							<select class="form-control" name="gender" id="gender" disabled>
								<option value="" <?php echo $j;?>>..Pilih..</option>
								<option value="L" <?php echo $l;?>>Laki-laki</option>
								<option value="P" <?php echo $p;?>>Perempuan</option>
							</select>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Agama</label>
						<div class="col-sm-6">
							<select class="form-control" name="agama" id="agama" disabled>
								<?php
									switch ($agama) {
										case 'A': {$agm1="selected";$agm2="";$agm3="";$agm4="";$agm5="";$agm6=""; break;}
										case 'B': {$agm1="";$agm2="selected";$agm3="";$agm4="";$agm5="";$agm6="";break;}
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
								<option value="">..Pilih..</option>
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
				<div class="col-sm-5">
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Alamat</label>
						<div class="col-sm-6">
							<input class="form-control" name="almt" id="almt" value="<?php echo $alamat;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
						<div class="col-sm-6">		
							<input class="form-control" name="desa" id="desa" value="<?php echo $desa;?>" disabled>		
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Kecamatan</label>
						<div class="col-sm-6">		
							<input class="form-control" name="kec" id="kec" value="<?php echo $kec;?>" disabled>	
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Kabupaten/Kota</label>
						<div class="col-sm-6">
							<input class="form-control" name="kab" id="kab" value="<?php echo $kab;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Provinsi</label>
						<div class="col-sm-6">
							<input class="form-control" name="prov" id="prov" value="<?php echo $prov;?>" disabled>
						</div>
					</div>					
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Kode Pos</label>
						<div class="col-sm-6">
							<input class="form-control" name="kdpos" id="kdpos" value="<?php echo $kdpos;?>" disabled>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Nomor HP</label>
						<div class="col-sm-6">
							<input class="form-control" name="nohp" id="nohp" value="<?php echo $nohp;?>" disabled>
						</div>
					</div>
					
				</div> 
			</div>		
		</div>	
		<div class="card-footer justify-content-between">
			<a href="cetakbukti.php?id=<?php echo $idcalsis;?>&m=1" class="btn btn-md btn-default col-md-2 mb-3">
				<i class="fas fa-fw fa-save"></i> Cetak Bukti
			</a>
			<a href="index.php?p=home" class="btn btn-md btn-danger col-md-2 mb-3">
				<i class="fas fa-fw fa-power-off"></i> Tutup
			</a>
		</div>
	</form>
</div>