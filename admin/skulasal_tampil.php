<div class="modal fade" id="mySkulAsal" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title">Tambah Data Sekolah Asal</h5>
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="form-group mb-2">						
							<label>NPSN </label>
							<input type="text" class="form-control input-sm" id="idskulasl" name="idskulasl">
						</div>
						<div class="form-group mb-2">						
							<label>Nama Sekolah</label>
							<input type="text" class="form-control input-sm" id="nmskulasl" name="nmskulasl">
						</div>
						<div class="form-group mb-2">						
							<label>Alamat Sekolah</label>
							<textarea type="text" class="form-control input-sm" id="alskulasl" name="alskulasl"></textarea>
						</div>					
					</div>
				</div>
				<div class="modal-footer justify-content-between">
					<button type="submit" class="btn btn-primary btn-sm btn-flat" id="simpan">
						<i class="fas fa-save"></i> Simpan
					</button>
					<button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="fas fa-power-off"></i> Tutup</button>
				</div>
		</div>
			<!-- /.modal-content -->
	</div>
		<!-- /.modal-dialog -->
</div>
<div class="col-sm-12">
		<div class="card card-secondary card-outline">
				<div class="card-header">
						<h4 class="card-title">Data Sekolah Asal</h4>
				</div>
				<div class="card-body">
						<div class="row">
								<div class="col-sm-12">
										<button class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#mySkulAsal" id="btnTambah">
												<i class="fas fa-plus-circle"></i>&nbsp;Tambah
										</button>
										<button class="btn btn-flat btn-info btn-sm" id="btnRefresh">
												<i class="fas fa-sync-alt"></i>&nbsp;Refresh
										</button>
										<button id="hapusall" class="btn btn-flat btn-danger btn-sm">
												<i class="fas fa-trash-alt"></i>&nbsp;Hapus
										</button>
								</div>
						</div>
						<br/>
						<div class="table-responsive">
							<table id="tb_skulasal" class="table table-bordered table-striped table-sm">
								<thead>
								<tr>
									<th style="text-align: center;width:2.5%">No.</th>
									<th style="text-align: center;width:10%">NPSN</th>
									<th style="text-align: center;width:25%">Nama Sekolah</th>
									<th style="text-align: center">Alamat</th>
									<th style="text-align: center;width:20%">Aksi</th>
								</tr>
								</thead>
								<tbody>
								<?php
										$qk=viewdata("tb_skul_asal");
										$no=0;
										foreach($qk as $k)
										{
												$no++;
								?>
								<tr>
									<td style="text-align:center"><?php echo $no.'.';?></td>
									<td style="text-align:center"><?php echo $k['idskulasal'];?></td>
									<td><?php echo $k['nmskulasal'];?></td>
									<td><?php echo $k['almtskulasal'];?></td>
									<td style="text-align: center">
										<a href="#mySkulAsal" class="btn btn-xs btn-success btn-flat btnEdit" data-toggle="modal" data-id="<?php echo $k['idskulasal'];?>">
											<i class="fas fa-edit"></i>&nbsp;Edit
										</a>
										<button class="btn btn-xs btn-danger btn-flat">
											<i class="fas fa-trash-alt"></i>&nbsp;Hapus
										</button>
									</td>
								</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
				</div>
		</div>
</div>
<script type="text/javascript">
	$(function () {
		$('#tb_skulasal').DataTable({
			"paging": true,
			"lengthChange": false,
			"searching": true,
			"ordering": false,
			"info": false,
			"autoWidth": false,
			"responsive": true,
		});
	});
	
	$("#btnTambah").click(function(){
		$(".modal-title").html("Tambah Data Mata Pelajaran");
		$("#simpan").html("<i class='fas fa-save'></i> Simpan");
		$("#idskulasl").val('');
		$("#nmskulasl").val('');
		$("#alskulasl").val('');
	})
	
	$(".btnEdit").click(function(){
		$(".modal-title").html("Ubah Data Sekolah Asal");
			$("#simpan").html("<i class='fas fa-save'></i> Update");
			var id=$(this).data('id');
			$.ajax({
				url:'skulasal_edit.php',
				type:'post',
				dataType:'json',
				data:'id='+id,
				success:function(data)
				{
					$("#idskulasl").val(data.idskulasal);
					$("#nmskulasl").val(data.nmskulasal);
					$("#alskulasl").val(data.almtskulasal);
				}
			})
		});
	
		$("#simpan").click(function(){
				var idskul=$("#idskulasl").val();
				var nama =$("#nmskulasl").val();
				var alamat =$("#alskulasl").val();
				if(idskul==''){
						toastr.error("NPSN Tidak Boleh Kosong!");
						$("#idskulasal").focus();
				}
				else if(nama==''){
						toastr.error("Nama Sekolah Asal Tidak Boleh Kosong!");
						$("#nmskulasal").focus();
				}
				else if (alamat==''){
						toastr.error("Alamat Sekolah Asal Tidak Boleh Kosong!");
						$("#almtskulasal").focus();	 
				}
				else {
						$.ajax({
								url: "skulasal_simpan.php",
								type:"post",
								data: "idskul="+idskul+"&nama="+nama+"&alamat="+alamat,
								cache: false,
								success: function(data){
									toastr.success(data);
								}
						});
				}
		})
	$("#btnrefresh").click(function(){
		window.location.reload();
	})			
</script>