<div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Data Kelengkapan Berkas Calon Peserta Didik</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <a href="index.php?p=ceklisberkas" class="btn btn-flat btn-primary btn-sm" id="btnTambah">
                        <i class="fas fa-check-circle"></i>&nbsp;Cek Bukti Fisik
                    </a>
                    <button class="btn btn-flat btn-info btn-sm">
                        <i class="fas fa-sync-alt"></i>&nbsp;Refresh
                    </button>
                    <a href="index.php?p=berkasupload" class="btn btn-flat btn-success btn-sm">
                        <i class="fas fa-cloud-upload-alt"></i>&nbsp;Upload
                    </a>
                    <button id="hapusall" class="btn btn-flat btn-danger btn-sm">
                        <i class="fas fa-trash-alt"></i>&nbsp;Hapus
                    </button>
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
                  <th style="text-align: center;width:10%">Foto</th>
                  <th style="text-align: center;width:10%">Akte</th>
                  <th style="text-align: center;width:10%">KK</th>
                  <th style="text-align: center;width:10%">SKHU</th>
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
                        if($s['foto']==''){$foto='Belum Upload';$btn='badge-danger';}
                        else {$foto='Sudah Upload';$btn='badge-success';}
                        
                        $qkk=mysqli_query($sqlconn, "SELECT jnsberkas, fileberkas FROM tb_berkas WHERE nopend='$s[nopend]' AND jnsberkas='1'");
                        $k=mysqli_fetch_array($qkk);
                        if($k['fileberkas']==''){$akte='Belum Upload';$btakte='badge-danger';}
                        else {$akte='Sudah Upload';$btakte='badge-success';}
                        
                        $qskhu=mysqli_query($sqlconn, "SELECT jnsberkas, fileberkas FROM tb_berkas WHERE nopend='$s[nopend]' AND jnsberkas='2'");
                        $sk=mysqli_fetch_array($qskhu);
                        if($sk['fileberkas']==''){$skhu='Belum Upload';$btskhu='badge-danger';}
                        else {$skhu='Sudah Upload';$btskhu='badge-success';}
                        
                        $qrapor=mysqli_query($sqlconn, "SELECT jnsberkas, fileberkas FROM tb_berkas WHERE nopend='$s[nopend]' AND jnsberkas='3'");
                        $rp=mysqli_fetch_array($qrapor);
                        if($rp['fileberkas']==''){$rapor='Belum Upload';$btrapor='badge-danger';}
                        else {$rapor='Sudah Upload';$btrapor='badge-success';}
                ?>
                <tr>
                  <td style="text-align: center"><?php echo $no.'.';?></td>
                  <td><?php echo ucwords(strtolower($s['nama']));?></td>
                  <td style="text-align:center"><?php echo $s['nisn'];?></td>
                  <td style="text-align:center">
                    <badge class="badge <?php echo $btn;?>"><?php echo $foto;?></badge>
                  </td>
                  <td style="text-align:center">
                    <badge class="badge <?php echo $btakte;?>"><?php echo $akte;?></badge>
                  </td>
                  <td style="text-align:center">
                    <badge class="badge <?php echo $btskhu;?>"><?php echo $skhu;?></badge>
                  </td>
                  <td style="text-align:center">
                    <badge class="badge <?php echo $btrapor;?>"><?php echo $rapor;?></badge>
                  </td>
                  <td style="text-align: center">
                    <a href="index.php?p=addupload&m=2&id=<?php echo base64_encode($s['nopend']);?>" class="btn btn-xs btn-success btn-flat">
                        <i class="fas fa-upload"></i>&nbsp;Upload
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