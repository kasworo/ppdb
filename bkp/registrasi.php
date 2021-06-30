<?php
//session_start();
include "config/konfigurasi.php";
if(isset($_SESSION['n_user'])&& $_REQUEST['m']=='2')
{
	$print='<a href="bukticetak.php?m=0" target="_blank" class="btn btn-lg btn-secondary btn-flat btn-block col-8">
	<i class="fas fa-fw fa-print"></i> Cetak Bukti
</a>';
	$dis='disabled';
	$qsiswa=mysqli_query($sqlconn,"SELECT*FROM tb_calsis WHERE nopend='$_SESSION[n_user]'");
	$cek=mysqli_num_rows($qsiswa);
	if($cek>0)
	{
		$cs=mysqli_fetch_array($qsiswa);
		$print='<a href="bukticetak.php?m=0" target="_blank" class="btn btn-lg btn-secondary btn-flat btn-block col-8">
		<i class="fas fa-fw fa-print"></i> Cetak Bukti </a>';
		$dis='disabled';
		$kdthpel=$cs['kdthpel'];
		$nopend=$cs['nopend'];
		$nama=$cs['nama'];
		$nik=$cs['nik'];
		$nisn=$cs['nisn'];
		$tmplhr=$cs['tmplhr'];
		$tgllhr=$cs['tgllhr'];
		$gender=$cs['gender'];
		$agama=$cs['agama'];
		$almt=$cs['alamat'];
		$desa=$cs['desa'];
		$kec=$cs['kec'];
		$kab=$cs['kab'];
		$prov=$cs['prov'];
		$kdpos=$cs['kdpos'];
		$nohp=$cs['nohp'];
		$foto=$cs['foto'];
	}
	else {
		$print='<button class="btn btn-lg btn-secondary btn-flat btn-block col-8" disabled>
			<i class="fas fa-fw fa-print"></i> Cetak Bukti
		</button>';
		$dis='';
		$kdthpel='';
		$nopend='';
		$nama='';
		$nik='';
		$nisn='';
		$tmplhr='';
		$tgllhr='';
		$gender='';
		$agama='';
		$almt='';
		$desa='';
		$kec='';
		$kab='';
		$prov='';
		$kdpos='';
		$nohp='';
		$foto='';
	}
	
}
else {
	$print='<button class="btn btn-lg btn-secondary btn-flat btn-block col-8" disabled>
	<i class="fas fa-fw fa-print"></i> Cetak Bukti
</button>';
	$dis='';
	$kdthpel='';
	$nopend='';
	$nama='';
	$nik='';
	$nisn='';
	$tmplhr='';
	$tgllhr='';
	$gender='';
	$agama='';
	$almt='';
	$desa='';
	$kec='';
	$kab='';
	$prov='';
	$kdpos='';
	$nohp='';
	$foto='';
}
?>
<script type="text/javascript">
	$(document).ready(function () {
	bsCustomFileInput.init();
	});
	function previewImage() {
		document.getElementById("image-preview").style.display = "block";
		var oFReader = new FileReader();
		oFReader.readAsDataURL(document.getElementById("txt_foto").files[0]);

		oFReader.onload = function(oFREvent) {
		document.getElementById("image-preview").src = oFREvent.target.result;
		};
	};
