<?php
	$t=viewdata("tb_thpel","aktif","Y")[0];
	$thpel=substr($t['nmthpel'],0,9);
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h3 class="m-0">Persyaratan dan Ketentuan PPDB</h3>
	</div>
	<div class="card-body">
		<div class="row align-items-start">
			<div class="col-sm-6" style="padding-left:20px;padding-right:20px">
				<h4>Persyaratan Umum</h4>
				<?php
					$dh=viewdata("v_dasarhukum")[0];
					$dasar=ucwords(strtolower($dh['nmhkm']));
					$pasal=ucwords(strtolower($dh['nmpasal'])).', '.$dh['isipasal'];
					$idpasal=$dh['idpsl'];
					
					$qay=viewdata("tb_aythkm","idpsl",$idpasal);
				?>
				<p align="justify">
					Berdasarkan <?php echo $dasar.' '.$pasal;?>

					<ol>
					<?php foreach($qay as $ay): ?>
						<li>
							<?php echo $ay['isiayt'];?>
						</li>
					<?php endforeach?>
					</ol>
				</p>
				<p align="justify">Selain itu, calon peserta didik sudah memiliki NISN yang valid, yaitu terdaftar di <a href="https://nisn.data.kemdikbud.go.id" target="_blank">https://nisn.data.kemdikbud.go.id</a> dan sudah dilakukan verifikasi dan validasi (verval) melalui laman <a href="https://vervalpdnew.data.kemdikbud.go.id" target="_blank">https://vervalpdnew.data.kemdikbud.go.id</a> untuk menjaga konsistensi data.<p>
			</div>
			<div class="col-sm-6">
				<h4>Persyaratan Khusus</h4>
				<p align="justify">
				Untuk PPDB Tahun <?php echo $thpel;?>, dilakukan dengan mode daring yang dapat dilakukan secara individu atau kolektif (melalui sekolah asal) dengan ketentuan sebagai berikut:</p>
				<ol>
					<?php
						$syarat=viewdata("v_syarat");
						foreach($syarat as $row)
						{
					?>
					<li>
						<?php echo $row['nmsyarat'];?>
					</li>
					<?php }	?>
				</ol>
				</p>
                <p>Persyaratan khusus dianggap lengkap jika calon peserta didik sudah mengumpulkan dokumen asli, atau fotokopi melalui panitia PPDB</p>
            </div>
		</div>
	</div>
</div>