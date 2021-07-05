<?php if(!empty($_GET['d']) && $_GET['d']=='1'){include "nilai_upload.php";}?>
<div class="modal fade" id="myNilai" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?p=datasiswa&d=1" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Import Data Nilai Peserta Didik</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="col-sm-12">
						<div class="row">
							<label for="tmpsiswa">Pilih File Template</label>
							<div class="custom-file">
								<input type="file" class="custom-file-input" id="tmpsiswa" name="tmpsiswa">
								<label class="custom-file-label" for="tmpsiswa">Pilih file</label>
							</div>              
							<p style="color:red;margin-top:10px"><em>Hanya mendukung file *.xls (Microsoft Excel 97-2003)</em></p>
						</div>
					</div>
				</div>
				<div class="modal-footer justify-content-between">
          <a href="siswa_template.php" class="btn btn-success btn-sm btn-flat" target="_blank"><i class="fas fa-download"></i> Download</a>
					<button type="submit" class="btn btn-primary btn-sm btn-flat"><i class="fas fa-upload"></i> Upload</button>
					<button type="button" class="btn btn-danger btn-sm btn-flat" data-dismiss="modal"><i class="fas fa-power-off"></i> Tutup</button>
				</div>
			</form>
		</div>
	</div>
</div>
<div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Data Nilai Calon Peserta Didik</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <a href="index.php?p=addsiswa&m=1" class="btn btn-flat btn-primary btn-sm" id="btnTambah">
                        <i class="fas fa-plus-circle"></i>&nbsp;Calon Peserta Didik
                    </a>
                    <button class="btn btn-flat btn-info btn-sm">
                        <i class="fas fa-sync-alt"></i>&nbsp;Refresh
                    </button>
                    <button class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#myNilai">
                        <i class="fas fa-cloud-upload-alt"></i>&nbsp;Import
                    </button>
                    <button id="hapusall" class="btn btn-flat btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>&nbsp;Hapus
                    </button>
                </div>
            </div>
            <br/>
            <div class="table-responsive">
              <table id="tb_siswa" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                  <th style="text-align: center;width:2.5%">No.</th>
                  <th style="text-align: center;width:32.5%">Nama Siswa</th>
                  <th style="text-align: center;width:7.5%">NISN</th>
                  <th style="text-align: center;width:22.5%">Sekolah Asal</th>
                  <th style="text-align: center;width:10%">Nilai</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $qs=viewdata("v_calsis","","","kabeh");
                    $no=0;                    
                    foreach($qs as $s)
                    {
                      $no++;
                        
                ?>
                <tr>
                  <td style="text-align: center"><?php echo $no.'.';?></td>
                  <td><?php echo ucwords(strtolower($s['nama']));?></td>
                  <td><?php echo $s['nisn'];?></td>
                  <td><?php echo ($s['asl']);?></td>
                  <td style="text-align:center"><?php echo $s['kabeh'];?></td>
                  <td style="text-align: center">
                    <a href="index.php?p=addnilai&m=1&id=<?php echo base64_encode($s['idcalsis']);?>" class="btn btn-xs btn-primary btn-flat">
                        <i class="fas fa-edit"></i>&nbsp;Input
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
    $('#tb_siswa').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });
  $("#hapusall").click(function(){
			swal.fire({
					title: "Konfirmasi",
					text: "Kosongkan Data Peserta?",
					type: "warning",
          icon:"question",
					showCancelButton: true,
					confirmButtonText: "Ya, Hapus!",
					cancelButtonText: "Tidak, Batalkan!",
					closeOnConfirm: true,
					closeOnCancel: false
				}, function(isConfirm) {
				if (isConfirm) 
				{
					$.ajax({
						type:"POST",
						url:"siswa_simpan.php",
						data: "aksi=kosong",
						success: function(data){					
							toastr.success(data);
						}
					})
				}
				else 
				{
					swal("Informasi", "Data Peserta Ujian Batal Dihapus!", "info");
				}
			});
	})
  
</script>