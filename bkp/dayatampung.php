<?php
include "config/konfigurasi.php";
include "config/fungsi_tgl.php";
$query=mysqli_query($sqlconn,"SELECT nmthpel FROM tb_thpel WHERE aktif='Y'");
	$t=mysqli_fetch_array($query);
	$thpel=substr($t['nmthpel'],0,9);
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Daya Tampung Peserta Didik Baru</h5>
	</div>
	<div class="card-body">
		<div class="row align-items-center">
			<div class="col-sm-6">
				<p align="justify">
					Daya Tampung Peserta Didik Baru Tahun <?php echo $thpel;?> adalah sebagai berikut:
				</p>
				<p>Apabila ada perubahan jadwal atau hal-hal yang belum dicantumkan akan diberitahukan secepatnya melalui laman ini.</p>
			</div>
			<div class="col-sm-6">
				
			</div>
		</div>
	</div>
</div>