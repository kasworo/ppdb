<div class="col-sm-12">
	<div class="card card-secondary card-outline">
		<div class="card-header">
			<h3 class="card-title">Riwayat Login Pengguna</h3>
		</div>
		<div class="card-body">
			<div class="row d-flex align-items-stretch justify-content-start">
			<?php
				$qu=mysqli_query($conn,"SELECT*FROM tb_user WHERE logakhir<>'0000-00-00 00:00:00' LIMIT 0,3");
				while($u=mysqli_fetch_array($qu))
				{
					$foto=$u['foto'];
					if($u['level']=='1'){
						$level='Administrator';
					}
					else{
						$level='User';
					}
					$foto=$u['foto'];
					if($foto=='' || $foto==null){
						$fotouser='../assets/img/avatar.gif';
					}
					else{
						if(file_exists('foto/'.$foto)){
							$fotouser='foto/'.$foto;
						}
						else{
							$fotouser='../assets/img/avatar.gif';
						}
					}
					
				?>
				<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
					<div class="card bg-light">
						<div class="card-header text-muted border-bottom-0"><?php echo $u['nama'];?></div>
							<div class="card-body pt-0">
								<div class="row">
									<div class="col-7">
										<h3 class="lead"><b><?php echo $level;?></b></h3>
										<p class="text-muted text-sm"><b>Riwayat Login</b></p>
										<ul class="ml-4 mb-0 fa-ul text-muted">
											<li class="small"><span class="fa-li"><i class="far fa-sm fa-calendar"></i></span>Tanggal <?php echo indonesian_date($u['logakhir']);?></li>
											<li class="small"><span class="fa-li"><i class="far fa-sm fa-clock"></i></span> Jam <?php echo date_format(date_create($u['logakhir']),'H:i:s');?></li>
										</ul>
									</div>
									<div class="col-5 text-center">
									<img src="<?php echo $fotouser;?>" class="img-circle img-fluid">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } 
				$qs=mysqli_query($conn,"SELECT nama, foto, logakhir as logkeluar FROM tb_calsis WHERE logakhir<>'0000-00-00 00:00:00' ORDER BY logkeluar DESC LIMIT 0,6");
				while($u=mysqli_fetch_array($qs)){
				$level='Peserta Didik';
				$foto=$u['foto'];
				if($foto=='' || $foto==null){
					$fotouser='../assets/img/avatar.gif';
				}
				else{
					if(file_exists('../foto/'.$foto)){
						$fotosiswa='../foto/'.$foto;
					}
					else{
						$fotosiswa='../assets/img/avatar.gif';
					}
				}
				
				?>
				<div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
					<div class="card bg-light">
						<div class="card-header text-muted border-bottom-0"><?php echo ucwords(strtolower($u['nama']));?></div>
							<div class="card-body pt-0">
								<div class="row">
									<div class="col-7">
										<h3 class="lead"><b><?php echo $level;?></b></h3>
										<p class="text-muted text-sm"><b>Riwayat Login</b></p>
										<ul class="ml-4 mb-0 fa-ul text-muted">
											<li class="small"><span class="fa-li"><i class="far fa-sm fa-calendar"></i></span>Tanggal <?php echo indonesian_date($u['logkeluar']);?></li>
											<li class="small"><span class="fa-li"><i class="far fa-sm fa-clock"></i></span> Jam <?php echo date_format(date_create($u['logkeluar']),'H:i:s');?></li>
										</ul>
									</div>
									<div class="col-5 text-center">
									<img src="<?php echo $fotosiswa;?>" class="img-circle img-fluid">
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php } ?>
			</div>
		</div>		
	</div>
</div>