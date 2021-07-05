<?php
	$id=base64_decode($_GET['id']);

?>
<div class="alert alert-warning">
	<p><strong>Petunjuk:</strong></p>
	<p>Silahkan lengkapi data nilai calon peserta didik, isilah sesuai dengan keadaan sebenarnya.<br/>Untuk data nilai semester, isikan rata-rata nilai pengetahuan dan keterampilan yang diperoleh tiap semester.</p>
</div>
<div class="card card-primary card-outline">
	<div class="card-header">
		<h5 class="m-0">Form Data Nilai</h5>
	</div>
	<div class="card-body">
		<div class="col-sm-12">
			<?php
				$no=0;
				$rerata=0;
				$qnil=viewdata("tb_mapel");
				foreach($qnil as $n):
				$no++;
			?>
			<div class="form-group row mb-2">
				<label class="col-sm-4"><?php echo $n['nmmapel'];?></label>
				<?php for ($i=1;$i<=6;$i++):?>
				<div class="col-sm-1" style="padding-bottom:5px">
					<?php
						$q1=mysqli_query($conn,"SELECT nilai FROM tb_nilai WHERE semester='$i' AND jns='1' AND kdmapel='$n[kdmapel]' AND idcalsis='$id'");
						$row=mysqli_fetch_array($q1);
					?>
					<input class="form-control form-control-sm " id="rpt<?php echo $no.$i;?>" style="text-align:center" placeholder="Rapor <?php echo $i;?>" value="<?php echo $row['nilai'];?>"/>
				</div>
				<script type="text/javascript">								
					$("#rpt<?php echo $no.$i;?>").change(function(){
						var sem="<?php echo $i;?>";
						var kdmapel = "<?php echo $n['kdmapel'];?>";
						var id = "<?php echo base64_encode($id);?>";
						var nilai = $("#rpt<?php echo $no.$i;?>;?>").val();
						$.ajax({
							url: "nilai_simpan.php",
							type:"POST",
							data: "jns=1&sem="+sem+"&kdmapel="+kdmapel+"&id="+id + "&nilai="+nilai,
							cache: false,
							success: function(e){
								if(e==1){
									toastr.success("Tambah atau Update Nilai Rapor Berhasil!");
								}
								else{
									toastr.error("Tambah atau Update Nilai Rapor Gagal!");
								}
							}
						});
					});
				</script>			
				<?php endfor?>
				<div class="col-sm-1" style="padding-bottom:5px">
				<?php
					$qus=mysqli_query($conn,"SELECT nilai FROM tb_nilai WHERE semester='$i' AND jns='2' AND  kdmapel='$n[kdmapel]' AND idcalsis='$id'");
					$rus=mysqli_fetch_array($qus);
				?>
					<input class="form-control form-control-sm" id="nus<?php echo $no;?>" style="text-align:center" placeholder="Nilai US" value="<?php echo $rus['nilai'];?>"/>
				</div>				
			</div>
			<script type="text/javascript">								
				$("#nus<?php echo $no;?>").change(function(){
					var sem="<?php echo $i;?>";
					var kdmapel = "<?php echo $n['kdmapel'];?>";
					var id= "<?php echo base64_encode($id);?>";
					var nilai = $("#nus<?php echo $no;?>").val();
					$.ajax({
						url: "nilai_simpan.php",
						type:"POST",
						data: "jns=2&sem="+sem+"&kdmapel="+kdmapel+"&id="+id+"&nilai="+nilai,
						cache: false,
						success: function(e){
							if(e==1){
								toastr.success("Tambah atau Update Nilai US Berhasil!");
							}
							else{
								toastr.error("Tambah atau Update Nilai US Gagal!");
							}
						}
					});
				})
			</script>
			<?php endforeach ?>	
			</div>
	</div>
    <div class="card-footer justify-content-between">
		<div class="row">
		<?php if($_REQUEST['m']=='1'){	?>
			<div class="col-sm-3 offset-sm-2">
				<a href="?p=addsiswa&m=3&id=<?php echo base64_encode($id);?>" class="btn btn-secondary btn-md btn-flat btn-block mb-2">
					<i class="fas fa-reply"></i>
					<span>&nbsp;Kembali</span>
				</a>
			</div>
			<div class="col-sm-3">
				<button class="btn btn-info btn-md btn-flat btn-block mb-2" id="simpan">
					<i class="fas fa-fw fa-sync-alt"></i>
					<span>&nbsp;Refresh</span>
				</button> 
			</div>
			<div class="col-sm-3">           
				<a href="?p=addupload&m=1&id=<?php echo base64_encode($id);?>" class="btn btn-success btn-md btn-flat btn-block mb-2">
					<i class="fas fa-fw fa-arrow-right"></i>
					<span>&nbsp;Berikutnya</span>
				</a>
			</div>
		<?php } else { ?>
			<div class="col-sm-3 offset-sm-2">
				<a href="?p=datanilai" class="btn btn-secondary btn-md btn-flat btn-block mb-2">
					<i class="fas fa-reply"></i>
					<span>&nbsp;Kembali</span>
				</a>
			</div>
			<div class="col-sm-3">
				<button class="btn btn-info btn-md btn-flat btn-block mb-2" id="simpan">
					<i class="fas fa-fw fa-sync-alt"></i>
					<span>&nbsp;Refresh</span>
				</button> 
			</div>
			<div class="col-sm-3">           
				<a href="?" class="btn btn-danger btn-md btn-flat btn-block mb-2">
					<i class="fas fa-fw fa-power-off"></i>
					<span>&nbsp;Selesai</span>
				</a>
			</div>
		<?php } ?>		
		</div>
	</div>
</div>
<script type="text/javascript">
	function validAngka(a)
	{
		if(!/^[0-9.]+$/.test(a.value))
		{
			a.value=a.value.substring(0,a.value.length-1000);
		}
	}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(function() {
			const Toast=Swal.mixin({
				toast: true,
				position: 'top-end',
				showConfirmButton: false,
				timer: 3000
			});
			$("#simpan").click(function(){
				
			})
		})
	})
</script>