<?php
include "../config/konfigurasi.php";
$id=base64_decode($_REQUEST['id']);
$qortu=mysqli_query($sqlconn,"SELECT*FROM tb_ortu WHERE nopend='$id'");
$cek=mysqli_num_rows($qortu);
if($cek==0)
{
	$nama='';
	$nik='';
	$tmplahir='';
	$tgllahir='';
	$agama='';
	$pendidikan='';
	$kerja='';
	$hasil='';
	$hubkel='';
	$almt='';
	$desa='';
	$kec='';
	$kab='';
	$prov='';
	$kdpos='';
	$nohp='';
}
else
{
	$row=mysqli_fetch_array($qortu);
	$nama=$row['nmwali'];
	$nik=$row['nik'];
	$tmplahir=$row['tmplhr'];
	$tgllahir=$row['tgllhr'];
	$agama=$row['agama'];
	$pendidikan=$row['kdpdk'];
	$kerja=$row['kdkerja'];
	$hasil=$row['kdhasil'];
	$hubkel=$row['hubkel'];
	$almt=$row['alamat'];
	$desa=$row['desa'];
	$kec=$row['kec'];
	$kab=$row['kab'];
	$prov=$row['prov'];
	$kdpos=$row['kdpos'];
	$nohp=$row['nohp'];
}
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Data Orang Tua/Wali Calon Peserta Didik</h5>
	</div>
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nama Lengkap</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nama" id="txt_nama" value="<?php echo $nama;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I K</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nik" id="txt_nik" value="<?php echo $nik;?>" onkeyup="validAngka(this)"> 
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_tmplahir" id="txt_tmplahir" value="<?php echo $tmplahir;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_tgllahir" id="txt_tgllahir" value="<?php echo $tgllahir;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Agama</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_agama" id="txt_agama">
							<?php
							switch ($agama) {
								case 'A':{$agm0='';$agm1='selected';$agm2='';$agm3='';$agm4='';$agm5='';$agm6='';break;}
								case 'B':{$agm0='';$agm1='';$agm2='selected';$agm3='';$agm4='';$agm5='';$agm6='';break;}
								case 'C':{$agm0='';$agm1='';$agm2='';$agm3='selected';$agm4='';$agm5='';$agm6='';break;}
								case 'D':{$agm0='';$agm1='';$agm2='';$agm3='';$agm4='selected';$agm5='';$agm6='';break;}
								case 'E':{$agm0='';$agm1='';$agm2='';$agm3='';$agm4='';$agm5='selected';$agm6='';break;}
								case 'F':{$agm0='';$agm1='';$agm2='';$agm3='';$agm4='';$agm5='';$agm6='selected';break;}
								default:{$agm0='selected';$agm1='';$agm2='';$agm3='';$agm4='';$agm5='';$agm6='';break;}
							}
							?>
							<option value="" <?php echo $agm0;?>>..Pilih..</option>
							<option value="A" <?php echo $agm1;?>>Islam</option>
							<option value="B" <?php echo $agm2;?>>Kristen</option>
							<option value="C" <?php echo $agm3;?>>Katholik</option>
							<option value="D" <?php echo $agm4;?>>Hindu</option>
							<option value="E" <?php echo $agm5;?>>Buddha</option>
							<option value="F" <?php echo $agm6;?>>Konghucu</option>
						</select>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Hubungan Keluarga</label>
					<div class="col-sm-6">
					<select class="form-control form-control-sm" name="txt_hubkel" id="txt_hubkel">
						<?php
							switch ($hubkel) {
								case '1':{$h0='';$h1='selected';$h2='';$h3='';$h4='';$h5='';$h6='';$h7='';break;}
								case '2':{$h0='';$h1='';$h2='selected';$h3='';$h4='';$h5='';$h6='';$h7='';break;}
								case '3':{$h0='';$h1='';$h2='';$h3='selected';$h4='';$h5='';$h6='';$h7='';break;}
								case '4':{$h0='';$h1='';$h2='';$h3='';$h4='selected';$h5='';$h6='';$h7='';break;}
								case '5':{$h0='';$h1='';$h2='';$h3='';$h4='';$h5='selected';$h6='';$h7='';break;}
								case '6':{$h0='';$h1='';$h2='';$h3='';$h4='';$h5='';$h6='selected';$h7='';break;}
								case '7':{$h0='';$h1='';$h2='';$h3='';$h4='';$h5='';$h6='';$h7='selected';break;}
								default:{$h0='selected';$h1='';$h2='';$h3='';$h4='';$h5='';$h6='';$h7='';break;}
							}
						?>>
						<option value="" <?php echo $h0;?>>..Pilih..</option>
						<option value="1" <?php echo $h1;?>>Ayah Kandung</option>
						<option value="2" <?php echo $h2;?>>Ibu Kandung</option>
						<option value="3" <?php echo $h3;?>>Kakek</option>
						<option value="4" <?php echo $h4;?>>Nenek</option>
						<option value="5" <?php echo $h5;?>>Paman</option>
						<option value="6" <?php echo $h6;?>>Bibi</option>						
						<option value="7" <?php echo $h7;?>>Kakak Kandung</option>
					</select>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Pendidikan Terakhir</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_pendidikan" id="txt_pendidikan">
						<option value="">..Pilih..</option>
							<?php
								$qpdk=mysqli_query($sqlconn, "SELECT*FROM tb_pendidikan");
								while($pdk=mysqli_fetch_array($qpdk))
								{
									if($pdk['kdpdk']==$pendidikan){$spdk='selected';} else {$spdk='';}
							?>
							<option value="<?php echo $pdk['kdpdk'];?>" <?php echo $spdk;?>><?php echo $pdk['pendidikan'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Pekerjaan</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_kerja" id="txt_kerja">
							<option value="">..Pilih..</option>
							<?php
								$qkrj=mysqli_query($sqlconn, "SELECT*FROM tb_kerja");
								while($krj=mysqli_fetch_array($qkrj))
								{
									if($krj['kdkerja']==$kerja){$skrj='selected';} else {$skrj='';}
							?>
							<option value="<?php echo $krj['kdkerja'];?>" <?php echo $skrj;?>><?php echo $krj['nmkerja'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Penghasilan Per Bulan</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="txt_hasil" id="txt_hasil">
							<option value="">..Pilih..</option>
							<?php
								$qhsl=mysqli_query($sqlconn, "SELECT*FROM tb_hasil");
								while($hsl=mysqli_fetch_array($qhsl))
								{
									if($hsl['kdhasil']==$hasil){$shsl='selected';} else {$shsl='';}
							?>
							<option value="<?php echo $hsl['kdhasil'];?>" <?php echo $shsl;?>><?php echo $hsl['penghasilan'];?></option>
							<?php } ?>
						</select>
					</div>
				</div>				
			</div>
			<div class="col-sm-6">
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Alamat</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_almt" id="txt_almt" value="<?php echo $almt;?>">
					</div>
				</div>				
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="txt_desa" id="txt_desa" value="<?php echo $desa;?>">		
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kecamatan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="txt_kec" id="txt_kec" value="<?php echo $kec;?>">	
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kabupaten</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_kab" id="txt_kab" value="<?php echo $kab;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Provinsi</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_prov" id="txt_prov" value="<?php echo $prov;?>">
					</div>
				</div>					
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kode Pos</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_kdpos" id="txt_kdpos" value="<?php echo $kdpos;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nomor HP</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="txt_nohp" id="txt_nohp" value="<?php echo $nohp;?>">
					</div>
				</div>
			</div> 
		</div>
	</div>
	<div class="card-footer justify-content-between">
		<div class="row">
			<div class="col-sm-3 offset-sm-2">
				<a href="?p=addsiswa&m=3&id=<?php echo base64_encode($id);?>" class="btn btn-secondary btn-md btn-flat btn-block mb-2">
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
				<a href="?p=addnilai&m=1&id=<?php echo base64_encode($id);?>" class="btn btn-success btn-md btn-flat btn-block mb-2">
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
			a.value=a.value.substring(0,a.value.length-1000);
		}
	}
</script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#txt_thpel").change(function(){
			var txt_kdthpel=$("#txt_thpel").val();
			$.ajax({
				url: "config/get_nomor.php",
				data: "txt_kdthpel="+kdthpel,
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
		$(function() {
			const Toast=Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});
			$("#simpan").click(function(){
				var id="<?php echo $_REQUEST['id'];?>";
				var nama=$("#txt_nama").val();
				var nik =$("#txt_nik").val();
				var tmplahir=$("#txt_tmplahir").val();
				var tgllahir=$("#txt_tgllahir").val();
				var agama=$("#txt_agama").val();
				var pendidikan =$("#txt_pendidikan").val();
				var kerja=$("#txt_kerja").val();
				var hasil=$("#txt_hasil").val();
				var hubkel=$("#txt_hubkel").val();
				var almt=$("#txt_almt").val();
				var desa=$("#txt_desa").val()
				var kec=$("#txt_kec").val();
				var kab	=$("#txt_kab").val();
				var prov=$("#txt_prov").val();
				var kdpos=$("#txt_kdpos").val();
				var nohp=$("#txt_nohp").val();
				if(nama=="" || nama==null){
					toastr.error('Nama Orang Tua/Wali Wajib Diisi!');
					$("#txt_nama").focus();
				}
				// else if(nik=="" || nik==null){
				// 	toastr.error('Nomor Induk Kependudukan Wajib Diisi!');
				// 	$("#txt_nik").focus();
				// }
				// else if(tmplahir=="" || tmplahir==null){
				// 	toastr.error('Tempat Lahir Tidak Boleh Kosong');
				// 	$("#txt_tmplahir").focus();
				// }
				else {
					$.ajax({
						type:"POST",
						url:"calsis_simpan.php",
						data: "aksi=2&id="+id+"&nama="+nama+"&nik="+nik+"&tmplahir="+tmplahir+"&tgllahir="+tgllahir + "&agama="+agama + "&pendidikan="+pendidikan+"&kerja="+kerja+"&kerja="+kerja+"&hasil="+hasil+"&hubkel="+hubkel+"&almt="+almt+"&desa="+desa + "&kec="+kec +"&kab="+kab + "&prov=" + prov +"&kdpos="+kdpos + "&nohp="+nohp,
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