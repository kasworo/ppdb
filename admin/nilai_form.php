<?php
$id=base64_decode($_REQUEST['id']);
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
						$qnil=mysqli_query($sqlconn, "SELECT*FROM tb_mapel");
						while($n=mysqli_fetch_array($qnil))
						{
							$no++;
						?>
							<div class="row" style="padding-bottom:5px">
								<label class="col-sm-4"><?php echo $n['nmmapel'];?></label>
								<div class="col-sm-1" style="padding-bottom:5px">
									<?php
										$q1=mysqli_query($sqlconn,"SELECT nilai FROM tb_nilai WHERE semester='1' AND jns='1' AND kdmapel='$n[kdmapel]' AND nopend='$id'");
										$row=mysqli_fetch_array($q1);
									?>
									<input class="form-control form-control-sm" id="nilai1<?php echo $n['kdmapel'];?>" style="text-align:center" placeholder="Sms 1" value="<?php echo $row['nilai'];?>"/>
								</div>
								<div class="col-sm-1" style="padding-bottom:5px">
									<?php
										$q1=mysqli_query($sqlconn,"SELECT nilai FROM tb_nilai WHERE semester='2' AND jns='1' AND  kdmapel='$n[kdmapel]' AND nopend='$id'");
										$row1=mysqli_fetch_array($q1);
									?>
									<input class="form-control form-control-sm col-xs-8" id="nilai2<?php echo $n['kdmapel'];?>" style="text-align:center" placeholder="Sms 2" value="<?php echo $row1['nilai'];?>"/>
								</div>
								<div class="col-sm-1" style="padding-bottom:5px">
									<?php
										$q2=mysqli_query($sqlconn,"SELECT nilai FROM tb_nilai WHERE semester='3' AND jns='1' AND  kdmapel='$n[kdmapel]' AND nopend='$id'");
										$row2=mysqli_fetch_array($q2);
									?>
									<input class="form-control form-control-sm" id="nilai3<?php echo $n['kdmapel'];?>" style="text-align:center" placeholder="Sms 3" value="<?php echo $row2['nilai'];?>"/>
								</div>
								<div class="col-sm-1" style="padding-bottom:5px">
									<?php
										$q3=mysqli_query($sqlconn,"SELECT nilai FROM tb_nilai WHERE semester='4' AND jns='1' AND  kdmapel='$n[kdmapel]' AND nopend='$id'");
										$row3=mysqli_fetch_array($q3);
									?>
									<input class="form-control form-control-sm" id="nilai4<?php echo $n['kdmapel'];?>" style="text-align:center" placeholder="Sms 4" value="<?php echo $row3['nilai'];?>"/>
								</div>
								<div class="col-sm-1" style="padding-bottom:5px">
									<?php
										$q4=mysqli_query($sqlconn,"SELECT nilai FROM tb_nilai WHERE semester='5' AND jns='1' AND  kdmapel='$n[kdmapel]' AND nopend='$id'");
										$row4=mysqli_fetch_array($q4);
									?>
									<input class="form-control form-control-sm" id="nilai5<?php echo $n['kdmapel'];?>" style="text-align:center" placeholder="Sms 5" value="<?php echo $row4['nilai'];?>"/>
								</div>
								<div class="col-sm-1" style="padding-bottom:5px">
									<?php
										$q5=mysqli_query($sqlconn,"SELECT nilai FROM tb_nilai WHERE semester='6' AND jns='1' AND  kdmapel='$n[kdmapel]' AND nopend='$id'");
										$row5=mysqli_fetch_array($q5);
									?>
									<input class="form-control form-control-sm" id="nilai6<?php echo $n['kdmapel'];?>" style="text-align:center" placeholder="Sms 6" value="<?php echo $row5['nilai'];?>"/>
								</div>
								<div class="col-sm-1" style="padding-bottom:5px">
									<?php
										$qus=mysqli_query($sqlconn,"SELECT nilai FROM tb_nilai WHERE semester='6' AND jns='2' AND  kdmapel='$n[kdmapel]' AND nopend='$id'");
										$rus=mysqli_fetch_array($qus);
									?>
									<input class="form-control form-control-sm" id="nilaius<?php echo $n['kdmapel'];?>" style="text-align:center" placeholder="Nilai US" value="<?php echo $rus['nilai'];?>"/>
								</div>
							</div>
							<script type="text/javascript">								
								$("#nilai1<?php echo $n['kdmapel'];?>").change(function(){
									var kdmapel = "<?php echo $n['kdmapel'];?>";
									var nopend = "<?php echo base64_encode($id);?>";
									var nilai = $("#nilai1<?php echo $n['kdmapel'];?>").val();
									$.ajax({
										url: "nilai_simpan.php",
										type:"POST",
										data: "jns=1&semester=1"+"&kdmapel="+kdmapel+"&nopend="+nopend + "&nilai="+nilai,
										cache: false,
										success: function(){
											toastr.success(data);
										}
									});
								})

								$("#nilai2<?php echo $n['kdmapel'];?>").change(function(){
									var kdmapel = "<?php echo $n['kdmapel'];?>";
									var nopend = "<?php echo base64_encode($id);?>";
									var nilai = $("#nilai2<?php echo $n['kdmapel'];?>").val();
									$.ajax({
										url: "nilai_simpan.php",
										type:"POST",
										data: "jns=1&semester=2"+"&kdmapel="+kdmapel+"&nopend="+nopend + "&nilai="+nilai,
										cache: false,
										success: function(){
											toastr.success(data);
										}
									});
								})

								$("#nilai3<?php echo $n['kdmapel'];?>").change(function(){
									var kdmapel = "<?php echo $n['kdmapel'];?>";
									var nopend = "<?php echo base64_encode($id);?>";
									var nilai = $("#nilai3<?php echo $n['kdmapel'];?>").val();
									$.ajax({
										url: "nilai_simpan.php",
										type:"POST",
										data: "jns=1&semester=3"+"&kdmapel="+kdmapel+"&nopend="+nopend + "&nilai="+nilai,
										cache: false,
										success: function(){
											toastr.success(data);
										}
									});
								})
								$("#nilai4<?php echo $n['kdmapel'];?>").change(function(){
									var kdmapel = "<?php echo $n['kdmapel'];?>";
									var nopend = "<?php echo base64_encode($id);?>";
									var nilai = $("#nilai4<?php echo $n['kdmapel'];?>").val();
									$.ajax({
										url: "nilai_simpan.php",
										type:"POST",
										data: "jns=1&semester=4"+"&kdmapel="+kdmapel+"&nopend="+nopend + "&nilai="+nilai,
										cache: false,
										success: function(){
											toastr.success(data);
										}
									});
								})
								$("#nilai5<?php echo $n['kdmapel'];?>").change(function(){
									var kdmapel = "<?php echo $n['kdmapel'];?>";
									var nopend = "<?php echo base64_encode($id);?>";
									var nilai = $("#nilai5<?php echo $n['kdmapel'];?>").val();
									$.ajax({
										url: "nilai_simpan.php",
										type:"POST",
										data: "jns=1&semester=5"+"&kdmapel="+kdmapel+"&nopend="+nopend + "&nilai="+nilai,
										cache: false,
										success: function(){
											toastr.success(data);
										}
									});
								})
								$("#nilai6<?php echo $n['kdmapel'];?>").change(function(){
									var kdmapel = "<?php echo $n['kdmapel'];?>";
									var nopend = "<?php echo base64_encode($id);?>";
									var nilai = $("#nilai6<?php echo $n['kdmapel'];?>").val();
									$.ajax({
										url: "nilai_simpan.php",
										type:"POST",
										data: "jns=1&semester=6"+"&kdmapel="+kdmapel+"&nopend="+nopend + "&nilai="+nilai,
										cache: false,
										success: function(){
											toastr.success(data);
										}
									});
								})
								$("#nilaius<?php echo $n['kdmapel'];?>").change(function(){
									var kdmapel = "<?php echo $n['kdmapel'];?>";
									var nopend = "<?php echo base64_encode($id);?>";
									var nilai = $("#nilaius<?php echo $n['kdmapel'];?>").val();
									$.ajax({
										url: "nilai_simpan.php",
										type:"POST",
										data: "jns=2&semester=6"+"&kdmapel="+kdmapel+"&nopend="+nopend + "&nilai="+nilai,
										cache: false,
										success: function(data){
											toastr.success(data);
											//alert(data);
										}
									});
								})
							</script>	
						<?php } ?>
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