<?php
	include "config/konfigurasi.php";
	$query=mysqli_query($sqlconn,"SELECT nmthpel FROM tb_thpel WHERE aktif='Y'");
	$t=mysqli_fetch_array($query);
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
				<p align="justify">
					Berdasarkan Peraturan Menteri Pendidikan dan Kebudayaan Republik Indonesia Nomor 44 Tahun 2019 tentang penerimaan peserta didik baru pada taman kanak-kanak, sekolah dasar, sekolah menengah pertama, sekolah menengah atas, dan sekolah menengah kejuruan Pasal 6, persyaratan calon peserta didik baru kelas 7 (tujuh) SMP adalah:
					<ol>
						<li>
							berusia paling tinggi 15 (lima belas) tahun pada tanggal 1 Juli tahun berjalan; dan
						</li>
						<li>
							memiliki ijazah SD/sederajat atau dokumen lain yang menjelaskan telah menyelesaikan kelas 6 (enam) SD.
						</li>
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
						$sql=mysqli_query($sqlconn,"SELECT*FROM tb_syarat sy INNER JOIN tb_thpel tp USING(kdthpel) WHERE tp.aktif='Y' AND sy.aktif='1'");
						while($row=mysqli_fetch_array($sql))
						{
					?>
					<li>
						<?php echo $row['nmsyarat'];?>
					</li>
					<?php }	?>
				</ol>
				</p>
			</div>
		</div>
	</div>
</div>