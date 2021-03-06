<?php
require_once ('../assets/library/fpdf/fpdf.php');
include "dbfunction.php";

class PDF extends FPDF{
	function Header()
	{
	include "../config/konfigurasi.php";
	$sqlsetid=mysqli_query($sqlconn, "SELECT*FROM tb_thpel WHERE aktif='Y'");
	$setid=mysqli_fetch_array($sqlsetid);
	$thpel=substr($setid['nmthpel'],0,9);

	$sqlad = mysqli_query($sqlconn, "SELECT *FROM tb_skul");
	$ad = mysqli_fetch_array($sqlad);
	$nmskul = $ad['nmskul'];
	$skpd =$ad['skpd'];
	$almt =$ad['alamat'];
	$kab=$ad['kab'];
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
	$this->Image($logskpd,1.0,0.65,1.0); // logo
	$this->Image($logo,30.65,0.65,1.25); 
	$this->SetTextColor(0,0,0); // warna tulisan
	$this->SetFont('Times','B','12'); // font yang digunakan
	// membuat cell dg panjang 19 dan align center 'C'
	$this->Cell(1.5,0.6,''); // cell dengan panjang 1
	$this->Cell(28,0.6,strtoupper('pemerintah kabupaten'.$ad['kab']),0,0,'C');
	$this->Ln(0.5);
	$this->Cell(1.5,0.6,''); // cell dengan panjang 1
	$this->Cell(28,0.6,strtoupper($ad['skpd']),0,0,'C');
	$this->Ln(0.5);
	$this->SetFont('Times','B','13');
	$this->Cell(1.5,0.6,''); // cell dengan panjang 1
	$this->Cell(28,0.6,strtoupper($nmskul),0,0,'C');
	$this->Ln(0.5);
	$this->SetFont('Times','','11');
	$this->Cell(1.5,0.6,''); // cell dengan panjang 1
	$this->Cell(28,0.6,ucwords(strtolower($ad['alamat'].', desa '.$ad['desa'].', Kecamatan '.$ad['kec'])),0,0,'C');

	$this->SetLineWidth(0.075);
	$this->Line(0.5,2.75,32.5,2.75);
	$this->Ln(1.0);
	$this->Cell(1.5,0.6,'');
	$this->Cell(28,0.6,'HASIL PENERIMAAN PESERTA DIDIK BARU (PPDB) ONLINE DAN OFFLINE KAB. BUNGO TAHUN 2020' ,0,0,'C');
	$this->Ln(0.6);
	$this->Cell(1.5,0.6,'');
	$this->Cell(28,0.6,strtoupper($nmskul),0,0,'C');
	$this->Ln(1.0);
	$this->SetFont('Times','B','9');
	$this->SetLineWidth(0.005);
	$this->Cell(0.65,0.8,'No.','LTBR',0,'C');
	//$this->Cell(2.0,0.8,'ID Daftar','LTBR',0,'C');
	$this->Cell(3.0,0.8,'N I K','LTBR',0,'C');
	$this->Cell(7.0,0.8,'Nama Calon Peserta Didik','LTBR',0,'C');
	$this->Cell(2.0,0.4,'Jenis','LTR',0,'C');
	$this->Cell(4.0,0.8,'Tanggal Lahir','LTBR',0,'C');
	$this->Cell(5.5,0.4,'Lokasi','LTR',0,'C');
	$this->Cell(2.25,0.4,'Nilai','LTR',0,'C');
	$this->Cell(4.0,0.8,'Zona','LTBR',0,'C');
	$this->Cell(3.0,0.8,'KET','LTBR',0,'C');
	$this->Ln(0.4);
	$this->Cell(10.65,0.4);
	$this->Cell(2.0,0.4,'Kelamin','LBR',0,'C');
	$this->Cell(4.0,0.4);
	$this->Cell(5.5,0.4,'Pendaftaran','LBR',0,'C');
	$this->Cell(2.25,0.4,'Kelulusan','LBR',0,'C');
	$this->Ln(0.45);

	}

