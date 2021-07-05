<?php
require_once ('../assets/library/fpdf/fpdf.php');
include "dbfunction.php";
class PDF extends FPDF{
	function Header()
	{
		global $conn;
		$setid=viewdata('tb_thpel','aktif','Y')[0];
		$thpel=substr($setid['nmthpel'],0,9);

		$ad = viewdata('tb_skul')[0];
		$nmskul = $ad['nmskul'];
		$skpd =$ad['skpd'];
		$almt =$ad['alamat'];
		$kab=$ad['kab'];
		$prov=$ad['prov'];
		$logskpd = $ad['logoskpd'];
		$logsek = $ad['logo'];
		if ($logskpd=='')
		{
			$logskpd='../assets/img/tutwuri.png';
		}
		else
		{
			$logskpd ='../images/'.$logskpd;
		}
		if ($logsek=='')
		{
			$logo='../assets/img/tutwuri.png';
		}
		else
		{
			$logo='../images/'.$logsek;
		}
		$this->Image($logskpd,1.0,0.65,1.0);
		$this->Image($logo,30.65,0.65,1.25); 
		$this->SetTextColor(0,0,0);
		$this->SetFont('Times','B','12');
		$this->Cell(1.5,0.5,'');
		$this->Cell(28,0.5,strtoupper('pemerintah kabupaten '.$ad['kab']),0,0,'C');
		$this->Ln(0.5);
		$this->Cell(1.5,0.5,'');
		$this->Cell(28,0.5,strtoupper($ad['skpd']),0,0,'C');
		$this->Ln(0.5);
		$this->SetFont('Times','B','13');
		$this->Cell(1.5,0.5,'');
		$this->Cell(28,0.5,strtoupper($nmskul),0,0,'C');
		$this->Ln(0.5);
		$this->SetFont('Times','','11');
		$this->Cell(1.5,0.5,'');
		$this->Cell(28,0.5,ucwords(strtolower($ad['alamat'].', desa '.$ad['desa'].', Kecamatan '.$ad['kec'].', Kabupaten '.$kab.', Provinsi '.$prov)),0,0,'C');
		$this->SetLineWidth(0.050);
		$this->Line(0.5,2.85,32.5,2.85);
		$this->SetLineWidth(0.0025);
		$this->Line(0.5,2.95,32.5,2.95);
		$this->Ln(1.2);
		$this->Cell(1.5,0.6,'');
		$this->Cell(28,0.6,'LAPORAN HASIL SELEKSI PENERIMAAN PESERTA DIDIK BARU (PPDB)',0,0,'C');
		$this->Ln();
		$this->Cell(1.5,0.6,'');
		$this->Cell(28,0.6,'TAHUN PELAJARAN '.$thpel,0,0,'C');
		$this->Ln(1.2);		
		$this->SetFont('Times','B','10');
		$this->SetLineWidth(0.005);
		$this->Cell(0.65,1.0,'No.','LTBR',0,'C');
		$this->Cell(2.0,1.0,'N I S N','LTBR',0,'C');
		$this->Cell(6.0,1.0,'Nama Lengkap','LTBR',0,'C');
		$this->Cell(5.7,1.0,'Tempat dan Tanggal Lahir','LTBR',0,'C');
		$this->Cell(0.75,1.0,'L/P','LTBR',0,'C');
		$this->Cell(1.5,1.0,'Agama','LTBR',0,'C');
		$this->Cell(3.8,0.5,'Nama','LTR',0,'C');
		$this->Cell(1.7,0.5,'Jumlah','LTR',0,'C');
		$this->Cell(2.0,1.0,'Umur','LTBR',0,'C');
		$this->Cell(5,1.0,'SD/MI Asal','LTBR',0,'C');
		$this->Cell(2,1.0,'KET','LTBR',0,'C');
		$this->Ln(0.5);
		$this->Cell(16.6,0.5);
		$this->Cell(3.8,0.5,'Orang Tua / Wali','LBR',0,'C');
		$this->Cell(1.7,0.5,'Nilai US','LBR',0,'C');
		$this->Ln(0.5);

	}

