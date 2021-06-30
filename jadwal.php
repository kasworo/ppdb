<?php
$t=query("SELECT nmthpel FROM tb_thpel WHERE aktif='Y'");
$thpel=substr($t['nmthpel'],0,9);
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Jadwal Kegiatan Penerimaan Peserta Didik Baru</h5>
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
					$data=query("SELECT j.kegiatan, j.awal, j.akhir FROM tb_jadwal j INNER JOIN tb_thpel t USING(kdthpel) WHERE t.aktif='Y' ORDER BY j.awal");
                    $no=0;
					foreach($data as $row):
						$no++;
				?>
				<tr>
					<td align="center"><?php echo $no.'.';?></td>
					<td><?php echo $row['kegiatan'];?></td>
					<td>
                    
					<?php 
                        $awale=date('Y-m-d', strtotime($row['awal']));
                        $ahire=date('Y-m-d', strtotime($row['akhir']));
                        if($awale===$ahire){
                            echo indonesian_date($row['awal']);
                        }
                        else {
                            echo indonesian_date($row['awal']).' s.d '.indonesian_date($row['akhir']);
                        }
                    ?>
					</td>
				</tr>
				<?php endforeach?>
			</tbody>
		</table>
        <p>Apabila ada perubahan jadwal atau hal-hal yang belum dicantumkan akan diberitahukan secepatnya melalui laman ini.</p>
		</div>
	</div>
</div>