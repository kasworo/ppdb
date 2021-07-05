<?php
	if($_GET['m']=='2'){
		$id=base64_decode($_GET['id']);
		$row=viewdata("v_calsis", "idcalsis", $id)[0];
	}
?>
<div class="alert alert-warning">
	<p><strong>Petunjuk</strong><br/></strong></p>
</div>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Data Calon Peserta Didik</h5>
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
							<input class="form-control" name="nama" id="nama" value="<?php echo $row['nama'];?>">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">N I K</label>
						<div class="col-sm-6">
							<input class="form-control" name="nik" id="nik" onkeyup="validAngka(this)" value="<?php echo $row['nik'];?>">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">N I S N</label>
						<div class="col-sm-6">
							<input class="form-control" name="nisn" id="nisn" onkeyup="validAngka(this)" value="<?php echo $row['nisn'];?>">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
						<div class="col-sm-6">
							<input class="form-control" name="tmplahir" id="tmplahir" value="<?php echo $row['tmplhr'];?>">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
						<div class="col-sm-6">
							<input class="form-control" name="tgllahir" id="tgllahir" value="<?php echo $row['tgllhr'];?>">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Jenis Kelamin</label>
						<div class="col-sm-6">
							<?php 
								if($row['gender']=='L') {
									$lk="selected";
									$pr="";
								}
								else if($row['gender']=='P'){
									$lk="";
									$pr="selected";
								}
								else{
									$lk="";
									$pr="";
								}
							?>
							<select class="form-control" name="gender" id="gender">
								<option value="">..Pilih..</option>
								<option value="L" <?php echo $lk;?>>Laki-laki</option>
								<option value="P" <?php echo $pr;?>>Perempuan</option>
							</select>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Agama</label>
						<div class="col-sm-6">
							<select class="form-control" name="agama" id="agama">
							<?php
							switch ($row['agama']) {
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
							</select>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Nama Orang Tua/Wali</label>
						<div class="col-sm-6">
							<input class="form-control" name="nmortu" id="nmortu" placeholder="Nama Lengkap Orang Tua/Wali">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Pekerjaan Orang Tua/Wali</label>
						<div class="col-sm-6">
							<select class="form-control" name="krjortu" id="krjortu">
								<option value="">..Pilih..</option>
								<?php 
									$qkr=viewdata("tb_kerja");
									foreach ($qkr as $kr):
								?>
								<option value="<?php echo $kr['kdkerja'];?>"><?php echo $kr['nmkerja'];?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Alamat</label>
						<div class="col-sm-6">
							<input class="form-control" name="almt" id="almt" placeholder="Alamat (Contoh: Jalan Pangeran Diponegoro)">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
						<div class="col-sm-6">		
							<input class="form-control" name="desa" id="desa" placeholder="Desa / Kelurahan">		
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Kecamatan</label>
						<div class="col-sm-6">		
							<input class="form-control" name="kec" id="kec" placeholder="Kecamatan">	
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Kabupaten/Kota</label>
						<div class="col-sm-6">
							<input class="form-control" name="kab" id="kab" placeholder="Kabupaten/Kota">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Provinsi</label>
						<div class="col-sm-6">
							<input class="form-control" name="prov" id="prov" placeholder="Provinsi">
						</div>
					</div>					
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Kode Pos</label>
						<div class="col-sm-6">
							<input class="form-control" name="kdpos" id="kdpos" placeholder="Kode Pos">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Nomor HP</label>
						<div class="col-sm-6">
							<input class="form-control" name="nohp" id="nohp" placeholder="Nomor HP yang masih aktif">
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Asal SD/MI</label>
						<div class="col-sm-6">
							<select class="form-control" name="aslsd" id="aslsd">
								<option value="">..Pilih..</option>
								<?php 
									$qsd=viewdata("tb_skul_asal");
									foreach ($qsd as $sd):
								?>
								<option value="<?php echo $sd['idskulasal'];?>"><?php echo $sd['nmskulasal'];?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<div class="row mb-2">
						<label class="offset-sm-1 col-sm-5">Foto</label>
						<div class="col-sm-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="foto" name="foto">
								<label class="custom-file-label" for="foto">Browse</label>
							</div>
						</div>
					</div>
				</div> 
			</div>		
		</div>	
		<div class="card-footer justify-content-between">
			<button class="btn btn-md btn-primary col-md-2 mb-3" id="simpan" name="simpan">
				<i class="fas fa-fw fa-save"></i> Simpan
			</button>
			<a href="?p=home" class="btn btn-md btn-danger col-md-2 mb-3">
				<i class="fas fa-fw fa-power-off"></i> Tutup
			</a>
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
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$('#txt_tgllahir').datetimepicker({
			timepicker:false,
			format: 'Y-m-d'
		});
		$(function() {
			const Toast = Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});
			$("#simpan").click(function(){
				var nopend=$("#txt_nopend").val();
				var calsis = $("#txt_calsis").val();
				var nik = $("#txt_nik").val();
				var nisn = $("#txt_nisn").val();
				var tmplahir = $("#txt_tmplahir").val();
				var tgllahir = $("#txt_tgllahir").val();
				var agama = $("#txt_agama").val();
				var gender = $("#txt_gender").val();
				var wali = $("#txt_wali").val();
				var kerjawali = $("#txt_kerja").val();
				var hubwali = $("#txt_hubwali").val();
				var almt = $("#txt_almt").val();
				var desa = $("#txt_desa").val()
				var kec = $("#txt_kec").val();
				var kab	= $("#txt_kab").val();
				var prov = $("#txt_prov").val();
				var kdpos = $("#txt_kdpos").val();
				var nohp = $("#txt_nohp").val();
				var aslskul = $("#txt_skul").val();
				if(calsis=="" || calsis==null){
					toastr.error('Nama Calon Peserta Didik Wajib Diisi!');
					$("#txt_calsis").focus();
				}
				else if(nik=="" || nik==null){
					toastr.error('Nomor Induk Kependudukan Wajib Diisi!');
					$("#txt_nik").focus();
				}
				else {
					$.ajax({
						type:"POST",
						url:"simpansiswa.php",
						data: "aksi=update&nopend="+nopend+"&calsis="+calsis+"&nik="+nik+"&nisn="+nisn +"&tmplahir="+tmplahir+"&tgllahir="+tgllahir + "&agama="+agama + "&gender="+gender+"&almt="+almt+"&desa="+desa + "&kec="+kec +"&kab="+kab + "&prov=" + prov +"&kdpos="+kdpos + "&nohp="+nohp+"&aslskul="+aslskul,
						success:function(data)
						{
							toastr.success(data);
						}	
					})
				}
			})
		})
	})
</script>