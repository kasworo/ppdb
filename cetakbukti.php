<?php
	require('assets/library/fpdf/fpdf.php');
	include "common.php";
	require_once("assets/library/phpqrcode/qrlib.php");
	class PDF extends FPDF
	{
		function Header()
		{
			global $conn;
			$sqlsetid=mysqli_query($conn, "SELECT*FROM tb_thpel WHERE aktif='Y'");
			$setid=mysqli_fetch_array($sqlsetid);
			$thpel=substr($setid['nmthpel'],0,9);

			$sqlad = mysqli_query($conn, "SELECT *FROM tb_skul");
			$ad = mysqli_fetch_array($sqlad);
			$nmskul = $ad['nmskul'];
			$skpd =$ad['skpd'];
			$almt =$ad['alamat'];
			$desa = $ad['desa'];
			$kab=$ad['kab'];
			$logsek = $ad['logo'];
			if ($logsek=='')
			{
				$logo='assets/img/tutwuri.png';
			}
			else
			{
				$logo ='images/'.$logsek;
			}
			$this->Image($logo,1.5,0.75,1.75); // logo
			$this->SetTextColor(0,0,0); // warna tulisan
			$this->SetFont('Times','B','12'); // font yang digunakan
			// membuat cell dg panjang 19 dan align center 'C'
			$this->Cell(1.5,0,''); // cell dengan panjang 1
			$this->Cell(16,0.5,strtoupper('PANITIA PESERTA DIDIK BARU '),0,0,'C');
			$this->Ln(0.5);
			$this->SetFont('Times','B','14');
			$this->Cell(1.5,0.5,''); // cell dengan panjang 1
			$this->Cell(16,0.5,strtoupper($nmskul),0,0,'C');
			$this->Ln(0.5);
			$this->SetFont('Times','B','12');
			$this->Cell(1.5,0.5,''); // cell dengan panjang 1
			$this->Cell(16,0.5,'TAHUN PELAJARAN '.$thpel,0,0,'C');
			$this->SetLineWidth(0.05);
			$this->Line(1.0,3.0,20,3.0);
			$this->SetLineWidth(0);
			$this->Line(1.0,3.1,20,3.1);
			$this->Ln(1.5);

		}

		function Footer()
		{
			global $conn;
			$sqlf = mysqli_query($conn, "SELECT*FROM tb_skul");
			$row = mysqli_fetch_array($sqlf);	 
			$this->SetFont('Times','','10');
			$this->SetY(-1.5,5);
			$this->Rect(1,13.5,0.75,0.75);
			$this->Rect(2,13.5,17.25,0.75);
			$this->Rect(19.5,13.5,0.75,0.75); 
			$this->Cell(0,1,strtoupper($row['skpd'].' kabupaten '.$row['kab']),0,0,'C');
		} 
	}
	$pdf = new PDF('L','cm','A5');
	$pdf->SetAutoPageBreak(true,1.0);
	$pdf->SetMargins(1.1,1.0,1.0,1.0);
	$pdf->AliasNbPages();

	if($_GET['m']=='1'){$nopes=base64_decode($_GET['id']);}

	$sql="SELECT*FROM tb_calsis WHERE idcalsis = '$nopes'";  
	$row = query($sql)[0];
	$pdf->AddPage();
	$nmpes=$row['nopend'];
	$jk=$row['gender'];
	$tgldaftar = $row['tglinput'];	
	if($jk=='L') {$gender ='Laki-laki';} else {$gender ='Perempuan';}
	switch ($row['agama'])
	{
		case 'A': {$agama='Islam';break;} case 'B': {$agama='Kristen';break;}
		case 'C': {$agama='Katholik';break;} case 'D': {$agama='Hindu';break;}
		case 'E': {$agama='Buddha';break;} case 'F': {$agama='Konghucu';break;}
	}
	
	//QRcode::png($_SERVER['HTTP_HOST'].'/getlogin.php?user='.$nmpes.'&pass='.str_replace('-','',$row['tgllhr']),"tes.png");
//		$pdf->Image("tes.png",15.0,9.75,2.25,'png');
	$pdf->SetFont('Times','B','12');
	$pdf->Cell(18,0.5,strtoupper('BUKTI REGISTRASI AKUN '),0,0,'C');
	$pdf->Ln(1);
	$pdf->SetFont('Times','','11');
	//$pdf->Image("assets/img/kotakfoto.png",1.0,4.75,3.25,'png');
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"Nomor Pendaftaran");
	$pdf->Cell(0.25,0.5,":");
	$pdf->Cell(10.5,0.5,$row['nopend']);
	$pdf->Ln();
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"Nama Lengkap");
	$pdf->Cell(0.25,0.5,":");
	$pdf->Cell(10.5,0.5,strtoupper($row['nama']));
	$pdf->Ln();
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"NIK / NISN");
	$pdf->Cell(0.25,0.5,":");
	$pdf->Cell(10.5,0.5,$row['nik'].' / '.$row['nisn']);
	$pdf->Ln();
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"Tempat, Tanggal Lahir");
	$pdf->Cell(0.25,0.5,":");
	$pdf->Cell(10.5,0.5,$row['tmplhr'].', '.indonesian_date($row['tgllhr']));
	$pdf->Ln();
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"Jenis Kelamin");
	$pdf->Cell(0.25,0.5,":");
	$pdf->Cell(10.5,0.5,$gender);
	$pdf->Ln();
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"Agama");
	$pdf->Cell(0.25,0.5,":");
	$pdf->Cell(10.5,0.5,$agama);
	$pdf->Ln();
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"Alamat");
	$pdf->Cell(0.25,0.5,":");
	$pdf->MultiCell(10.5,0.5,$row['alamat'].', Desa '.$row['desa'].', Kecamatan '.$row['kec'].', Kabupaten '.$row['kab'].', Provinsi '.$row['prov']);
	$pdf->Cell(3.5,0.5);
	$pdf->Cell(4.5,0.5,"Nomor Telepon Seluler");
	$pdf->Cell(0.25,0.5,":");
	$pdf->Cell(10.5,0.5,$row['nohp']);
	$pdf->Ln(1.0);
	$pdf->SetFont('Times','BI','11');
	$pdf->Cell(13,0.5,"Catatan:");
	$pdf->Ln();
	$pdf->SetFont('Times','','10');
	$pdf->MultiCell(13,0.5,"Silahkan login ke https://ppdb.smpnlipat.sch.id dengan scan Kode QR di samping, atau gunakan Nomor Pendaftaran NISN, NIK sebagai username dan password ".str_replace('-','',$row['tgllhr'])." untuk melengkapi data-data yang dibutuhkan seperti data sekolah asal, data orang tua, data nilai dan upload dokumen, tidak melengkapi dianggap mengundurkan diri.");
	$pdf->Output(); // ditampilkan
?>