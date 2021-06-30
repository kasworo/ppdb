<?php
include "config/konfigurasi.php";
?>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Kontak Person Panitia PPDB</h5>
	</div>
	<div class="card-body">		
			<div class="row d-flex align-items-stretch p-2">
				
				<?php
					$quser=mysqli_query($sqlconn,"SELECT nama,alamat, desa, jbtdinas, jbtpanitia, nohp, foto FROM tb_user ORDER BY jbtpanitia, jbtdinas ASC");
					while($u=mysqli_fetch_array($quser))
					{
						if($u['jbtpanitia']=='1'){$jabatanpanitia='Penanggung Jawab';} 
						else if($u['jbtpanitia']=='2'){$jabatanpanitia='Ketua Panitia';} 
						else if($u['jbtpanitia']=='3'){$jabatanpanitia='Wakil Ketua Panitia';}
						else if($u['jbtpanitia']=='4'){$jabatanpanitia='Bendahara';} else if ($u['jbtpanitia']=='5'){$jabatanpanitia='Sekretaris';} else {$jabatanpanitia='Anggota';}
						if($u['jbtdinas']=='1'){$jabatandinas='Kepala Sekolah';} else if($u['jbtdinas']=='2'){$jabatandinas='Wakil Kepala Sekolah';} else if($u['jbtdinas']=='3'){$jabatandinas='Tenaga Pendidik';} else {$jabatandinas='Tenaga Administrasi';}
					
						if($u['foto']==''){
							$poto='assets/img/avatar.gif';
						} else {
								$fotouser='admin/foto/'.$u['foto'];
								if(file_exists($fotouser)){$poto=$fotouser;}
								else {$poto='assets/img/avatar.gif';}
						}
				?>
								
						<div class="col-12 col-sm-6 col-md-4">
						<div class="card card-widget widget-user-2">
							<!-- Add the bg color to the header using any of the bg-* classes -->
							<div class="widget-user-header bg-primary">
								<div class="widget-user-image">
									<img class="img-circle elevation-2" src="<?php echo $poto;?>" alt="Foto">
								</div>
								<!-- /.widget-user-image -->
								<h3 class="widget-user-username"><?php echo $u['nama'];?></h3>
								<h5 class="widget-user-desc"><?php echo $jabatanpanitia;?></h5>
							</div>
							<div class="card-footer p-0">
								<ul class="nav flex-column">
									<li class="nav-item">
										<div class="nav-link">
											<?php echo $jabatandinas;?>
										</div>
									</li>
									<li class="nav-item">
										<div class="nav-link"><strong>Kontak Person</strong>
										</div>
									</li>
									<li class="nav-item">
										<div class="nav-link">																					 
										<?php echo $u['nohp'];?>
										<span class="float-right badge bg-success">
											<i class="fab fa-whatsapp"></i>
										</span>
										</div>
									</li>
									<li class="nav-item">
										<div class="nav-link">
											<?php echo $u['alamat'].', Desa '.$u['desa'];?>
											<span class="float-right badge bg-danger">
												<i class="fas fa-map-marker-alt"></i>
											</span>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<?php } ?>
							
			</div>
	</div>
</div>