</script>
<?php if(!empty($_REQUEST['data'])&&$_REQUEST['data']=='1'){include "registrasisimpan.php";}?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Pendaftaran Calon Peserta Didik</h5>
	</div>
	<div class="card-body">
		<form id="frmRegistrasi" method="post" enctype="multipart/form-data" action="">
			<div class="row">
				<div class="col-sm-2">
					<div id="fotosiswa" style="text-align:center;margin-bottom:10px">
						<img class="img img-responsive img-rounded" id="image-preview" src="assets/img/nouser.png" height="180px"/>
						<span id="fotosiswa_status"></span>
					</div>
				</div>
				<div class="col-sm-5">
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Tahun Pelajaran</label>
						<div class="col-sm-6">
							<select class="form-control" name="txt_thpel" id="txt_thpel" <?php echo $dis;?>>
								<option value="">..Pilih..</option>
								<?php
									$sql0=mysqli_query($sqlconn, "SELECT*FROM tb_thpel WHERE aktif='Y'");
									while ($r=mysqli_fetch_array($sql0))
									{ 
										if($r['kdthpel']==$kdthpel){$th='selected';} else {$th='';}
								?>
									<option value="<?php echo $r['kdthpel'];?>" <?php echo $th;?> ><?php echo $r['nmthpel'];?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Nomor Pendaftaran</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_nopend" id="txt_nopend" value="<?php echo $nopend;?>" disabled placeholder="Nomor Pendaftaran">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Nama Calon Peserta Didik</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_calsis" id="txt_calsis" value="<?php echo $nama;?>" <?php echo $dis;?> placeholder="Nama Calon Peserta Didik">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">N I K</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_nik" id="txt_nik" onkeyup="validAngka(this)" value="<?php echo $nik;?>" <?php echo $dis;?> placeholder="Nomor Induk Kependudukan (16 Digit)">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">N I S N</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_nisn" id="txt_nisn" onkeyup="validAngka(this)" value="<?php echo $nisn;?>" <?php echo $dis;?> placeholder="NISN yang terdaftar di dapodik (10 Digit)">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
						<div class="col-sm-6">
							<input class="form-control" name="txt_tmplahir" id="txt_tmplahir" value="<?php echo $tmplhr;?>" <?php echo $dis;?> placeholder="Tempat Lahir Sesuai dengan Akte">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_tgllahir" id="txt_tgllahir" value="<?php echo $tgllhr;?>" <?php echo $dis;?> placeholder="Tanggal Lahir (yyyy-mm-dd)">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Jenis Kelamin</label>
						<div class="col-sm-6">
							<select class="form-control" name="txt_gender" id="txt_gender" <?php echo $dis;?>>
								<?php 
								if($gender=='L'){
									$jk0='';$jk1='selected';$jk2='';
								} else if($gender=='P'){
									$jk0='';$jk1='';$jk1='selected';
								}
								else{
									$jk0='';$jk1='';$jk2='';
								}
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
							<select class="form-control" name="txt_agama" id="txt_agama" <?php echo $dis;?>>
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
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Alamat</label>
						<div class="col-sm-6">
							<textarea class="form-control" rows="3" name="txt_almt" id="txt_almt" <?php echo $dis;?> placeholder="Alamat (Contoh: Jalan Pangeran Diponegoro)"><?php echo $almt;?></textarea>
						</div>
					</div>				
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
						<div class="col-sm-6">		
							<input class="form-control" name="txt_desa" id="txt_desa" value="<?php echo $desa;?>" <?php echo $dis;?> placeholder="Desa / Kelurahan">		
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Kecamatan</label>
						<div class="col-sm-6">		
							<input class="form-control" name="txt_kec" id="txt_kec" value="<?php echo $kec;?>" <?php echo $dis;?> placeholder="Kecamatan">	
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Kabupaten/Kota</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_kab" id="txt_kab" value="<?php echo $kab;?>" <?php echo $dis;?> placeholder="Kabupaten/Kota">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Provinsi</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_prov" id="txt_prov" value="<?php echo $prov;?>" <?php echo $dis;?> placeholder="Provinsi">
						</div>
					</div>					
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Kode Pos</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_kdpos" id="txt_kdpos" value="<?php echo $kdpos;?>" <?php echo $dis;?> placeholder="Kode Pos">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Nomor HP</label>
						<div class="col-sm-6">
							<input class="form-control" name="txt_nohp" id="txt_nohp" value="<?php echo $nohp;?>" <?php echo $dis;?> placeholder="Nomor HP yang masih aktif">
						</div>
					</div>
					<div class="row" style="padding-bottom:5px">
						<label class="offset-sm-1 col-sm-5">Foto</label>
						<div class="col-sm-6">
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="txt_foto" onchange="previewImage();">
								<label class="custom-file-label" for="txt_foto">Pilih File</label>
							</div>
						</div>
					</div>
				</div> 
			</div>
		</form>
	</div>
	
	<div class="card-footer">
		<div class="row" align="center">
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<button class="btn btn-lg btn-primary btn-flat btn-block col-8" id="simpan">
					<i class="fas fa-fw fa-save"></i> Simpan
				</button>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<?php echo $print;?>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="?p=home" class="btn btn-lg btn-danger btn-flat btn-block col-8">
					<i class="fas fa-fw fa-power-off"></i> Tutup
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
			toastr.error('Khusus Angka 1-9 Saja Bro!!');
		}
	}
	$(document).ready(function(){
		$("#txt_thpel").change(function(){
			var txt_kdthpel = $("#txt_thpel").val();
			$.ajax({
				url: "config/get_nomor.php",
				data: "txt_kdthpel="+txt_kdthpel,
				cache: false,
				success: function(msg){
				 $("#txt_nopend").val(msg);
				}
			});
		});
		$('#txt_tgllahir').datetimepicker({
			timepicker:false,
			format: 'Y-m-d'
		});
		
// 		$("#simpan").click(function(){
// 			var calsis =new FormData();
// 			var files = $('#txt_foto')[0].files[0];
// 			calsis.append('file',files);
			
// 			 $.ajax({
//                 url:'registrasisimpan.php',
//                 type:'post',
//                 data:calsis,
//                 contentType: false,
//                 processData: false,
//                 success:function(msg)
// 				{
// 					window.location.href='?p=registrasi&m=2';
// 					toastr.success(msg);
// 				}
// 			 })
// 		})
		
// 		$("#bntsimpan").click(function(){
// 			var txt_thpel = $("#txt_thpel").val();
// 			var txt_nopend=$("#txt_nopend").val();
// 			var txt_calsis = $("#txt_calsis").val();
// 			var txt_nik = $("#txt_nik").val();
// 			var txt_nisn = $("#txt_nisn").val();
// 			var txt_tmplahir = $("#txt_tmplahir").val();
// 			var txt_tgllahir = $("#txt_tgllahir").val();
// 			var txt_agama = $("#txt_agama").val();
// 			var txt_gender = $("#txt_gender").val();
// 			var txt_wali = $("#txt_wali").val();
// 			var txt_kerjawali = $("#txt_kerja").val();
// 			var txt_hubwali = $("#txt_hubwali").val();
// 			var txt_almt = $("#txt_almt").val();
// 			var txt_desa = $("#txt_desa").val()
// 			var txt_kec = $("#txt_kec").val();
// 			var txt_kab	= $("#txt_kab").val();
// 			var txt_prov = $("#txt_prov").val();
// 			var txt_kdpos = $("#txt_kdpos").val();
// 			var txt_nohp = $("#txt_nohp").val();
// 			var fileupload = $('#txt_foto').prop('files')[0];
			
// 			if(txt_thpel=="" || txt_thpel==null){
// 				toastr.error('Pilih Tahun Pelajaran Dulu!');
// 				$("#txt_thpel").focus();
// 			}
// 			else if(txt_calsis=="" || txt_calsis==null){
// 				toastr.error('Nama Calon Peserta Didik Tidak Boleh Kosong!');
// 				$("#txt_calsis").focus();
// 			}
// 			else if(txt_nik=="" || txt_nik==null){
// 				toastr.error('Nomor Induk Kependudukan Tidak Boleh Kosong!');
// 				$("#txt_nik").focus();
// 			}
// 			else if(txt_nik.length!==16){
// 				toastr.error('NIK Harus 16 Digit');
// 				$("#txt_nik").focus();
// 			}
// 			else if(txt_nisn=="" || txt_nisn==null){
// 				toastr.error('NISN Tidak Boleh Kosong!');
// 				$("#txt_nis").focus();
// 			}
// 			else if(txt_nisn.length!==10){
// 				toastr.error('NISN Harus 10 Digit');
// 				$("#txt_nisn").focus();
// 			}
// 			else if(txt_tmplahir=="" || txt_tmplahir==null){
// 				toastr.error('Tempat Lahir Tidak Boleh Kosong!');
// 				$("#txt_tmplahir").focus();
// 			}
// 			else if(txt_tgllahir=="" || txt_tgllahir==null){
// 				toastr.error('Tempat Lahir Tidak Boleh Kosong!');
// 				$("#txt_tmplahir").focus();
// 			}
// 			else {
// 				$.ajax({
// 					type:"POST",
// 					url:"registrasisimpan.php",
// 					data: "txt_thpel="+txt_thpel+"&txt_nopend="+txt_nopend+"&txt_calsis="+txt_calsis+"&txt_nik="+txt_nik+"&txt_nisn="+txt_nisn +"&txt_tmplahir="+txt_tmplahir+"&txt_tgllahir="+txt_tgllahir + "&txt_agama="+txt_agama + "&txt_gender="+txt_gender+"&txt_wali="+txt_wali+"&txt_kerjawali="+txt_kerjawali+"&txt_hubwali="+txt_hubwali+"&txt_almt="+txt_almt+"&txt_desa="+txt_desa + "&txt_kec="+txt_kec +"&txt_kab="+txt_kab + "&txt_prov=" + txt_prov +"&txt_kdpos="+txt_kdpos + "&txt_nohp="+txt_nohp+"&foto="+fileupload,
// 					success:function(data)
// 					{
// 						window.location.href='?p=registrasi&m=2';
// 						toastr.success(data);
// 					}	
// 				})
// 			}
// 		})
	})
</script>