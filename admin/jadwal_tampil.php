<?php
  if($level=='1'){
?>
<div class="modal fade" id="myJadwal" aria-modal="true">
    <div class="modal-dialog">
        <div class="modal-content">
           <div class="modal-header">
                <h5 class="modal-title">Tambah Jadwal PPDB</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="nosk">Kode Jadwal</label>
                        <input class="form-control" id="idjd" name="idjd" disabled>
                    </div>
                    <div class="form-group">
                        <label for="nosk">Dimulai Pada</label>
                        <input class="form-control" id="awaljd" name="awaljd" placeholder="Awal Kegiatan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nosk">Diakhiri Pada</label>
                        <input class="form-control" id="akhirjd" name="akhirjd" placeholder="Akhir Kegiatan" autocomplete="off">
                    </div>
                    <div class="form-group">
                        <label for="nosk">Uraian Kegiatan</label>
                        <textarea class="form-control" id="uraijd" name="uraijd" placeholder="Uraian Kegiatan"></textarea>
                    </div>                        
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button class="btn btn-primary btn-md col-4 btn-flat" id="simpan">
                    <i class="fas fa-save"></i> Simpan
                </button>
                <button class="btn btn-danger btn-md col-4 btn-flat" data-dismiss="modal">
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
            <h4 class="card-title">Pengaturan Jadwal PPDB</h4>
        </div>
        <div class="card-body">            
            <div class="row">
                <div class="col-sm-12">
                    <button class="btn btn-flat btn-success btn-sm" id="btnTambah" data-toggle="modal" data-target="#myJadwal">
                        <i class="fas fa-plus-circle"></i>&nbsp;Tambah
                    </button>
                    <button class="btn btn-flat btn-secondary btn-sm" id="btnrefresh">
                        <i class="fas fa-sync-alt"></i>&nbsp;Refresh
                    </button>
                    <button class="btn btn-flat btn-danger btn-sm" id="btnhapus">
                        <i class="fas fa-trash-alt"></i>&nbsp;Hapus
                    </button>
                </div>
              </div>
            <br/>
            <?php
                $cekjd=cekdata("v_jadwal");
                if($cekjd>0){
            ?>
            <div class="row">
                <table width="100%" class="table-sm table-bordered table-striped" id="tbjadwal">
                    <thead>
                        <th style="text-align:center;width:2.5%">No.</th>
                        <th style="text-align:center;">Uraian Kegiatan</th>
                        <th style="text-align:center;width:17.5%">Awal</th>
                        <th style="text-align:center;width:17.5%">Akhir</th>
                        <th style="text-align:center;width:17.5%">Aksi</th>
                    </thead>
                    <tbody>
                    <?php
                        $qjd=viewdata("v_jadwal");
                        $i=0;
                        foreach($qjd as $jd)
                        {
                            $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo $i,'.';?></td>
                            <td style="text-align:left"><?php echo $jd['kegiatan'];?></td>
                            <td style="text-align:left"><?php echo indonesian_date($jd['awal']).'<br/>'.substr($jd['awal'],11,5).' WIB';?></td>
                            <td style="text-align:left"><?php echo indonesian_date($jd['akhir']).'<br/>'.substr($jd['akhir'],11,5).' WIB';?></td>
                            <td style="text-align:center">
                                <a href="#myJadwal" data-toggle="modal" data-id="<?php echo $jd['kdjadwal'];?>" class="btn btn-xs btn-info editJadwal">
                                    <i class="fas fa-edit"></i>&nbsp;Edit
                                </a>
                                <button data-id="<?php echo $jd['kdjadwal'];?>" class="btn btn-xs btn-danger btnHapus">
                                    <i class="fas fa-trash-alt"></i>&nbsp;Hapus
                                </button>
                            </td>
                        </tr>            
                 <?php } ?>
                    </tbody>
            </table>
        </div>
        <?php } else { ?>
              <div class="alert alert-danger">
                <p>Silahkan Tambahkan Jadwal Dulu!</p>
              </div> 
<?php } ?>
    </div>
</div>
<script type="text/javascript">
  $(document).ready(function(){
    $("#btnTambah").click(function(){
        $(".modal-title").html("Tambah Jadwal PPDB");
        $("#simpan").html("<i class='fas fa-save'></i> Simpan");
        var kdthpel = "<?php echo $_COOKIE['c_tahun'];?>";
			$.ajax({
				url: "jadwal_getid.php",
				data: "kdthpel="+kdthpel,
				cache: false,
				success: function(data){
				 $("#idjd").val(data);
				}
			});
    })
    $('#akhirjd').datetimepicker({
        timepicker:true,
        format: 'Y-m-d H:i:s'
    });
    
    $('#awaljd').datetimepicker({
        timepicker:true,
        format: 'Y-m-d H:i:s'
    })
    
    $(".editJadwal").click(function(){
        $(".modal-title").html("Ubah Jadwal PPDB");
        $("#simpan").html("<i class='fas fa-save'></i> Update");
        var id=$(this).data('id');
        $.ajax({
            url:'jadwal_edit.php',
            type:'post',
            dataType:'json',
            data:'id='+id,
            success:function(data)
            {
                $("#idjd").val(data.kdjadwal);
                $("#awaljd").val(data.awal);
                $("#akhirjd").val(data.akhir);
                $("#uraijd").val(data.kegiatan);
            }
        })
    })
    $("#simpan").click(function(){
        var id=$("#idjd").val();
        var awal =$("#awaljd").val();
        var akhir =$("#akhirjd").val();
        var uraian=$("#uraijd").val();
        if(awal==''){
            toastr.error("Tanggal dan Jam Awal Kegiatan Harus Diisi");
            $("#awaljd").focus();
        }
        else if(akhir==''){
            toastr.error("Tanggal dan Jam Akhir Kegiatan Harus Diisi");
            $("#akhirjd").focus();
        }
        else if (uraian==''){
            toastr.error("Uraian Kegiatan Harus Diisi");
            $("#uraijd").focus();   
        }
        else{
            $.ajax({
                url: "jadwal_simpan.php",
                type:"post",
                data: "id="+id+"&awal="+awal+"&akhir="+akhir+"&uraian="+uraian,
                cache: false,
                success: function(data){
                    toastr.success(data);
                }
            });
        }
    })
    $(".btnHapus").click(function(){
    var id=$(this).data('id');
    Swal.fire({
      title: 'Anda Yakin?',
      text: "Menghapus Jadwal Kegiatan PPDB",
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
						url:"jadwal_simpan.php",
						data: "aksi=hapus&id="+id,
						success: function(data){					
							toastr.success(data);
						}
				})
        window.location.reload();
      }
    })
  })
  $("#btnhapus").click(function(){
    Swal.fire({
      title: 'Anda Yakin?',
      text: "Menghapus Jadwal Kegiatan PPDB",
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
			url:"jadwal_simpan.php",
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
  })  
</script>
<?php } else { ?>
    <div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Pengaturan Jadwal PPDB</h4>
        </div>
        <div class="card-body">            
            <?php
                $qsk=mysqli_query($conn,"SELECT j.* FROM tb_jadwal j INNER JOIN tb_thpel t ON t.kdthpel WHERE t.aktif='Y' ORDER BY awal");
                $ceksk=mysqli_num_rows($qsk);
                if($ceksk>0){
            ?>
            <div class="row">
                <table width="100%" class="table-sm table-bordered table-striped" id="tbjadwal">
                    <thead>
                        <th style="text-align:center;width:2.5%">No.</th>
                        <th style="text-align:center;">Uraian Kegiatan</th>
                        <th style="text-align:center;width:17.5%">Awal</th>
                        <th style="text-align:center;width:17.5%">Akhir</th>
                    </thead>
                    <tbody>
                    <?php
                        $i=0;
                        while($jd=mysqli_fetch_array($qsk))
                        {
                            $i++;
                    ?>
                        <tr>
                            <td style="text-align:center"><?php echo $i,'.';?></td>
                            <td style="text-align:left"><?php echo $jd['kegiatan'];?></td>
                            <td style="text-align:left"><?php echo indonesian_date($jd['awal']).'<br/>'.substr($jd['awal'],11,5).' WIB';?></td>
                            <td style="text-align:left"><?php echo indonesian_date($jd['akhir']).'<br/>'.substr($jd['akhir'],11,5).' WIB';?></td>
                           </tr>            
                 <?php } ?>
                    </tbody>
            </table>
        </div>
        <?php } else { ?>
              <div class="alert alert-danger">
                <p>Silahkan Tambahkan Jadwal Dulu!</p>
              </div> 
<?php } ?>
    </div>
</div>

<?php } ?>
  