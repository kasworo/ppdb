<?php
include "config/konfigurasi.php";
include "config/fungsi_tgl.php";
$tgl=date('Y-m-d');
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h3 class="card-title">Cek Hasil Registrasi Kolektif</h3>
        <div class="card-tools">
            <a href="?p=buatsiswa" class="btn btn-tool" title="Template Orang tua/Wali">
			  <i class="fas fa-user-graduate"></i>
			</a>
			<a href="?p=buatortu" class="btn btn-tool" title="Template Orang tua/Wali">
			  <i class="fas fa-users"></i>
			</a>
			<a href="?p=buatnilai" class="btn btn-tool" title="Template Nilai">
			  <i class="fas fa-list"></i>
			</a>
			<a href="?p=home" class="btn btn-tool" title="Selesai">
			  <i class="fas fa-power-off"></i>
			</a>  
        </div>
	</div>
	<div class="card-body">
		<?php
			$sql=mysqli_query($sqlconn,"SELECT nopend, nisn, nama, nmskulasal, tglinput FROM tb_calsis s INNER JOIN tb_thpel t ON s.kdthpel=t.kdthpel INNER JOIN tb_skul_asal sa ON s.idskulasal=sa.idskulasal WHERE mode='2' AND s.idskulasal='$_REQUEST[aslskul]'");
			$cek=mysqli_num_rows($sql);
			if($cek==0)
			{
		?>
		<div class="alert alert-danger">
			<h4>Perhatian!</h4>
			<p>Tidak Ada Data Yang Ditampilkan</p>
		</div>
		<?php  } else { ?>
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-sm">
				<thead>
					<tr>
						<th style="width:5%;text-align:center">No.</th>
						<th style="width:12.5%;text-align:center">No. Pendaftaran</th>
						<th style="width:7.5%;text-align:center">NISN</th>
						<th style="text-align:center">Nama Siswa</th>
						<th style="width:15%;text-align:center">Asal Sekolah</th>
						<th style="width:12.5%;text-align:center">Tanggal Upload</th>
						<th style="width:17.5%;text-align:center">Cetak</th>
					</tr>
				</thead>
				<tbody>
					<?php
						$no=0;
						while($row=mysqli_fetch_array($sql))
						{
							$no++;
					?>
					<tr>
						<td style="text-align:center"><?php echo $no.'.';?></td>
						<td style="text-align:center"><?php echo $row['nopend'];?></td>
						<td style="text-align:center"><?php echo $row['nisn'];?></td>
						<td><?php echo $row['nama'] ?></td>
						<td><?php echo $row['nmskulasal'] ?></td>
						<td><?php echo indonesian_date($row['tglinput'])?></td>
						<td style="text-align:center">
							<a href="bukticetak.php?m=1&nopes=<?php echo base64_encode($row['nopend']);?>" target="_blank" class="btn btn-xs btn-flat btn-primary">
								<i class="fas fa-print"></i> Bukti Akun
							</a>&nbsp;
							<a href="#" class="btn btn-xs btn-flat btn-success" disabled>
								<i class="fas fa-print"></i> Formulir
							</a>
						</td>
					</tr>
					<?php }	?>
				</tbody>
			</table>
		</div>
		<?php } ?>
	</div>
	<div class="card-footer">
		<div class="row" align="center">
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="?p=buatdokumen" class="btn btn-lg btn-default btn-flat btn-block col-8">
					<i class="fas fa-fw fa-arrow-left"></i>
					<span>&nbsp;Sebelumnya</span>
				</a>
			</div>
			<div class="col-sm-3 col-md-3 col-lg-3" style="padding-bottom:5px">
				<a href="?p=home" class="btn btn-lg btn-danger btn-flat btn-block col-8">
					<i class="fas fa-fw fa-power-off"></i>
					<span>&nbsp;Selesai</span>
				</a>
			</div>
		</div>
	</div>
</div>