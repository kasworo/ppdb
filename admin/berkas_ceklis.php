<?php
?>
<div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Cek Bukti Fisik Berkas Calon Peserta Didik</h4>
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
              <table id="tb_berkas" class="table table-bordered table-striped table-sm">
                <thead>
                <tr>
                  <th style="text-align: center;width:2.5%">No.</th>
                  <th style="text-align: center;width:25%">Nama Siswa</th>
                  <th style="text-align: center;width:10%">NISN</th>
                  <?php
                    $qsy=viewdata("v_syarat");
                    foreach($qsy as $sy){
                  ?>
                    <th style="text-align: center;width:10%"><?php echo $sy['aksyarat'];?></th>
                  <?php } ?>
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
                  <td style="text-align: center"><?php echo $no.'.';?></td>
                  <td><?php echo ucwords(strtolower($s['nama']));?></td>
                  <td style="text-align:center"><?php echo $s['nisn'];?></td>
                  <?php
                    $qsy=viewdata("v_syarat");
                    $i=0;
                    foreach($qsy as $sy){
                      $i++;
                  ?>
                    <td style="text-align: center">
                      <span class="icheck-primary">
                      <input type="checkbox" id="btnCeklis<?php echo $no.$i;?>" <?php echo $hsl;?>>
								
                      </span>
                    </td>
                    <script type="text/javascript">
									$("#btnCeklis<?php echo $no.$i;?>").click(function(){
										var id="<?php echo $s['idcalsis'];?>";
										var sy="<?php echo $sy['kdsyarat'];?>";
										if ($(this).is(":checked")) {
											nil=1;
										}
										else{
											nil=0;
										}
										$.ajax({
											url:"berkas_simpan.php",
											type:'POST',
											data:"aksi=1&id="+id+"&sy="+sy+"&nil="+nil,
											success:function(data){
												toastr.success(data);
											}
										})										


									})
								</script>
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
  $(function () {
    $('#tb_berkas').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": false,
      "info": false,
      "autoWidth": false,
      "responsive": true,
    });
  });  
</script>