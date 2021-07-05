<?php
	$dh=viewdata("v_dasarhukum")[0];
	$dasar=ucwords(strtolower($dh['nmhkm']));
	$pasal=ucwords(strtolower($dh['nmpasal']));
	$idpasal=$dh['idpsl'];
	$qay=viewdata("tb_aythkm","idpsl",$idpasal);
				?>
<div class="col-sm-12">
	<div class="alert alert-warning">
		<h4>Catatan:</h4>
		<p>
			Calon Peserta didik dinyatakan diterima di kelas 7 (Tujuh) SMP setelah memenuhi persyaratan dalam <?php echo $dasar.', '.$pasal;?> yaitu:<br/>
			<?php foreach($qay as $ay): ?>
				<li>
					<?php echo $ay['isiayt'];?>
				</li>
			<?php endforeach?>
			
		</p>
	</div>
	<div class="card card-secondary card-outline">
		<div class="card-header">
			<h4 class="card-title">Hasil Seleksi Calon Peserta Didik</h4>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table id="tb_siswa" class="table table-bordered table-striped table-sm">
				<thead>
				<tr>
					<th style="text-align: center;width:2.5%">No.</th>
					<th style="text-align: center;width:7.5%">NISN</th>
					<th style="text-align: center;width:20%">Nama Siswa</th>
					<th style="text-align: center;width:20%">Tempat, Tgl. Lahir</th></th>
					<th style="text-align: center;width:2.5%">L/P</th>
					<th style="text-align: center;width:12.5%">Nama Orang Tua</th>
					<th style="text-align: center;width:15%">Usia</th>
					<th style="text-align: center;width:5%">Nilai</th>
					<th style="text-align: center">Keterangan</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$qs=seleksidata("v_calsis",$bataslahir);
					$no=0;
					foreach($qs as $s)
					{
						$no++;
						$ms=0;
						$lahir = new DateTime($s['tgllhr']);
						$batas = new DateTime($awal);
						$diff = $batas->diff($lahir);
						$umur = $diff->y+($diff->m)/12;
						$umurpd = $diff->y.' th '.substr('0'.$diff->m,-2).' bl';
						$nilai=$s['kabeh'];
						
						if($umur<=1){$pesan="Cek Data";}else if($umur<=15){$pesan="Lulus";} else {$pesan="Tidak Lulus";}
					?>
				<tr>
					<td style="text-align: center"><?php echo $no.'.';?></td>
					<td><?php echo $s['nisn'];?></td>
					<td><?php echo ucwords(strtolower($s['nama']));?></td>
					<td><?php echo ucwords(strtolower($s['tmplhr'])).', **-**-****';?></td>
					<td style="text-align:center"><?php echo $s['gender'];?></td>
					<td><?php echo ucwords(strtolower($s['nmwali']));?></td>
					<td style="text-align:center"><?php echo $umurpd;?></td>
					<td style="text-align:center"><?php if($nilai==0){echo '-';}else{echo $nilai;}?></td>
					<td style="text-align:center"><?php echo $pesan;?></td>
				</tr>
				<?php } ?>
				</tbody>
				</table>
			</div>
		</div>
	</div>
</div>