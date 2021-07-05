<?php
    require('../assets/library/fpdf/fpdf.php');
	require_once("../assets/library/phpqrcode/qrlib.php");
	include "dbfunction.php";
	class PDF extends FPDF
	{
		function Header()
		{
			global $conn;
			$th=viewdata("tb_thpel", "kdthpel", getthpel())[0];
			$thpel=substr($th['nmthpel'],0,9);
			$ad = viewdata("tb_skul")[0];
			$nmskul = $ad['nmskul'];
			$skpd =$ad['skpd'];
			$almt =$ad['alamat'];
			$desa = $ad['desa'];
			$kab=$ad['kab'];
			$logsek = $ad['logo'];
			if ($logsek=='')
			{
				$logo='../assets/img/tutwuri.png';
			}
			else
			{
				$logo ='../images/'.$logsek;
			}
			$this->Image($logo,1.5,0.75,1.25);
			$this->SetTextColor(0,0,0); // warna tulisan
			$this->SetFont('Times','B','12'); // font yang digunakan
			$this->Cell(1.5,0.5,''); // cell dengan panjang 1
			$this->Cell(16,0.5,'PANITIA PESERTA DIDIK BARU',0,0,'C');
			$this->Ln();
			$this->Cell(1.5,0.5,''); // cell dengan panjang 1
            $this->Cell(16.0,0.5,strtoupper($nmskul),0,0,'C');
            $this->Ln();
            $this->SetFont('Times','B','11');
            $this->Cell(1.5,0.5,''); // cell dengan panjang 1
			$this->Cell(16,0.5,'TAHUN PELAJARAN '.$thpel,0,0,'C');
			$this->SetLineWidth(0.05);
			$this->Line(1.0,2.5,20,2.5);
			$this->SetLineWidth(0);
			$this->Line(1.0,2.6,20,2.6);
			$this->Ln(1.25);

		}

		function Footer()
		{
			global $conn;
			$row =viewdata("tb_skul")[0];
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
	$pdf->SetMargins(1.2,0.75,1.0,1.0);
	$pdf->AliasNbPages();
	$nopes = base64_decode($_REQUEST['id']);
	
	if($nopes=='all')
	{
		$rows=viewdata("v_calsis");
	}
	else
	{ 
		$rows=viewdata("v_calsis","nopend", $nopes);
	}
	
	foreach($rows as $row)
	{
		$pdf->AddPage();
		$idcalsis=$row['idcalsis'];
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
		QRcode::png('ppdb.smpnlipat.sch.id/getlogin.php?user='.$nmpes.'&pass='.str_replace('-','',$row['tgllhr']),"../qrcode/".$nmpes.".png");
        $pdf->Image("../qrcode/".$nmpes.".png",18.25,0.55,1.75,'png');
        $pdf->SetFont('Times','B','11');
        $pdf->Cell(18,0.5,strtoupper('BUKTI REGISTRASI'),0,0,'C');
        $pdf->Ln(0.75);
        $pdf->SetFont('Times','','10');
		$pdf->Cell(3.0,0.5,"Nama Lengkap");
		$pdf->Cell(0.25,0.5,":");
		$pdf->Cell(9.0,0.5,strtoupper($row['nama']));
		$pdf->Cell(2.0,0.5,"N I S N");
		$pdf->Cell(0.25,0.5,":");
		$pdf->Cell(7,0.5,$row['nisn']);
		$pdf->Ln(0.5);
		$pdf->Cell(3.0,0.5,"Tempat/Tgl. Lahir");
		$pdf->Cell(0.25,0.5,":");
		$pdf->Cell(9.0,0.5, $row['tmplhr'].', '.indonesian_date($row['tgllhr']));
        $pdf->Cell(2.0,0.5,"NIK");
		$pdf->Cell(0.25,0.5,":");
		$pdf->Cell(7,0.5,$row['nik']);
		$pdf->Ln(0.5);
		$pdf->Cell(3.0,0.5,"Jenis Kelamin");
		$pdf->Cell(0.25,0.5,":");
		$pdf->Cell(9,0.5,$gender);
		$pdf->Cell(2.0,0.5,"SD / MI Asal ");
		$pdf->Cell(0.25,0.5,":");
		$pdf->Cell(7,0.5,$row['asl']);
		$pdf->Ln(0.75);
		$pdf->Cell(1.0,1.2,'No.','LTBR',0,'C');
		$pdf->Cell(10.0,1.2,'Persyaratan','LTBR',0,'C');
		$pdf->Cell(5,0.6,'Dokumen','LTBR',0,'C');
		$pdf->Cell(2.5,1.2,'Keterangan','LTBR',0,'C');
		$pdf->Ln(0.6);
		$pdf->Cell(11.0,0.6);
		$pdf->Cell(2,0.6,'Fisik','LTBR',0,'C');
		$pdf->Cell(3,0.6,'Elektronik','LTBR',0,'C');		
		$pdf->Ln(0.6);
		$dok=viewdata('v_berkas','idcalsis',$row['idcalsis']);
		foreach($dok as $d)
		{
			$no++;
			if($d['ada']=='1'){$ada = "Ada";} else {$ada = "Tidak";}
			if($d['fileberkas']=='' || $d['fileberkas']==null){$berkas='Belum Upload';} else {$berkas='Sudah Upload';}
			$pdf->Cell(1.0,0.6,$no.'.','LTBR',0,'C');
			$pdf->Cell(10.0,0.6,' '.$d['tampil'],'LTBR',0,'L');
			$pdf->Cell(2,0.6,$ada,'LTBR',0,'C');
			$pdf->Cell(3,0.6,$berkas,'LTBR',0,'C');
			$pdf->Cell(2.5,0.6,'','LTBR',0,'C');
			$pdf->Ln(0.6);
		}

		$sqlad = mysqli_query($sqlconn, "SELECT *FROM tb_skul");
		$row= mysqli_fetch_array($sqlad);
		$desa = $row['desa'];

		$sqluser = mysqli_query($sqlconn, "SELECT*FROM tb_user  WHERE username='$_COOKIE[c_user]'");
		$row = mysqli_fetch_array($sqluser);
		$nama = $row['nama'];

		$pdf->Ln(0.5);
		$pdf->Cell(12,0.5,'Catatan:');
		$pdf->Cell(1,0.5);
		$pdf->Cell(4,0.5,$desa.', '.indonesian_date($tgldaftar),0,0,'C');
		$pdf->Ln(0.5);
		$pdf->Cell(12,0.5,'Dimohon untuk meminjamkan Kartu Keluarga dan Akte Kelahiran Asli,');
		$pdf->Cell(1,0.5);
		$pdf->Cell(4,0.5,'Petugas,',0,0,'C');
		$pdf->Ln();
		$pdf->Image('images/ttdadmin.png',15.0,11.25,1.75);
		$pdf->Cell(12,0.5,'untuk dipindai keperluan verifikasi dan validasi data peserta didik');
		$pdf->Cell(1,0.5);
		$pdf->Cell(4,0.5);
		$pdf->Ln();
		$pdf->Cell(12,0.5,'di laman http://vervalpdnew.data.kemdikbud.go.id');
		$pdf->Cell(1,0.5);
		$pdf->Cell(4,0.5);
		$pdf->Ln();
		$pdf->Cell(12,0.5);
		$pdf->Cell(1,0.5);
		$pdf->Cell(4,0.5,$nama,0,0,'C');
		$pdf->Ln(0.5);
	}
	$pdf->Output(); // ditampilkan
?>