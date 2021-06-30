<?php
if(!isset($_COOKIE['c_user'])){header("Location: login.php");}
?>
<div class="col-sm-12">
    <div class="card card-secondary card-outline">
        <div class="card-header">
            <h4 class="card-title">Data Nilai Calon Peserta Didik</h4>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-12">
                    <a href="print_bukti.php?id=<?php echo base64_encode('all');?>" class="btn btn-xs btn-success btn-flat" target="_blank">
                        <i class="fas fa-print"></i>&nbsp;Cetak Bukti
                    </a>
                    <a href="print_formulir.php?id=<?php echo base64_encode('all');?>" class="btn btn-xs btn-primary btn-flat" target="_blank">
                        <i class="fas fa-print"></i>&nbsp;Cetak Formulir
                    </a>
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
                  <th style="text-align: center;width:35%">Sekolah Asal</th>
                  <th style="text-align: center">Cetak</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    $qs=mysqli_query($sqlconn,"SELECT s.nopend, s.nisn, s.nama,s.tmplhr, s.tgllhr, s.gender, nmskulasal FROM tb_calsis s LEFT JOIN tb_skul_asal sa ON sa.idskulasal=s.idskulasal WHERE deleted='0' AND kdthpel='$_COOKIE[c_tahun]'");
                    $no=0;
                    
                    while($s=mysqli_fetch_array($qs))
                    {
                        $no++;
                ?>
                <tr>
                  <td style="text-align: center"><?php echo $no.'.';?></td>
                  <td><?php echo ucwords(strtolower($s['nama']));?></td>
                  <td><?php echo $s['nisn'];?></td>
                  <td><?php echo ($s['nmskulasal']);?></td>
                  <td style="text-align: center">
                    <a href="print_bukti.php?id=<?php echo base64_encode($s['nopend']);?>" class="btn btn-xs btn-success btn-flat" target="_blank">
                        <i class="fas fa-print"></i>&nbsp;Bukti
                    </a>
                    <a href="print_formulir.php?id=<?php echo base64_encode($s['nopend']);?>" class="btn btn-xs btn-primary btn-flat" target="_blank">
                        <i class="fas fa-print"></i>&nbsp;Formulir
                    </a>
                    <a href="print_berkas.php?id=<?php echo base64_encode($s['nopend']);?>" class="btn btn-xs btn-default btn-flat" target="_blank">
                        <i class="fas fa-print"></i>&nbsp;Berkas
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
</script>