	function Footer()
	{
		global $conn;
		$this->SetY(-1.25,6); 
		$this->Cell(31.0,0.60, 'Halaman '.$this->PageNo(),0,0,'R');
	} 
}
	 
	$pdf = new PDF('L','cm',array(21.59,33.0));
	$pdf->SetAutoPageBreak(true,3.0);
	$pdf->SetMargins(1.0,0.65,1.0,1.0);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetLineWidth(0.015);
	$pdf->SetFont('Times','','10');
	$row=viewdata("tb_thpel","aktif","Y")[0];
	$awal=$row['awal'];

	$no=0;
	$terima=0;
	$tolak=0; 
	$rows=viewdata('v_calsis','','',"kabeh DESC,tgllhr ASC");
	foreach ($rows as $row)
	{
		$no++;
		switch ($row['agama'])
		{
			case 'A': {$agama='Islam';break;} case 'B': {$agama='Kristen';break;}
			case 'C': {$agama='Katholik';break;} case 'D': {$agama='Hindu';break;}
			case 'E': {$agama='Buddha';break;} case 'F': {$agama='Konghucu';break;}
		}
		
		$lahir = new DateTime($row['tgllhr']);
		$batas = new DateTime($awal);
		$diff = $lahir->diff($batas);
		$umur = $diff->y+($diff->m)/12;
	
		$usia=$diff->y.' th '.substr('0'.$diff->m,-2).' bl';
		
		if($umur==0) {$hsl=' ';} else if($umur >=11 && $umur <= 15) {$hsl = 'Diterima';$terima++;} else {$hsl ='-';$tolak++;}
		$pdf->Cell(0.65,0.60,$no.'.','LTBR',0,'C');
		$pdf->Cell(2.0,0.60,$row['nisn'],'LTBR',0,'C');
		$pdf->Cell(6.0,0.60,ucwords(strtolower($row['nama'])),'LTBR',0,'L');
		$pdf->Cell(5.7,0.60,ucwords(strtolower($row['tmplhr'])).', '.indonesian_date($row['tgllhr']),'LTBR',0,'L');
		$pdf->Cell(0.75,0.60,$row['gender'],'LTBR',0,'C');
		$pdf->Cell(1.5,0.60,$agama,'LTBR',0,'C');
		$pdf->Cell(3.8,0.60,ucwords(strtolower($row['nmwali'])),'LTBR',0,'L');
		if($row['kabeh']==0){
		$pdf->Cell(1.7,0.60,'-','LTBR',0,'C');
		}
		else{
			$pdf->Cell(1.7,0.60,number_format($row['kabeh'],1,',','.'),'LTBR',0,'C');
		}
		$pdf->Cell(2.0,0.60,$usia,'LTBR',0,'C');
		$pdf->Cell(5.0,0.60,' '.$row['asl'],'LTBR',0,'L');
		$pdf->Cell(2.0,0.60,' '.$hsl,'LTBR',0,'L');
		$pdf->Ln();
	}
	
	$rl = cekdata('v_calsis','gender','L');
	$rp = cekdata('v_calsis','gender','P');
	$rs = $rl + $rp;
	$tam =viewdata("v_pagu")[0];
	$js=$tam['jsiswa'];
	$jr = $tam['jrombel']; 
	$dt=$js*$jr;
	$pdf->SetFont('Times','B','11');
	$pdf->Ln(0.25);
	$pdf->Cell(10.5,0.5,'RENCANA PENERIMAAN','LT',0,'L');
	$pdf->Cell(10.5,0.5,'REKAP PENDAFTAR','T',0,'L');
	$pdf->Cell(10.1,0.5,'REKAP PENERIMAAN','TR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Times','','11');
	$pdf->Cell(5.75,0.5,'Jumlah Rombel','L',0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$jr.' Rombel',0,0,'L');
	$pdf->Cell(5.75,0.5,'Calon Peserta Didik Laki-laki',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$rl.' Peserta Didik',0,0,'L');
	$pdf->Cell(5.85,0.5,'Calon Peserta Didik Diterima',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.0,0.5,$terima.' Peserta Didik','R',0,'L');
	$pdf->Ln();
	$pdf->Cell(5.75,0.5,'Jumlah Peserta Didik Per Rombel','L',0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$js.' Peserta Didik',0,0,'L');
	$pdf->Cell(5.75,0.5,'Calon Peserta Didik Perempuan',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$rp.' Peserta Didik',0,0,'L');
	$pdf->Cell(5.85,0.5,'Calon Peserta Didik Tidak Diterima',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.0,0.5,$tolak.' Peserta Didik','R',0,'L');
	$pdf->Ln();
	$pdf->Cell(5.75,0.5,'Daya Tampung','LB',0,'L');
	$pdf->Cell(0.25,0.5,':','B',0,'L');
	$pdf->Cell(4.5,0.5,$dt.' Peserta Didik','B',0,'L');
	$pdf->Cell(5.75,0.5,'Jumlah Pendaftar','B',0,'L');
	$pdf->Cell(0.25,0.5,':','B',0,'L');
	$pdf->Cell(4.5,0.5,$rs.' Peserta Didik','B',0,'L');
	$pdf->Cell(5.85,0.5,'Jumlah Seluruhnya','B',0,'L');
	$pdf->Cell(0.25,0.5,':','B',0,'L');
	$pdf->Cell(4.0,0.5,$rs.' Peserta Didik','BR',0,'L');
	$pdf->Ln(0.65);
	$pdf->SetFont('Times','B','11');
	$pdf->Cell(10.5,0.65,'CATATAN:',0,0,'L');
	$pdf->SetFont('Times','','11');
	$pdf->Ln();
	$dh=viewdata("v_dasarhukum")[0];
	$pdf->MultiCell(31.0,0.5,'Calon Peserta didik dinyatakan diterima di kelas 7 (tujuh) SMP setelah memenuhi persyaratan dalam '.$dh['nmhkm'].' '.$dh['nmpasal'].', yaitu:');
	$pdf->MultiCell(31.0,0.5, 'a. berusia paling tinggi 15 (lima belas) tahun pada tanggal 1 Juli tahun berjalan; dan');
	$pdf->MultiCell(31.0,0.5,'b. memiliki ijazah SD/sederajat atau dokumen lain yang menjelaskan telah menyelesaikan kelas 6 (enam) SD.');
	$pdf->Ln();
	$ad = viewdata('tb_user','jbtdinas','1')[0];
	$kepsek = $ad['nama'];
	$nipkepsek = $ad['nip'];
	$desa = $ad['desa'];
	if($_GET['m']=='1'){
		$tempat=$desa;
		$tgl=date('Y-m-d');
		$disahkan='Mengetahui:';
		$jbt='Kepala Sekolah';
		$nmjbt=$kepsek;
		$nipjbt=$nipkepsek;
		$diketahui='';
		$jbt1='';
		$nmjbt1='';
		$nipjbt1='';
		$panitia='Ketua Panitia';
		$sql=mysqli_query($conn, "SELECT nama, nip FROM tb_user WHERE jbtpanitia='2'");
		$u=mysqli_fetch_array($sql);
		$ketua=$u['nama'];
		$nip=$u['nip'];
		if($nip=='Non PNS' || $nip=='' || $nip==null){$nipnya=''; } else {$nipnya='NIP. '.$u['nip'];}
	}
	else {
		$sqlu=mysqli_query($conn, "SELECT se.* FROM tb_seleksi se INNER JOIN tb_thpel tp ON tp.kdthpel=se.kdtpel WHERE tp.aktif='Y'");
		$ceksel=mysqli_num_rows($sqlu);
		if($ceksel>0){
			$disahkan='Mengesahkan:';
			$diketahui='Mengetahui:';
			$panitia='Ketua Panitia';
			$row = mysqli_fetch_array($sqlu);
			$tempat=$row['tmpseleksi'];
			$tgl=$row['tglseleksi'];
			$jbt=$row['jbtlegalisasi'];
			$nmjbt=$row['nmlegalisasi'];
			$nipjbt=$row['niplegalisasi'];
			$sqlp=mysqli_query($conn,"SELECT nama as nmpanitia, nip as nippanitia FROM tb_user WHERE jbtpanitia='2'");
			$p=mysqli_fetch_array($sqlp);
			$ketua=$p['nmpanitia'];
			$nip=$p['nippanitia'];
			if($nip=='Non PNS' || $nip=='' || $nip==null){$nipnya='';}
			else {$nipnya='NIP. '.$nip;}
			$jbt1='Kepala Sekolah,';
			$nmjbt1=$kepsek;
			$nipjbt1='NIP. '.$nipkepsek;
		}
		else {
			$diketahui='Mengetahui:';
			$panitia='Ketua Panitia';
			$pdf->Cell(10.5,0.5,$diketahui,0,0,'C');
			$pdf->Cell(10.5,0.5);
			$pdf->Cell(10.5,0.5,$tempat.', '.indonesian_date($tgl),0,0,'C');
			$pdf->Ln(0.5);
			$pdf->Cell(10.5,0.5,$jbt.',',0,0,'C');
			$pdf->Cell(10.5,0.5);
			$pdf->Cell(10.5,0.5,$panitia.',',0,0,'C');
			$pdf->Ln(1.5);
			$pdf->Cell(10.5,0.5,$nmjbt,0,0,'C');
			$pdf->Cell(10.5,0.5,$nmjbt1,0,0,'C');
			$pdf->Cell(10.5,0.5,$ketua,0,0,'C');
			$pdf->Ln(0.5); 
			$pdf->Cell(10.5,0.65,'NIP. '.$nipjbt,0,0,'C');
			$pdf->Cell(10.5,0.5,$nipjbt1,0,0,'C');
			$pdf->Cell(10.5,0.5,$nipnya,0,0,'C');
		$pdf->Ln(0.5);
		}

	}
	$sqlj=mysqli_query($conn, "SELECT jbtlegalisasi FROM tb_seleksi WHERE jbtlegalisasi LIKE 'Kepala Dinas%'");
	$cekj = mysqli_num_rows($sqlj);
	if($cekj==0)
	{
		$pdf->Cell(10.5,0.5,$disahkan,0,0,'C');
		$pdf->Cell(10.5,0.5,'',0,0,'C');
		$pdf->Cell(10.5,0.5);
		$pdf->Ln(0.5);
		$pdf->Cell(10.5,0.5,'a.n Kepala Dinas Pendidikan dan Kebudayaan',0,0,'C');
		$pdf->Cell(10.5,0.5,$diketahui,0,0,'C');
		$pdf->Cell(10.5,0.5,$tempat.', '.indonesian_date($tgl),0,0,'C');
		$pdf->Ln(0.5);
		$pdf->Cell(10.5,0.5,$jbt.',',0,0,'C');
		$pdf->Cell(10.5,0.5,$jbt1,0,0,'C');
		$pdf->Cell(10.5,0.5,$panitia.',',0,0,'C');
		$pdf->Ln(1.5);
		$pdf->Cell(10.5,0.5,$nmjbt,0,0,'C');
		$pdf->Cell(10.5,0.5,$nmjbt1,0,0,'C');
		$pdf->Cell(10.5,0.5,$ketua,0,0,'C');
		$pdf->Ln(0.5); 
		$pdf->Cell(10.5,0.65,'NIP. '.$nipjbt,0,0,'C');
		$pdf->Cell(10.5,0.5,$nipjbt1,0,0,'C');
		$pdf->Cell(10.5,0.5,$nipnya,0,0,'C');
		$pdf->Ln(0.5);
	}
	else
	{
		$pdf->Cell(10.5,0.5,$disahkan,0,0,'C');
		$pdf->Cell(10.5,0.5,$diketahui,0,0,'C');
		$pdf->Cell(10.5,0.5,$tempat.', '.indonesian_date($tgl),0,0,'C');
		$pdf->Ln(0.5);
		$pdf->Cell(10.5,0.5,$jbt.',',0,0,'C');
		$pdf->Cell(10.5,0.5,$jbt1,0,0,'C');
		$pdf->Cell(10.5,0.5,$panitia.',',0,0,'C');
		$pdf->Ln(1.5);
		$pdf->Cell(10.5,0.5,$nmjbt,0,0,'C');
		$pdf->Cell(10.5,0.5,$nmjbt1,0,0,'C');
		$pdf->Cell(10.5,0.5,$ketua,0,0,'C');
		$pdf->Ln(0.5); 
		$pdf->Cell(10.5,0.65,'NIP. '.$nipjbt,0,0,'C');
		$pdf->Cell(10.5,0.5,$nipjbt1,0,0,'C');
		$pdf->Cell(10.5,0.5,$nipnya,0,0,'C');
		$pdf->Ln(0.5);
	}
	$pdf->Output();
?>