<?php
if(!isset($_COOKIE['c_user'])){header("Location: login.php");}
?>
<div class="col-sm-12">
		<div class="card card-secondary card-outline">
				<div class="card-header">
						<h4 class="card-title">Cek Bukti Fisik Dokumen Calon Peserta Didik</h4>
				</div>
				<div class="card-body">
						<div class="row">
								<div class="col-sm-12">
										<a href="index.php?p=buktitampil" class="btn btn-flat btn-primary btn-sm" id="btnTambah">
												<i class="fas fa-reply"></i>&nbsp;Kembali
										</a>
								</div>
						</div>
						<br/>
						<div class="table-responsive">
							<table id="tb_ceklis" class="table table-bordered table-striped table-sm">
								<thead>
								<tr>
									<th style="text-align: center;width:2.5%">No.</th>
									<th style="text-align: center;">Nama Siswa</th>
									<th style="text-align: center;width:10%">NISN</th>
									<?php
										$sql=mysqli_query($sqlconn,"SELECT aksyarat FROM tb_syarat WHERE kdthpel='$_COOKIE[c_tahun]'");
										while($rs=mysqli_fetch_array($sql))
										{
									?>
									<th style="text-align: center;width:10%"><?php echo $rs['aksyarat'];?></th>
									<?php }?>
								</tr>
								</thead>
								<tbody>
								<?php
										$qs=mysqli_query($sqlconn,"SELECT nopend, nisn, nama FROM tb_calsis WHERE deleted='0' AND kdthpel='$_COOKIE[c_tahun]' ORDER BY nopend ASC");
										$no=0;
										while($s=mysqli_fetch_array($qs))
										{
												$no++;
								?>
								<tr>
									<td style="text-align: center"><?php echo $no.'.';?></td>
									<td><?php echo ucwords(strtolower($s['nama']));?></td>
									<td style="text-align:center"><?php echo $s['nisn'];?></td>
									<?php
									$sql=mysqli_query($sqlconn,"SELECT kdsyarat FROM tb_syarat WHERE kdthpel='$_COOKIE[c_tahun]'");
									while($rs=mysqli_fetch_array($sql))
									{
										$sqlcek=mysqli_query($sqlconn,"SELECT ada FROM tb_ceklis WHERE kdsyarat='$rs[kdsyarat]' AND nopend='$s[nopend]'");
										$cek=mysqli_fetch_array($sqlcek);
										if($cek['ada']=='1'){$ada='Ada';$btn="btn-success";} else {$ada="Tidak";$btn="btn-danger";}
									?>
										<td style="text-align:center">
											<input type="button" data-id="<?php echo $s['nopend'].'&s='.$rs['kdsyarat'];?>" class="btnCeklis btn btn-flat btn-xs <?php echo $btn;?>" value="<?php echo $ada;?>">
										</td>
									<?php } ?>
								</tr>
										<?php } ?>
								</tbody>
							</table>
						</div>
				</div>
		</div>
</div>
<script type="text/javascript">
	// $(function () {
	// 	$('#tb_ceklis').DataTable({
	// 		"paging": true,
	// 		"lengthChange": false,
	// 		"searching": true,
	// 		"ordering": false,
	// 		"info": false,
	// 		"autoWidth": false,
	// 		"responsive": true,
	// 	});
	// });
	$(".btnCeklis").click(function(){
		var id=$(this).data('id');
		$.ajax({
				type:"POST",
				url:"berkas_simpan.php",
				data: "id="+id,
					success: function(){
						//window.location.reload();
					}
			})
				
	})
</script>