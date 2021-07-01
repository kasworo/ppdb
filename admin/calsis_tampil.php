<?php
if($level=='1') {
?>
<script type="text/javascript">
$(document).ready(function () {
	bsCustomFileInput.init();
});
</script>
<?php if(!empty($_GET['d']) && $_GET['d']=='1'){include "siswa_upload.php";}?>
<div class="modal fade" id="myImportSiswa" aria-modal="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form action="?p=datasiswa&d=1" method="POST" enctype="multipart/form-data">
				<div class="modal-header">
					<h5 class="modal-title">Import Data Peserta Didik</h5>
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
          <a href="calsis_template.php" class="btn btn-success btn-sm btn-flat" target="_blank"><i class="fas fa-download"></i> Download</a>
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
            <h4 class="card-title">Data Calon Peserta Didik</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <a href="index.php?p=addsiswa&m=1" class="btn btn-flat btn-primary btn-sm" id="btnTambah">
                        <i class="fas fa-plus-circle"></i>&nbsp;Tambah
                    </a>
                    <button class="btn btn-flat btn-info btn-sm">
                        <i class="fas fa-sync-alt"></i>&nbsp;Refresh
                    </button>
                    <button class="btn btn-flat btn-success btn-sm" data-toggle="modal" data-target="#myImportSiswa">
                        <i class="fas fa-cloud-upload-alt"></i>&nbsp;Export / Import
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
                  <th style="text-align: center;width:5%">No.</th>
                  <th style="text-align: center;width:20%">Nama Siswa</th>
                  <th style="text-align: center;width:7.5%">NISN</th>
                  <th style="text-align: center;width:12.5%">Tempat Lahir</th>
                  <th style="text-align: center;width:17.5%">Tanggal Lahir</th>
                  <th style="text-align: center;width:2.5%">L/P</th>
                  <th style="text-align: center;width:15%">Nama Orang Tua</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $qs=viewdata("v_calsis");
                    $no=0;
                   foreach($qs as $s)
                    {
                        $no++;
                ?>
                <tr>
                  <td style="text-align: center"><?php echo substr($s['nopend'],-3).'.';?></td>
                  <td><?php echo ucwords(strtolower($s['nama']));?></td>
                  <td><?php echo $s['nisn'];?></td>
                  <td><?php echo ucwords(strtolower($s['tmplhr']));?></td>
                  <td><?php echo indonesian_date($s['tgllhr']);?></td>
                  <td style="text-align:center"><?php echo $s['gender'];?></td>
                  <td><?php echo ucwords(strtolower($s['nmwali']));?></td>
                  <td style="text-align: center">
                    <a href="index.php?p=addsiswa&m=2&id=<?php echo base64_encode($s['idcalsis']);?>" class="btn btn-xs btn-success btn-flat">
                        <i class="fas fa-edit"></i>&nbsp;Edit
                    </a>
                    <button data-id="<?php echo base64_encode($s['idcalsis']);?>" class="btn btn-xs btn-danger btn-flat btnHapus">
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
  $(".btnHapus").click(function(){
    var id=$(this).data('id');
    Swal.fire({
      title: 'Anda Yakin?',
      text: "Menghapus Calon Peserta Didik",
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
						url:"calsis_simpan.php",
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
      text: "Menghapus Calon Peserta Didik",
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
						url:"calsis_simpan.php",
						data: "aksi=kosong",
						success: function(data){					
							toastr.success(data);
						}
				})
      }
    })
	})  
</script>
<?php } else { ?>    
<div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Data Calon Peserta Didik</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <a href="index.php?p=addsiswa&m=1" class="btn btn-flat btn-primary btn-sm" id="btnTambah">
                        <i class="fas fa-plus-circle"></i>&nbsp;Tambah
                    </a>
                    <button class="btn btn-flat btn-info btn-sm">
                        <i class="fas fa-sync-alt"></i>&nbsp;Refresh
                    </button>
                </div>
            </div>
            <br/>
            <div class="table-responsive">
              <table id="tb_siswa" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                  <th style="text-align: center;width:2.5%">No.</th>
                  <th style="text-align: center;width:22.5%">Nama Siswa</th>
                  <th style="text-align: center;width:7.5%">NISN</th>
                  <th style="text-align: center;width:15%">Tempat Lahir</th>
                  <th style="text-align: center;width:15%">Tanggal Lahir</th>
                  <th style="text-align: center;width:2.5%">L/P</th>
                  <th style="text-align: center;width:17.5%">Nama Orang Tua</th>
                  <th style="text-align: center">Aksi</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $qs=mysqli_query($sqlconn,"SELECT s.nopend, s.nisn, s.nama,s.tmplhr, s.tgllhr, s.gender, nmwali FROM tb_calsis s LEFT JOIN tb_ortu w ON w.nopend=s.nopend WHERE deleted='0' AND kdthpel='$_COOKIE[c_tahun]'");
                    $no=0;
                    while($s=mysqli_fetch_array($qs))
                    {
                        $no++;
                ?>
                <tr>
                  <td style="text-align: center"><?php echo $no.'.';?></td>
                  <td><?php echo ucwords(strtolower($s['nama']));?></td>
                  <td><?php echo $s['nisn'];?></td>
                  <td><?php echo ucwords(strtolower($s['tmplhr']));?></td>
                  <td><?php echo indonesian_date($s['tgllhr']);?></td>
                  <td style="text-align:center"><?php echo $s['gender'];?></td>
                  <td><?php echo ucwords(strtolower($s['nmwali']));?></td>
                  <td style="text-align: center">
                    <a href="index.php?p=addsiswa&m=3&id=<?php echo base64_encode($s['nopend']);?>" class="btn btn-xs btn-success btn-flat">
                        <i class="fas fa-edit"></i>&nbsp;Edit
                    </a>
                    <button data-id="<?php echo base64_encode($s['nopend']);?>" class="btn btn-xs btn-danger btn-flat btnHapus">
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
  $(".btnHapus").click(function(){
    var id=$(this).data('id');
    Swal.fire({
      title: 'Anda Yakin?',
      text: "Menghapus Calon Peserta Didik",
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
						url:"calsis_simpan.php",
						data: "aksi=hapus&id="+id,
						success: function(data){					
							toastr.success(data);
						}
				})
        window.location.reload();
      }
    })
  })
</script>
<?php } ?>