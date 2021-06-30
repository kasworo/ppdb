<?php
if(isset($_REQUEST['m'])) {
	if($_REQUEST['m']=='1') {
		require_once('calsis_getid.php');
		$nopend=getNopend();
		$qcs=mysqli_query($sqlconn,"INSERT INTO tb_calsis (kdthpel, nopend,mode, deleted, petugas) VALUES('$_COOKIE[c_tahun]','$nopend','1','0','$_COOKIE[c_user]')");
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
		$id=base64_decode($_REQUEST['id']);
		$qcs=mysqli_query($sqlconn,"SELECT*FROM tb_calsis WHERE nopend='$id'");
		$cs=mysqli_fetch_array($qcs);
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
?>
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
						<input class="form-control form-control-sm" name="txt_nopend" id="txt_nopend" value="<?php echo $nopend;?>" disabled>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I K</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nik" id="txt_nik" value="<?php echo $nik;?>" onkeyup="validAngka(this)" placeholder="N I K Sesuai KK"> 
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I S N</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nisn" id="txt_nisn" value="<?php echo $nisn;?>" onkeyup="validAngka(this)" placeholder="Nomor Induk Siswa Nasional Yang Valid">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nama Calon Peserta Didik</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_calsis" id="txt_calsis" value="<?php echo $nama;?>" placeholder="Nama Lengkap Calon Peserta Didik">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_tmplahir" id="txt_tmplahir" value="<?php echo $tmplhr;?>" placeholder="Tempat Lahir Sesuai Akte">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_tgllahir" id="txt_tgllahir" value="<?php echo $tgllhr;?>" placeholder="Tanggal Lahir Sesuai Akte">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Jenis Kelamin</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_gender" id="txt_gender">
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
						<select class="form-control form-control-sm" name="txt_agama" id="txt_agama">
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
						<input class="form-control form-control-sm" name="txt_almt" id="txt_almt" value="<?php echo $alamat;?>" placeholder="Alamat Sesuai KK">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="txt_desa" id="txt_desa" value="<?php echo $desa;?>" placeholder="Desa/Kelurahan Sesuai KK">		
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kecamatan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="txt_kec" id="txt_kec" value="<?php echo $kec;?>" placeholder="Kecamatan Sesuai KK">	
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kabupaten</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_kab" id="txt_kab" value="<?php echo $kab;?>" placeholder="Kabupaten Sesuai KK">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Provinsi</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_prov" id="txt_prov" value="<?php echo $prov;?>" placeholder="Provinsi Sesuai KK">
					</div>
				</div>					
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kode Pos</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_kdpos" id="txt_kdpos" value="<?php echo $kdpos;?>" placeholder="Kode Pos Sesuai KK">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nomor HP</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nohp" id="txt_nohp" value="<?php echo $nohp;?>" placeholder="Nomor Telepon Seluler Yang Aktif">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Sekolah Asal</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_skul" id="txt_skul">
							<option value=''>..Pilih Sekolah Asal..</option>
							<?php 
								$sqlsek = mysqli_query($sqlconn,"SELECT*FROM tb_skul_asal");
								while($sek = mysqli_fetch_array($sqlsek)){
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
				<a href="?p=datacalsis" class="btn btn-secondary btn-md btn-flat btn-block mb-2">
					<i class="fas fa-reply"></i>
					<span>&nbsp;Kembali</span>
				</a>
			</div>
			<div class="col-sm-3">
				<button class="btn btn-primary btn-md btn-flat btn-block mb-2" id="simpan">
					<i class="fas fa-fw fa-save"></i>
					<span>&nbsp;Simpan</span>
				</button> 
			</div>
			<div class="col-sm-3">		   
				<a href="?p=addortu&id=<?php echo base64_encode($nopend);?>" class="btn btn-success btn-md btn-flat btn-block mb-2">
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
				var almt = $("#txt_almt").val();
				var desa = $("#txt_desa").val()
				var kec = $("#txt_kec").val();
				var kab	= $("#txt_kab").val();
				var prov = $("#txt_prov").val();
				var kdpos = $("#txt_kdpos").val();
				var nohp = $("#txt_nohp").val();
				var aslskul = $("#txt_skul").val();
				// if(nik=="" || nik==null){
				// 	toastr.error('Nomor Induk Kependudukan Wajib Diisi!');
				// 	$("#txt_nik").focus();
				// }
				// else 
				if(nisn=="" || nisn==null){
					toastr.error('Nomor Induk Siswa Nasional Wajib Diisi!');
					$("#txt_nisn").focus();
				}
				else if(nisn.length!=10){
					toastr.error('Nomor Induk Siswa Nasional Harus 10 digit!');
					$("#txt_nisn").focus();
				}
				else if(calsis=="" || calsis==null){
					toastr.error('Nama Calon Peserta Didik Wajib Diisi!');
					$("#txt_calsis").focus();
				}
				else {
					$.ajax({
						type:"POST",
						url:"calsis_simpan.php",
						data: "aksi=1&id="+btoa(nopend)+"&calsis="+calsis+"&nik="+nik+"&nisn="+nisn +"&tmplahir="+tmplahir+"&tgllahir="+tgllahir + "&agama="+agama + "&gender="+gender+"&almt="+almt+"&desa="+desa + "&kec="+kec +"&kab="+kab + "&prov=" + prov +"&kdpos="+kdpos + "&nohp="+nohp+"&npsn="+aslskul,
						success:function(data)
						{
							toastr.success(data);
						}	
					})
					window.location.href="index.php?p=addortu&id="+btoa(nopend);
				}
			})
		})
	})
</script>