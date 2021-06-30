<?php
  if($level=='1'){
?>
<div class="modal fade" id="mySyarat" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
					<h5 class="modal-title">Tambah Persyaratan PPDB</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
            <div class="form-group">
                <label for="nosk">Kode Syarat</label>
                <input class="form-control" id="kdsyarat" name="kdsyarat" disabled>
            </div>
            <div class="form-group">
                <label for="nosk">Syarat</label>
                <textarea rows="4" class="form-control" id="syarat" name="syarat" placeholder="Syarat PPDB"></textarea>
            </div>
          </div>
				</div>
				<div class="modal-footer justify-content-between">
          <button type="submit" class="btn btn-primary btn-md btn-flat" id="simpan">
            <i class="fas fa-save"></i> Simpan
          </button>
					<button type="button" class="btn btn-danger btn-md btn-flat" data-dismiss="modal">
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
        <h4 class="card-title">Pengaturan Syarat PPDB</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <button class="btn btn-flat btn-success btn-sm btnTambah" data-toggle="modal" data-target="#mySyarat">
              <i class="fas fa-plus-circle"></i>&nbsp;Tambah
            </button>                
            <button class="btn btn-flat btn-danger btn-sm">
              <i class="far fa-clock"></i>&nbsp;Tutup
            </button>
          </div>
        </div>
        <br/>
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-sm table-condensed table-striped table-bordered">
              <thead>
                <tr>
                  <th style="text-align:center;" width="5%">No.</th>
                  <th style="text-align:center;" width="12.5%">Kode Syarat</th>
                  <th style="text-align:center;">Persyaratan</th>
                  <th style="text-align:center;" width="20%">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $qsy=viewdata("v_syarat");
                  $no=0;
                  foreach($qsy as $sy)
                  {
                    $no++;
                ?>
                <tr>
                  <td style="text-align:center;"><?php echo $no.'.';?></td>
                  <td style="text-align:center;"><?php echo $sy['kdsyarat'];?></td>
                  <td><?php echo $sy['nmsyarat'];?></td>
                  <td style="text-align:center;"> 
                  <a href="#mySyarat" class="btn btn-xs btn-success btn-flat btnEdit" data-toggle="modal" data-id="<?php echo $sy['kdsyarat'];?>">
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
        </br>
      </div>
    </div>
</div>


<script type="text/javascript">
  $(".btnTambah").click(function(){
        $(".modal-title").html("Tambah Persyaratan PPDB");
        $("#simpan").html("<i class='fas fa-save'></i> Simpan");
        var kdthpel = "<?php echo $_COOKIE['c_tahun'];?>";
			$.ajax({
				url: "syarat_getid.php",
				cache: false,
				success: function(data){
				 $("#kdsyarat").val(data);
				}
			});
    })
  $("#simpan").click(function(){
      var id=$("#kdsyarat").val();
      var sy=$("#syarat").val();
      $.ajax({
        url:"syarat_simpan.php",
        type:'POST',
        data:"id="+id+"&syarat="+sy,
        success:function(data){
          toastr.success(data);
        }
      })
  })
  $(".btnEdit").click(function(){
      $(".modal-title").html("Ubah Persyaratan PPDB");
      $("#simpan").html("<i class='fas fa-save'></i> Update");
      var id=$(this).data('id');
      //alert(id);
      $.ajax({
        url:'syarat_edit.php',
        type:'post',
        dataType:'json',
        data:'id='+id,
        success:function(data)
        {
          $("#kdsyarat").val(data.kdsyarat);
          $("#syarat").val(data.nmsyarat);
        }
      })
  })
  $("#btnrefresh").click(function(){
    window.location.reload();
  })
</script>
<?php } else { ?>
  <div class="col-sm-12">
    <div class="card card-secondary card-outline">
      <div class="card-header">
        <h4 class="card-title">Syarat Administrasi PPDB</h4>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-sm-12">
            <table class="table table-sm table-condensed table-striped table-bordered">
              <thead>
                <tr>
                  <th style="text-align:center;" width="5%">No.</th>
                  <th style="text-align:center;" width="12.5%">Kode Syarat</th>
                  <th style="text-align:center;">Persyaratan</th>
                </tr>
              </thead>
              <tbody>
                <?php
                  $qsy=viewdata("v_syarat");
                  $no=0;
                  foreach($qsy as $sy)
                  {
                    $no++;
                ?>
                <tr>
                  <td style="text-align:center;"><?php echo $no.'.';?></td>
                  <td style="text-align:center;"><?php echo $sy['kdsyarat'];?></td>
                  <td><?php echo $sy['nmsyarat'];?></td>
                  
                </tr>
                <?php } ?>
              </tbody>
            </table>
          </div>
        </br>
      </div>
    </div>
</div>
<?php } ?>