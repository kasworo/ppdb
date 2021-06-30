<?php
include "config/konfigurasi.php";
include "config/fungsi_tgl.php";
$query=mysqli_query($sqlconn,"SELECT nmthpel FROM tb_thpel WHERE aktif='Y'");
	$t=mysqli_fetch_array($query);
	$thpel=substr($t['nmthpel'],0,9);
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Jadwal PPDB</h5>
	</div>
	<div class="card-body">
		<div class="row align-items-center">
		<p align="justify">
			Jadwal PPDB Tahun <?php echo $thpel;?> adalah sebagai berikut:
		</p>
		<table class="table table-striped table-bordered table-sm">
			<thead>
				<tr>
					<th style="width:5%;text-align:center">No.</th>
					<th style="text-align:center">Kegiatan</th>
					<th style="width:20%;text-align:center">Tanggal</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$sql=mysqli_query($sqlconn,"SELECT j.* FROM tb_jadwal j INNER JOIN tb_thpel t USING(kdthpel) WHERE t.aktif='Y'");
					$no=0;
					while($row=mysqli_fetch_array($sql))
					{
						$no++;
				?>
				<tr>
					<td align="center"><?php echo $no.'.';?></td>
					<td><?php echo $row['kegiatan'];?></td>
					<td>
					<?php echo indonesian_date($row['awal']).' s.d '.indonesian_date($row['akhir']);?>
					</td>
				</tr>
				<?php }	?>
			</tbody>
		</table>
        <p>Apabila ada perubahan jadwal atau hal-hal yang belum dicantumkan akan diberitahukan secepatnya melalui laman ini.</p>
		</div>
	</div>
</div>