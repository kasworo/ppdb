<?php
$qcs=mysqli_query($conn,"SELECT*FROM tb_calsis WHERE nopend='$_SESSION[s_user]'");
$cs=mysqli_fetch_array($qcs);
?>
<div class="alert alert-warning">
	<p><strong>Petunjuk</strong><br/>Silahkan cek kembali data anda, lengkapi dan betulkan jika masih terdapat data yang masih kurang atau salah, kemudian klik tombol <strong>Update</strong></p>
</div>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Data Calon Peserta Didik</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nomor Pendaftaran</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nopend" id="txt_nopend" value="<?php echo $cs['nopend'];?>" disabled>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I K</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nik" id="txt_nik" value="<?php echo $cs['nik'];?>" onkeyup="validAngka(this)"> 
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I S N</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nisn" id="txt_nisn" value="<?php echo $cs['nisn'];?>" onkeyup="validAngka(this)">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nama Calon Peserta Didik</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_calsis" id="txt_calsis" value="<?php echo $cs['nama'];?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_tmplahir" id="txt_tmplahir" value="<?php echo $cs['tmplhr'];?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_tgllahir" id="txt_tgllahir" value="<?php echo $cs['tgllhr'];?>">
					</div>
				</div>				
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Jenis Kelamin</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_gender" id="txt_gender">
							<?php
							if($cs['gender']=="L"){$jk0="";$jk1="selected";$jk2="";}
							else if($cs['gender']=="P"){$jk0="";$jk1="";$jk2="selected";}
							else {$jk0="selected";$jk1="";$jk2="";}
							?>
							<option value="" <?php echo $jk0;?>>..Pilih..</option>
							<option value="L" <?php echo $jk1;?>>Laki-laki</option>
							<option value="P" <?php echo $jk2;?>>Perempuan</option>
						</select>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Agama</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_agama" id="txt_agama">
							<?php
								switch ($cs['agama']) {
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
			<div class="col-sm-6">
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Alamat</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_almt" id="txt_almt" value="<?php echo $cs['alamat'];?>">
					</div>
				</div>				
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="txt_desa" id="txt_desa" value="<?php echo $cs['desa'];?>">		
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kecamatan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="txt_kec" id="txt_kec" value="<?php echo $cs['kec'];?>">	
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kabupaten</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_kab" id="txt_kab" value="<?php echo $cs['kab'];?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Provinsi</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_prov" id="txt_prov" value="<?php echo $cs['prov'];?>">
					</div>
				</div>					
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kode Pos</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_kdpos" id="txt_kdpos" value="<?php echo $cs['kdpos'];?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nomor HP</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nohp" id="txt_nohp" value="<?php echo $cs['nohp'];?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Sekolah Asal</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_skul" id="txt_skul">
							<option value=''>..Pilih..</option>
							<?php 
								$sqlsek = mysqli_query($sqlconn,"SELECT*FROM tb_skul_asal");
								while($sek = mysqli_fetch_array($sqlsek)){
								if($cs['idskulasal']==$sek['idskulasal']){$sekul='selected';} else {$sekul='';}
							?>
								<option value="<?php echo $sek['idskulasal'];?>" <?php echo $sekul;?>><?php echo $sek['nmskulasal'];?></option>
							   <?php }	?>
						</select>
					</div>
				</div>
			</div> 
		</div>
	</div>
	<div class="card-footer">
		<div class="row" align="center">
			<div class="col-sm-4 col-md-4 col-lg-4" style="padding-bottom:5px">
				<button class="btn btn-primary btn-lg btn-flat btn-block col-8" id="simpan">
					<i class="fas fa-fw fa-save"></i>
					<span>&nbsp;Simpan</span>
				</button>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4" style="padding-bottom:5px">
				<a href="?p=dataortu" class="btn btn-lg btn-success btn-flat btn-block col-8">
					<i class="fas fa-fw fa-arrow-right"></i>
					<span>&nbsp;Berikutnya</span>
				</a>
			</div>
		</div>
	</div>
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