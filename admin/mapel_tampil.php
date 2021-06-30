<div class="modal fade" id="myAddMapel" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title">Tambah Data Mata Pelajaran</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
            <div class="form-group mb-2">            
							<label>Kode </label>
							<input type="text" class="form-control input-sm" id="kdmapel" name="kdmapel">
						</div>
            <div class="form-group mb-2">            
							<label>Mata Pelajaran</label>
							<input type="text" class="form-control input-sm" id="nmmapel" name="nmmapel">
						</div>
            <div class="form-group mb-2">            
							<label>Singkatan</label>
							<input type="text" class="form-control input-sm" id="akmapel" name="akmapel">
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-primary btn-md col-4 btn-flat" id="simpan">
            <i class="fas fa-save"></i> Simpan
          </button>
					<button type="button" class="btn btn-danger btn-md col-4 btn-flat" data-dismiss="modal">
            <i class="fas fa-power-off"></i> Tutup
          </button>
				</div>
		</div>
			<!-- /.modal-content -->
	</div>
		<!-- /.modal-dialog -->
</div>
<div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Data Mata Pelajaran</h4>
        </div>
        <div class="card-body">
            <div class="form-group mb-2">
                <div class="col-sm-12">
                    <button class="btn btn-flat btn-success btn-sm" id="btnTambah" data-toggle="modal" data-target="#myAddMapel">
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
              <table id="tb_kurikulum" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                  <th style="text-align: center;width:2.5%">No.</th>
                  <th style="text-align: center;width:7.5%">Kode</th>
                  <th style="text-align: center">Mata Pelajaran</th>
                  <th style="text-align: center;width:20%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $qk=viewdata("tb_mapel");
                    $no=0;
                    foreach($qk as $k)
                    {
                        $no++;
                ?>
                <tr>
                  <td style="text-align:center"><?php echo $no.'.';?></td>
                  <td style="text-align:center"><?php echo $k['kdmapel'];?></td>
                  <td><?php echo $k['nmmapel'].' ('.$k['akmapel'].')';?></td>
                  <td style="text-align: center">
                    <a href="#myAddMapel" data-toggle="modal" data-id="<?php echo $k['kdmapel'];?>" class="btn btn-xs btn-success btn-flat btnUpdate">
                        <i class="fas fa-edit"></i>&nbsp;Edit
                    </a>
                    <button data-id="<?php echo $k['kdmapel'];?>" class="btn btn-xs btn-danger btn-flat btnHapus">
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
  $("#btnTambah").click(function(){
    $(".modal-title").html("Tambah Data Mata Pelajaran");
    $("#simpan").html("<i class='fas fa-save'></i> Simpan");
    $("#kdmapel").val('');
    $("#nmmapel").val('');
    $("#akmapel").val('');
  })
  $("#simpan").click(function(){
      var id=$("#kdmapel").val();
      var nm=$("#nmmapel").val();
      var ak=$("#akmapel").val();
      $.ajax({
        url:"mapel_simpan.php",
        type:'POST',
        data:"id="+id+"&nmmapel="+nm+"&akmapel="+ak,
        success:function(data){
          toastr.success(data);
        }
      })
  })
  $(".btnUpdate").click(function(){
      $(".modal-title").html("Ubah Data Mata Pelajaran");
      $("#simpan").html("<i class='fas fa-save'></i> Update");
      var id=$(this).data('id');
      //alert(id);
      $.ajax({
        url:'mapel_edit.php',
        type:'post',
        dataType:'json',
        data:'id='+id,
        success:function(data)
        {
          $("#kdmapel").val(data.kdmapel);
          $("#nmmapel").val(data.nmmapel);
          $("#akmapel").val(data.akmapel);
        }
      })
  })
  $(".btnHapus").click(function(){
    var id=$(this).data('id');
    Swal.fire({
      title: 'Anda Yakin?',
      text: "Menghapus Mata Pelajaran",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText:'Batal'
    }).then((result) => {
      if (result.value) {
        $.ajax({
						type:"POST",
						url:"mapel_simpan.php",
						data: "aksi=hapus&id="+id,
						success: function(data){					
							toastr.success(data);
						}
				})
        window.location.reload();
      }
    })
  })
  $("#hapusall").click(function(){
    Swal.fire({
      title: 'Anda Yakin?',
      text: "Menghapus Mata Pelajaran",
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Hapus',
      cancelButtonText:'Batal'
    }).then((result) => {
      if (result.value) {
        $.ajax({
            type:"POST",
			url:"mapel_simpan.php",
			data: "aksi=kosong",
			success: function(data){					
			toastr.success(data);
			}
		})
      }
    })
	})
  $("#btnrefresh").click(function(){
    window.location.reload();
  })
</script>