	function Footer()
	{
	include "../config/konfigurasi.php";
	$sqlf = mysqli_query($sqlconn, "SELECT*FROM tb_skul");
	$row = mysqli_fetch_array($sqlf);	 
	$this->SetFont('Times','B','10');
	$this->SetY(-1.5,5);
	$this->Rect(1,20,0.75,0.75);
	$this->Rect(2,20,28.25,0.75);
	$this->Rect(30.5,20,0.75,0.75);
	$this->Rect(31.5,20,0.75,0.75); 
	$this->Cell(30.60,0.65,strtoupper($row['skpd'].' kabupaten '.$row['kab']),0,0,'C');
	$this->Cell(0.5,0.65,$this->PageNo(),0,0,'C');
	} 
	}
	 
	$pdf = new PDF('L','cm',array(21.59,33.0));
	//$pdf->SetAutoPageBreak(true,3.0);
	$pdf->SetMargins(1.0,0.65,1.0,1.0);
	$pdf->AliasNbPages();
	$pdf->AddPage();
	$pdf->SetLineWidth(0.005);
	$pdf->SetFont('Times','','10');
	include "../config/konfigurasi.php";
	$aw=mysqli_query($sqlconn,"SELECT awal FROM tb_thpel WHERE kdthpel='$_COOKIE[c_tahun]'");
	$row=mysqli_fetch_array($aw);
	$awal=$row['awal'];
    $sqlad = mysqli_query($sqlconn, "SELECT *FROM tb_skul");
	$ad = mysqli_fetch_array($sqlad);
	$nmskul = $ad['nmskul'];
	$tam = mysqli_query($sqlconn, "SELECT jsiswa, jrombel, jsiswa*jrombel as dt FROM tb_dayatampung WHERE kdthpel='$_COOKIE[c_tahun]'");
	$row=mysqli_fetch_array($tam);
	$js=$row['jsiswa'];
	$jr = $row['jrombel']; 
	$dt=$row['dt'];

	$no=0;
	$terima=0;
	$tolak=0; 
	$sqlc = mysqli_query($sqlconn, "SELECT cs.* , ws.nmwali, SUM(ns.nilai) as jml, sa.nmskulasal as asl FROM tb_calsis cs INNER JOIN tb_ortu ws ON ws.nopend=cs.nopend INNER JOIN tb_nilai ns ON cs.nopend=ns.nopend INNER JOIN tb_skul_asal sa ON cs.idskulasal=sa.idskulasal WHERE cs.kdthpel='$_COOKIE[c_tahun]' GROUP BY ns.nopend ORDER BY jml DESC");
	while ($row=mysqli_fetch_array($sqlc))
	{
	$no++;
	if($row['gender']=='L'){$gender='Laki-laki';} else {$gender='Perempuan';}
	$lahir = new DateTime($row['tgllhr']);
	$batas = new DateTime($awal);
	$diff = $lahir->diff($batas);
	$umur = $diff->y+($diff->m)/12;
	
	$usia=$diff->y.' thn '.substr('0'.$diff->m,-2).' bln';
	
	if($umur >=11 && $umur <= 15) {$hsl = 'Diterima';$terima++;} else {$hsl ='-';$tolak++;}
	$pdf->Cell(0.65,0.65,$no.'.','LTBR',0,'C');
	$pdf->Cell(3.0,0.65,$row['nik'],'LTBR',0,'C');
	$pdf->Cell(7.0,0.65,ucwords(strtolower($row['nama'])),'LTBR',0,'L');
	$pdf->Cell(2.0,0.65,$gender,'LTBR',0,'L');
	$pdf->Cell(4.0,0.65,indonesian_date($row['tgllhr']),'LTBR',0,'L');
	$pdf->Cell(5.5,0.65,$row['desa'],'LTBR',0,'L');
	if($row['jml']==0){
	$pdf->Cell(2.25,0.65,'-','LTBR',0,'C');
	}
	else{
		$pdf->Cell(2.25,0.65,number_format($row['jml'],1,',','.'),'LTBR',0,'C');
	}
	if($row['desa']=='Cilodang' || $row['desa']=='Mulia Bhakti'){$zona='Zona 1';} else {$zona='Zona 2';}
	$pdf->Cell(2.0,0.65,$usia,'LTBR',0,'C');
	$pdf->Cell(4.75,0.65,' '.$zona,'LTBR',0,'L');
	$pdf->Cell(1.5,0.65,' '.$hsl,'LTBR',0,'L');
	$pdf->Ln();
	}
	
	$rekl = mysqli_query($sqlconn,"SELECT count(*) as lk FROM tb_calsis WHERE gender='L'");
	$row = mysqli_fetch_array($rekl);
	$rl = $row['lk'];
	$rekp = mysqli_query($sqlconn,"SELECT count(*) as pr FROM tb_calsis WHERE gender='P'");
	$row = mysqli_fetch_array($rekp);
	$rp = $row['pr'];
	$rs = $rl + $rp;

	$pdf->SetFont('Times','B','11');
	$pdf->Ln(0.25);
	$pdf->Cell(10.5,0.5,'RENCANA PENERIMAAN','LT',0,'L');
	$pdf->Cell(10.5,0.5,'REKAP PENDAFTAR','T',0,'L');
	$pdf->Cell(10,0.5,'REKAP PENERIMAAN','TR',0,'L');
	$pdf->Ln();
	$pdf->SetFont('Times','','11');
	$pdf->Cell(5.75,0.5,'Jumlah Rombel','L',0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$jr.' Rombel',0,0,'L');
	$pdf->Cell(5.75,0.5,'Calon Peserta Didik Laki-laki',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$rl.' Peserta Didik',0,0,'L');
	$pdf->Cell(5.75,0.5,'Calon Peserta Didik Diterima',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.0,0.5,$terima.' Peserta Didik','R',0,'L');
	$pdf->Ln();
	$pdf->Cell(5.75,0.5,'Jumlah Peserta Didik Per Rombel','L',0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$js.' Peserta Didik',0,0,'L');
	$pdf->Cell(5.75,0.5,'Calon Peserta Didik Perempuan',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.5,0.5,$rp.' Peserta Didik',0,0,'L');
	$pdf->Cell(5.75,0.5,'Calon Peserta Didik Tidak Diterima',0,0,'L');
	$pdf->Cell(0.25,0.5,':',0,0,'L');
	$pdf->Cell(4.0,0.5,$tolak.' Peserta Didik','R',0,'L');
	$pdf->Ln();
	$pdf->Cell(5.75,0.5,'Daya Tampung','LB',0,'L');
	$pdf->Cell(0.25,0.5,':','B',0,'L');
	$pdf->Cell(4.5,0.5,$dt.' Peserta Didik','B',0,'L');
	$pdf->Cell(5.75,0.5,'Jumlah Pendaftar','B',0,'L');
	$pdf->Cell(0.25,0.5,':','B',0,'L');
	$pdf->Cell(4.5,0.5,$rs.' Peserta Didik','B',0,'L');
	$pdf->Cell(5.75,0.5,'Jumlah Seluruhnya','B',0,'L');
	$pdf->Cell(0.25,0.5,':','B',0,'L');
	$pdf->Cell(4.0,0.5,$rs.' Peserta Didik','BR',0,'L');
	$pdf->Ln(0.65);
	$pdf->SetFont('Times','B','11');
	$pdf->Cell(10.5,0.65,'CATATAN:',0,0,'L');
	$pdf->SetFont('Times','','11');
	$pdf->Ln();
	$pdf->MultiCell(31.0,0.5,'Calon Peserta didik dinyatakan diterima di kelas 7 (tujuh) SMP setelah memenuhi persyaratan dalam Peraturan Menteri Pendidikan dan Kebudayaan Nomor 44 Tahun 2019 tentang Penerimaan Peserta Didik Baru Pada Taman Kanak-Kanak, Sekolah Dasar, Sekolah Menengah Pertama, Sekolah Menengah Atas, dan Sekolah Menengah Kejuruan Pasal 6, yaitu:');
	$pdf->MultiCell(31.0,0.5, 'a. berusia paling tinggi 15 (lima belas) tahun pada tanggal 1 Juli tahun berjalan; dan');
	$pdf->MultiCell(31.0,0.5,'b. memiliki ijazah SD/sederajat atau dokumen lain yang menjelaskan telah menyelesaikan kelas 6 (enam) SD.');
	$pdf->Ln();
	$sqlad = mysqli_query($sqlconn, "SELECT *FROM tb_user WHERE jbtdinas='1'");
	$row = mysqli_fetch_array($sqlad);
	$kepsek = $row['nama'];
	$nipkepsek = $row['nip'];
	$desa = $row['desa'];
	if($_REQUEST['m']=='1'){
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
		$panitia='Pembuat Peringkat';
		$sql=mysqli_query($sqlconn, "SELECT nama, nip FROM tb_user WHERE username='$_COOKIE[c_user]'");
		$u=mysqli_fetch_array($sql);
		$ketua=$u['nama'];
		$nip=$u['nip'];
		if($nip=='Non PNS' || $nip=='' || $nip==null){$nipnya=''; } else {$nipnya='NIP. '.$u['nip'];}
	}
	else{
		$disahkan='Mengetahui:';
		$diketahui='Mengetahui:';
		$panitia='Ketua Panitia';
		
		$sqlu=mysqli_query($sqlconn, "SELECT * FROM tb_seleksi WHERE kdthpel='$_COOKIE[c_tahun]'");
		$row = mysqli_fetch_array($sqlu);
		$tempat=$row['tmpseleksi'];
		$tgl=$row['tglseleksi'];
		$jbt=$row['jbtlegalisasi'];
		$nmjbt=$row['nmlegalisasi'];
		$nipjbt=$row['niplegalisasi'];
		$sqlp=mysqli_query($sqlconn,"SELECT nama as nmpanitia, nip as nippanitia FROM tb_user WHERE jbtpanitia='2'");
		$p=mysqli_fetch_array($sqlp);
		$ketua=$p['nmpanitia'];
		$nip=$p['nippanitia'];
		if($nip=='Non PNS' || $nip=='' || $nip==null){$nipnya='';}
		else {$nipnya='NIP. '.$nip;}
		$jbt1='Kepala Sekolah,';
		$nmjbt1=$kepsek;
		$nipjbt1='NIP. '.$nipkepsek;

	}
	$sqlj=mysqli_query($sqlconn, "SELECT jbtlegalisasi FROM tb_seleksi WHERE jbtlegalisasi LIKE 'Kepala Dinas%'");
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