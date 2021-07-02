<?php
	$id=base64_decode($_GET['id']);
	$cek=cekdata('tb_ortu','idcalsis',$id);
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
		$row=viewdata('tb_ortu', 'idcalsis',$id)[0];
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

	if(isset($_POST['simpan'])){
		$cek=cekdata("tb_ortu","idcalsis",$id);
		if($cek==0){
			$data=array(
				'idcalsis'=>$id,
				'nmwali'=>$_POST['nama'],
				'nik' => $_POST['nik'],
				'tmplhr' => $_POST['tmplahir'], 
				'agama' => $_POST['agama'], 
				'hubkel' => $_POST['hubkel'], 
				'kdpdk' => $_POST['pendidikan'],
				'kdkerja'=>$_POST['kerja'],
				'kdhasil'=>$_POST['hasil'], 
				'alamat' => $_POST['almt'], 
				'desa' => $_POST['desa'], 
				'kec' => $_POST['kec'], 
				'kab' => $_POST['kab'], 
				'prov' => $_POST['prov'], 
				'kdpos' => $_POST['kdpos'], 
				'nohp' => $_POST['nohp']
			);
			$rows=adddata("tb_ortu",$data);
			if($rows>0){
				echo "<script>alert('Tambah Data Berhasil');
					window.location.href='index.php?p=addortu&id=$_GET[id]';
				</script>";
				exit;
			}
		}
		else {
			$data=array(
				'nmwali'=>$_POST['nama'],
				'nik' => $_POST['nik'],
				'tmplhr' => $_POST['tmplahir'], 
				'tgllhr' => $_POST['tgllahir'], 
				'agama' => $_POST['agama'], 
				'hubkel' => $_POST['hubkel'], 
				'kdpdk' => $_POST['pendidikan'],
				'kdkerja'=>$_POST['kerja'],
				'kdhasil'=>$_POST['hasil'], 
				'alamat' => $_POST['almt'], 
				'desa' => $_POST['desa'], 
				'kec' => $_POST['kec'], 
				'kab' => $_POST['kab'], 
				'prov' => $_POST['prov'], 
				'kdpos' => $_POST['kdpos'], 
				'nohp' => $_POST['nohp']
			);
			$rows=editdata("tb_ortu", $data,"idcalsis", $id);
			if($rows>0){
				echo "<script>alert('Update Data Berhasil');
					window.location.href='index.php?p=addortu&id=$_GET[id]';
				</script>";
				exit;
			}
		}		
	}
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Data Orang Tua/Wali Calon Peserta Didik</h5>
	</div>
	<form action="" method="post">
	<div class="card-body">
		<div class="row">
			<div class="col-sm-6">
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nama Lengkap</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="nama" id="nama" value="<?php echo $nama;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">N I K</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="nik" id="nik" value="<?php echo $nik;?>" onkeyup="validAngka(this)"> 
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tempat Lahir</label>			
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="tmplahir" id="tmplahir" value="<?php echo $tmplahir;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Tanggal Lahir</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="tgllahir" id="tgllahir" value="<?php echo $tgllahir;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Agama</label>
					<div class="col-sm-6">
						<select class="form-control form-control-sm" name="agama" id="agama">
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
					<select class="form-control form-control-sm" name="hubkel" id="hubkel">
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
						<select class="form-control form-control-sm" name="pendidikan" id="pendidikan">
						<option value="">..Pilih..</option>
							<?php
								$qpdk=mysqli_query($conn, "SELECT*FROM tb_pendidikan");
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
						<select class="form-control form-control-sm" name="kerja" id="kerja">
							<option value="">..Pilih..</option>
							<?php
								$qkrj=mysqli_query($conn, "SELECT*FROM tb_kerja");
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
						<select class="form-control form-control-sm" name="hasil" id="hasil">
							<option value="">..Pilih..</option>
							<?php
								$qhsl=mysqli_query($conn, "SELECT*FROM tb_hasil");
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
						<input class="form-control form-control-sm" name="almt" id="almt" value="<?php echo $almt;?>">
					</div>
				</div>				
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Desa / Kelurahan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="desa" id="desa" value="<?php echo $desa;?>">		
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kecamatan</label>
					<div class="col-sm-6">		
						<input class="form-control form-control-sm" name="kec" id="kec" value="<?php echo $kec;?>">	
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kabupaten</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="kab" id="kab" value="<?php echo $kab;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Provinsi</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="prov" id="prov" value="<?php echo $prov;?>">
					</div>
				</div>					
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Kode Pos</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="kdpos" id="kdpos" value="<?php echo $kdpos;?>">
					</div>
				</div>
				<div class="row" style="padding-bottom:5px">
					<label class="offset-sm-1 col-sm-5">Nomor HP</label>
					<div class="col-sm-6">
						<input class="form-control form-control-sm" name="nohp" id="nohp" value="<?php echo $nohp;?>">
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
				<button class="btn btn-primary btn-md btn-flat btn-block mb-2" id="simpan" name="simpan">
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
	</form>
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
		$("#thpel").change(function(){
			var kdthpel=$("#thpel").val();
			$.ajax({
				url: "config/get_nomor.php",
				data: "kdthpel="+kdthpel,
				cache: false,
				success: function(msg){
				 $("#nopend").val(msg);
				}
			});
		});
		$('#tgllahir').datetimepicker({
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
				var nama=$("#nama").val();
				var nik =$("#nik").val();
				var tmplahir=$("#tmplahir").val();
				var tgllahir=$("#tgllahir").val();
				var agama=$("#agama").val();
				var pendidikan =$("#pendidikan").val();
				var kerja=$("#kerja").val();
				var hasil=$("#hasil").val();
				var hubkel=$("#hubkel").val();
				var almt=$("#almt").val();
				var desa=$("#desa").val()
				var kec=$("#kec").val();
				var kab	=$("#kab").val();
				var prov=$("#prov").val();
				var kdpos=$("#kdpos").val();
				var nohp=$("#nohp").val();
				if(nama=="" || nama==null){
					toastr.error('Nama Orang Tua/Wali Wajib Diisi!');
					$("#nama").focus();
				}
				// else if(nik=="" || nik==null){
				// 	toastr.error('Nomor Induk Kependudukan Wajib Diisi!');
				// 	$("#nik").focus();
				// }
				// else if(tmplahir=="" || tmplahir==null){
				// 	toastr.error('Tempat Lahir Tidak Boleh Kosong');
				// 	$("#tmplahir").focus();
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