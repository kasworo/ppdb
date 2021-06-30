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
					<th style="text-align: center;width:22.5%">Tempat, Tgl. Lahir</th></th>
					<th style="text-align: center;width:2.5%">L/P</th>
					<th style="text-align: center;width:15%">Nama Orang Tua</th>
					<th style="text-align: center;width:10%">Usia</th>
					<th style="text-align: center;width:5%">Nilai</th>
					<th style="text-align: center;width:10%">Berkas</th>
					<th style="text-align: center">Keterangan</th>
				</tr>
				</thead>
				<tbody>
				<?php
					$qs=mysqli_query($sqlconn,"SELECT cs.* , ws.nmwali, SUM(ns.nilai) as jml, sa.nmskulasal as asl FROM tb_calsis cs INNER JOIN tb_ortu ws ON ws.nopend=cs.nopend INNER JOIN tb_nilai ns ON cs.nopend=ns.nopend	INNER JOIN tb_skul_asal sa ON cs.idskulasal=sa.idskulasal INNER JOIN tb_thpel t ON t.kdthpel=cs.kdthpel WHERE cs.deleted='0' AND t.aktif='Y' GROUP BY ns.nopend ORDER BY jml DESC");
					$no=0;
					
					while($s=mysqli_fetch_array($qs))
					{
						$no++;
						$ms=0;
						$lahir = new DateTime($s['tgllhr']);
						$batas = new DateTime($awal);
						$diff = $batas->diff($lahir);
						$umur = $diff->y+($diff->m)/12;
						$umurpd = $diff->y.' thn '.substr('0'.$diff->m,-2).' bln';
						
						if($umur>=11 && $umur<=15){$bdg='badge-success';$um="Memenuhi Syarat";$ms++;}
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
						$qberkas=mysqli_query($sqlconn,"SELECT COUNT(*) as berkas FROM tb_ceklis WHERE nopend='$s[nopend]' AND fileberkas<>null");
						$b=mysqli_fetch_array($qberkas);
						$cekberkas=$b['berkas'];
						
						$qceklis=mysqli_query($sqlconn,"SELECT COUNT(*) as ceklis FROM tb_ceklis WHERE nopend='$s[nopend]' AND ada='1'");
						$c=mysqli_fetch_array($qceklis);
						$ceklis=$c['ceklis'];
						
						if($cekberkas>=4 && $ceklis>=4){$vberkas="Lengkap";$cb="badge-success";$ms++;} 
						else if($ceklis>=4) {$vberkas="Belum Upload File";$cb="badge-warning";} else {$vberkas="Belum Lengkap";$cb="badge-danger";}
						
						if($ms>=3){$vms="Diterima";$bms="badge-success";} else {$vms="Silahkan Daftar Ulang";$bms="badge-primary";}
					?>
				<tr>
					<td style="text-align: center"><?php echo $no.'.';?></td>
					<td><?php echo $s['nisn'];?></td>
					<td><?php echo ucwords(strtolower($s['nama']));?></td>
					<td><?php echo ucwords(strtolower($s['tmplhr'])).', '.indonesian_date($s['tgllhr']);?></td>
					<td style="text-align:center"><?php echo $s['gender'];?></td>
					<td><?php echo ucwords(strtolower($s['nmwali']));?></td>
					<td style="text-align:center"><?php echo $umurpd;?></td>
					<td style="text-align:center"><?php if($nilai==0){echo '-';}else{echo $nilai;}?></td>
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