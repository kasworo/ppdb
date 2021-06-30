<script type="text/javascript">
$(document).ready(function () {
	bsCustomFileInput.init();
});
</script>
<?php if(!empty($_GET['d']) && $_GET['d']=='1'){include "user_upload.php";}?>
<div class="modal fade" id="myImportUser" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?p=datauser&d=1" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Import Data Pengguna</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="row">
							<label for="tmpuser">Pilih File Template</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="tmpuser" name="tmpuser">
								<label class="custom-file-label" for="tmpuser">Pilih file</label>
							</div>              
							<p style="color:red;margin-top:10px"><em>Hanya mendukung file *.xls (Microsoft Excel 97-2003)</em></p>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
          <a href="user_template.php" class="btn btn-success btn-sm btn-flat" target="_blank"><i class="fas fa-download"></i> Download</a>
					<button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-upload"></i> Upload</button>
					<button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="fas fa-power-off"></i> Tutup</button>
				</div>
			</form>
		</div>
			<!-- /.modal-content -->
	</div>
		<!-- /.modal-dialog -->
</div>
<div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Data Pengguna</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <a href="index.php?p=adduser&m=1" class="btn btn-flat btn-primary btn-sm">
                        <i class="fas fa-plus-circle"></i>&nbsp;Tambah
                    </a>
                    <button class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#myImportUser">
                        <i class="fas fa-cloud-upload-alt"></i>&nbsp;Import
                    </button>
                    <button id="hapusall" class="btn btn-flat btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>&nbsp;Hapus
                    </button>
                </div>
            </div>
            <br/>
            <div class="table-responsive">
              <table id="tb_user" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                  <th style="text-align: center;width:2.5%">No.</th>
                  <th style="text-align: center;width:22.5%">Nama User</th>
                  <th style="text-align: center;width:17.5%">NIP</th>
                  <th style="text-align: center;">Alamat</th>
                  <th style="text-align: center;width:10%">Aktif</th>
                  <th style="text-align: center;width:20%">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $qs=viewdata("tb_user","level",'0',"jbtpanitia");
                    $no=0;
                    foreach($qs as $s)
                    {
                      $no++;
                      if($s['aktif']=='1'){$stat='Aktif';$btn="btn-success";} else {$stat='Non Aktif';$btn="btn-danger";}
                ?>
                <tr>
                  <td style="text-align:center"><?php echo $no.'.';?></td>
                  <td title="<?php echo $s['username'];?>"><?php echo $s['nama'];?></td>
                  <td><?php echo $s['nip'];?></td>
                  <td><?php echo $s['alamat'];?></td>
                  <td style="text-align:center">
                      <input data-id="<?php echo base64_encode($s['username']);?>" type="button" class="btn <?php echo $btn;?> btn-flat btn-xs btnAktif" value="<?php echo $stat;?>">
                  </td>
                  <td style="text-align: center">
                    <button data-id="<?php echo base64_encode($s['username']);?>" class="btn btn-xs btn-secondary btn-flat btnReset">
                      <i class="fas fa-sync-alt"></i>&nbsp;Reset
                    </button>
                    <a href="index.php?p=adduser&m=2&id=<?php echo base64_encode($s['username']);?>" class="btn btn-xs btn-primary btn-flat">
                        <i class="fas fa-edit"></i>&nbsp;Edit
                    </a>
                    <a href="#" class="btn btn-xs btn-danger btn-flat">
                        <i class="fas fa-trash-alt"></i>&nbsp;Hapus
                    </a>
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
    $('#tb_user').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $(".btnReset").click(function(){
    var id=$(this).data('id');
    $.ajax({
      url:"user_simpan.php",
      type:"POST",
      data:"aksi=reset&id="+id,
      success:function(data){
        toastr.success(data);         
      }
    })
  })
  
  $(".btnAktif").click(function(){
    var id=$(this).data('id');
    $.ajax({
      url:"user_simpan.php",
      type:"POST",
      data:"aksi=aktif&id="+id,
      success:function(data){
       toastr.success(data); 
       window.location.reload();       
      }
    })
  })
  
</script>