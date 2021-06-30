<?php
	if(!isset($_COOKIE['c_user'])){header("Location: login.php");}	
	include "../config/fungsi_umur.php";
	$sql=mysqli_query($sqlconn,"SELECT awal FROM tb_thpel WHERE kdthpel='$_COOKIE[c_tahun]'");
	$t=mysqli_fetch_array($sql);
	$awal=$t['awal'];
?>
<div class="modal fade" id="mySeleksi" aria-modal="true" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title">Setting Laporan</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="form-group mb-2">
							<label>Tanggal Seleksi</label>
							<input type="text" class="form-control form-control-sm" id="tglsel" name="tglsel" autocomplete="off">
						</div>
						<div class="form-group mb-2">
							<label>Tempat Seleksi</label>
							<input type="text" class="form-control form-control-sm" id="tmpsel" name="tmpsel" autocomplete="off">
						</div>
						<div class="form-group mb-2">
							<label>Nama Pejabat Yang Mengesahkan</label>
							<input type="text" class="form-control form-control-sm" id="nmpsel" name="nmpsel" autocomplete="off">
						</div>
						<div class="form-group mb-2">
							<label>NIP Pejabat Yang Mengesahkan</label>
							<input type="text" class="form-control form-control-sm" id="nippsel" name="nippsel" autocomplete="off">
						</div>
						<div class="form-group mb-2">
							<label>Jabatan Pejabat Yang Mengesahkan</label>
							<input type="text" class="form-control form-control-sm" id="jbtsel" name="jbtsel" autocomplete="off">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" class="btn btn-primary btn-sm btn-flat" id="btnSimpan">
						<i class="fas fa-save"></i> Simpan
					</button>
					<button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="fas fa-power-off"></i> Tutup</button>
				</div>
		</div>
	</div>
</div>
<div class="col-sm-12">
	<div class="alert alert-warning">
		<h4>Catatan:</h4>
		<p>
			Calon Peserta didik dinyatakan diterima di kelas 7 (Tujuh) SMP setelah memenuhi persyaratan dalam Peraturan Menteri Pendidikan dan Kebudayaan Nomor 44 Tahun 2019 tentang Penerimaan Peserta Didik Baru Pada Taman Kanak-Kanak, Sekolah Dasar, Sekolah Menengah Pertama, Sekolah Menengah Atas, dan Sekolah Menengah Kejuruan Pasal 6, yaitu:<br/>
			a. berusia paling tinggi 15 (lima belas) tahun pada tanggal 1 Juli tahun berjalan; dan<br/>
			b. memiliki ijazah SD/sederajat atau dokumen lain yang menjelaskan telah menyelesaikan kelas 6 (enam) SD.
		</p>
	</div>
	<div class="card card-secondary card-outline">
		<div class="card-header">
			<h4 class="card-title">Seleksi Calon Peserta Didik</h4>
		</div>
		<div class="card-body">
			<div class="row">
				<div class="col-sm-12">
					<button data-toggle="modal" data-target="#mySeleksi" class="btn btn-flat btn-primary btn-sm">
						<i class="fas fa-cog"></i>&nbsp;Setting Cetak
					</button>
					<a href="print_seleksi.php?m=1" class="btn btn-flat btn-default btn-sm" target="_blank">
						<i class="fas fa-print"></i>&nbsp;Cetak Hasil Seleksi
					</a>
					<a href="printdinas.php" class="btn btn-flat btn-default btn-sm" target="_blank">
						<i class="fas fa-print"></i>&nbsp;Cetak Laporan Untuk Dinas
					</a>
				</div>
			</div>
			<br/>
			<div class="table-responsive">
				<table id="tb_siswa" class="table table-bordered table-striped table-sm">
				<thead>
				<tr>
					<th style="text-align: center;width:2.5%">No.</th>
					<th style="text-align: center;width:22.5%">Nama Siswa</th>
					<th style="text-align: center;width:7.5%">NISN</th>
					<th style="text-align: center;width:2.5%">L/P</th>
					<th style="text-align: center;width:17.5%">Nama Orang Tua</th>
					<th style="text-align: center;width:17.5%">Umur</th>
					<th style="text-align: center;width:15%">Nilai</th>
					<th style="text-align: center;width:15%">Berkas</th>
					<th style="text-align: center">Keterangan</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$qs=mysqli_query($sqlconn,"SELECT s.nopend, s.nisn, s.nama,s.tmplhr, s.tgllhr, s.gender, nmwali FROM tb_calsis s LEFT JOIN tb_ortu w ON w.idcalsis=s.idcalsis WHERE s.deleted='0' AND s.kdthpel='$_COOKIE[c_tahun]'");
					$no=0;
					
					while($s=mysqli_fetch_array($qs))
					{
						$no++;
						$ms=0;
						$umur=umur($s['tgllhr'],$awal);
						$lahir = new DateTime($s['tgllhr']);
						$batas = new DateTime($awal);
						$diff = $batas->diff($lahir);
						$umurpd=$diff->y;
						
						if($umurpd>=11 && $umurpd<=15){$bdg='badge-success';$um="Memenuhi Syarat";$ms++;}
						else {$bdg='badge-danger';$um="Tidak Memenuhi Syarat";}
						$sqrapor=mysqli_query($sqlconn,"SELECT SUM(rapor) as jrapor FROM (SELECT AVG(nilai) as rapor FROM tb_nilai WHERE jns='1' AND nopend='$s[nopend]' GROUP BY kdmapel, nopend) as tbrapor");
						$r=mysqli_fetch_array($sqrapor);
						$rapor=$r['jrapor'];
						$squs=mysqli_query($sqlconn,"SELECT SUM(nilai) as us FROM tb_nilai WHERE jns='2' AND nopend='$s[nopend]'");
						$u=mysqli_fetch_array($squs);
						$us=$u['us'];
						if($rapor==''){$nilai=$us;} 
						else {$nilai=($us+$rapor)/2;}
						
						if($nilai>0){$ms++;}
						
						$qberkas=mysqli_query($sqlconn,"SELECT COUNT(*) as berkas FROM tb_berkas WHERE nopend='$s[nopend]'");
						$b=mysqli_fetch_array($qberkas);
						$cekberkas=$b['berkas'];
						if($cekberkas>=4){$vberkas="Lengkap";$cb="badge-success";$ms++;} 
						else {$vberkas="Belum Lengkap";$cb="badge-danger";}
						if($ms>=3){$vms="Diterima";$bms="badge-success";} else {$vms="Belum Diterima";$bms="badge-danger";}
					?>
				<tr>
					<td style="text-align: center"><?php echo $no.'.';?></td>
					<td><?php echo ucwords(strtolower($s['nama']));?></td>
					<td><?php echo $s['nisn'];?></td>
					<td style="text-align:center"><?php echo $s['gender'];?></td>
					<td><?php echo ucwords(strtolower($s['nmwali']));?></td>
					<td style="text-align:center"><span class="badge <?php echo $bdg;?>"><?php echo $um;?></span></td>
					<td style="text-align:center"><?php echo $nilai;?></td>
					<td style="text-align:center"><span class="badge <?php echo $cb?>"><?php echo $vberkas;?></td>
					<td style="text-align:center"><span class="badge <?php echo $bms?>"><?php echo $vms;?></span></td>
				</tr>
				<?php } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#btnSimpan").click(function(){
			var tgl=$("#tglsel").val();
			var tmp=$("#tmpsel").val();
			var nama=$("#nmpsel").val();
			var nip=$("#nippsel").val();
			var jbt=$("#jbtsel").val();
			$.ajax({
				url:"seleksi_simpan.php",
				type:"POST",
				data:"tgl="+tgl+"&tmp="+tmp+"&nama="+nama+"&nip="+nip+"&jbt="+jbt,
				success: function(data){
					toastr.success(data);
				}
			})
		})
		$("#mySeleksi").on('show.bs.modal', function () {
			var thpel="<?php echo $_COOKIE['c_tahun'];?>"
			$.ajax({
				url:'seleksi_edit.php',
				type:'POST',
				data:'thpel='+thpel,
				cache: false,
				success:function(data){
					$("#tmpsel").val(data.tmpseleksi);
					$("#tglsel").val(data.tglseleksi);
				}
			})
		})
	});
</script>