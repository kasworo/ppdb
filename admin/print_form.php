<?php
  if(!isset($_COOKIE['c_user'])){header("Location: login.php");}
 
require_once ('../assets/library/fpdf/fpdf.php');

include "../config/fungsi_tgl.php";

// pendefinisian folder font pada FPDF
// seperti sebelunya, kita membuat class anakan dari class FPDF

class PDF extends FPDF{

function Footer(){
  include "../config/konfigurasi.php";
  $sqlf = mysqli_query($sqlconn, "SELECT*FROM tb_skul");
  $row = mysqli_fetch_array($sqlf);   
  $this->SetFont('Times','','11');
  $this->SetY(-1.5,5);
  $this->Rect(1,28.25,0.75,0.75);
  $this->Rect(2,28.25,17.25,0.75);
  $this->Rect(19.5,28.25,0.75,0.75); 
  $this->Cell(0,0.8,strtoupper($row['skpd'].' kabupaten '.$row['kab']),0,0,'C');
  } 
 }
 
$pdf = new PDF('P','cm','A4');
$pdf->SetAutoPageBreak(true,1.5);
$pdf->SetMargins(2.0,1.5,1.5,1.5);
$pdf->AliasNbPages();

include "../config/konfigurasi.php";

$sqlad = mysqli_query($sqlconn, "SELECT *FROM tb_skul");
$ad = mysqli_fetch_array($sqlad);
$nmskul = $ad['nmskul'];
$skpd =$ad['skpd'];
$almt =$ad['alamat'];
$kab=$ad['kab'];
/*$logsek = $ad['logo'];
if ($logsek=='')
{
  $logo='images/tutwuri.jpg';
}
else
{
  $logo ='logo/'.$logsek;
} */
$nopes=base64_decode($_REQUEST['id']);
if($nopes=='all')
{
  $sql0=mysqli_query($sqlconn, "SELECT s.*,w.nmwali, w.hubkel, k.nmkerja, sa.nmskulasal, sa.almtskulasal FROM tb_calsis s INNER JOIN tb_ortu w ON w.nopend=s.nopend INNER JOIN tb_kerja k ON w.kdkerja = k.kdkerja INNER JOIN tb_skul_asal sa ON s.idskulasal=sa.idskulasal ORDER BY s.nopend ASC");
}
else
{
  $sql0=mysqli_query($sqlconn, "SELECT s.*,w.nmwali, w.hubkel, k.nmkerja, sa.nmskulasal, sa.almtskulasal FROM tb_calsis s LEFT JOIN tb_ortu w ON w.nopend=s.nopend LEFT JOIN tb_kerja k ON w.kdkerja = k.kdkerja LEFT JOIN tb_skul_asal sa ON s.idskulasal=sa.idskulasal WHERE s.nopend='$nopes' ORDER BY s.nopend ASC");
}
while ($row = mysqli_fetch_array($sql0))
{
  $pdf->AddPage();
  $nmpes=$row['nopend'];
  $nmcalsis=$row['nama'];
  $nmwali=$row['nmwali'];
  $desa=$row['desa'];
  $tglinput=$row['tglinput'];
  $jk=$row['gender'];
  if($jk=='L') {$gender ='Laki-laki';} else {$gender ='Perempuan';}
  switch ($row['agama']) {
    case 'A': {$agama='Islam';break;} case 'B': {$agama='Kristen';break;}
    case 'C': {$agama='Katholik';break;} case 'D': {$agama='Hindu';break;}
    case 'E': {$agama='Buddha';break;} case 'F': {$agama='Konghucu';break;}
  }
  switch ($row['hubkel']) {
    case '1': {$hub='Ayah/Ibu Kandung';break;} 
    case '2': {$hub='Kakek/Nenek';break;} 
    case '3': {$hub='Paman/Bibi';break;}
    case '4': {$hub='Kakak Kandung';break;}
    default:{$hub='.............................';break;}
  }
$pdf->SetFont('Times','B','14'); 
$pdf->Cell(18.5,0.5,"FORMULIR PENDAFTARAN",0,0,'C');
$pdf->Ln(0.5);
$pdf->SetFont('Times','B','12');
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5,"A.");
$pdf->Cell(3.0,0.5,"Data Calon Peserta Didik");
$pdf->SetFont('Times','','12');
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5,0.5,"Nomor Registrasi");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,strtoupper($row['nopend']));
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Nama Lengkap");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,strtoupper($row['nama']));
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"NIK");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,strtoupper($row['nik']));
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"N I S N");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$row['nisn']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Tempat, Tgl. Lahir");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5, $row['tmplhr'].', '.indonesian_date($row['tgllhr']));
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Jenis Kelamin");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$gender);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Agama");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$agama);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Nama Orang Tua/Wali");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$row['nmwali']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Pekerjaan Orang Tua/Wali");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$row['nmkerja']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Hubungan Keluarga");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$hub);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Alamat ");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$row['alamat'].', Desa '.$row['desa']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5);
$pdf->Cell(0.25,0.5);
$pdf->Cell(8.25,0.5, 'Kecamatan '.$row['kec'].', Kabupaten '.$row['kab'].', Provinsi '.$row['prov']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Nomor HP ");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$row['nohp']);
$pdf->Ln(0.75);
$pdf->SetFont('Times','B','12');
$pdf->Cell(1.0,0.5,"B.");
$pdf->Cell(3.0,0.5,"Lulus Dari");
$pdf->SetFont('Times','','12');
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Satuan Pendidikan");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$row['nmskulasal']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"NPSN");
$pdf->Cell(0.25,0.5,":");
$pdf->Cell(8.25,0.5,$row['idskulasal']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Alamat");
$pdf->Cell(0.25,0.5,":");
$pdf->MultiCell(8.25,0.5,$row['almtskulasal']);
$pdf->Ln(0.5);
$pdf->Cell(1.0,0.5);
$pdf->Cell(5.0,0.5,"Nilai Rapor dan USBN");
$pdf->Cell(0.25,0.5,":");
$pdf->Ln(0.75);
$pdf->Cell(1.25,0.75);
$pdf->Cell(1.0,1.2,'No.','LTBR',0,'C');
$pdf->Cell(8.0,1.2,'Mata Pelajaran','LTBR',0,'C');
$pdf->Cell(4.0,0.6,'Nilai Akhir','LTR',0,'C');
$pdf->Cell(3.0,1.2,'Keterangan','LTBR',0,'C');
$pdf->Ln(0.6);
$pdf->Cell(10.25,0.6);
$pdf->Cell(2.0,0.6,'Rapor','LTBR',0,'C');
$pdf->Cell(2.0,0.6,'USBN','LTBR',0,'C');
$pdf->Ln();
$sqlm = mysqli_query($sqlconn, "SELECT*FROM tb_mapel");
$no=0;
$jumlah = 0;
while ($row=mysqli_fetch_array($sqlm))
{
	$no++;
  $qrp=mysqli_query($sqlconn,"SELECT AVG(nilai) as rapor FROM tb_nilai WHERE nopend = '$nmpes' AND kdmapel='$row[kdmapel]' and jns='1' GROUP BY kdmapel, jns, nopend");
  $rp=mysqli_fetch_array($qrp);

  $qus=mysqli_query($sqlconn,"SELECT AVG(nilai) as nus FROM tb_nilai WHERE nopend = '$nmpes' AND kdmapel='$row[kdmapel]' and jns='2' GROUP BY kdmapel, jns, nopend");
  $us=mysqli_fetch_array($qus);

	$pdf->Cell(1.25,0.75);
	$pdf->Cell(1.0,0.75,$no.'.','LTBR',0,'C');
  $pdf->Cell(8.0,0.75,' '.$row['nmmapel'],'LTBR',0,'L');
  
	$pdf->Cell(2.0,0.75,number_format($rp['rapor'],1,',','.'),'LTBR',0,'C');
	$pdf->Cell(2.0,0.75,number_format($us['nus'],1,',','.'),'LTBR',0,'C');
	$pdf->Ln(0.75);

}
$pdf->Cell(1.25,0.75);
$pdf->Cell(7.0,0.75,'Jumlah Nilai','LTBR',0,'C');
$pdf->Cell(2.5,0.75,'','LTBR',0,'C');
$pdf->Cell(5.5,0.75,'','LTBR',0,'C');
$pdf->Ln(0.75);
$pdf->Cell(1.25,0.75);
$pdf->Cell(7.0,0.75,'Rata-rata Nilai','LTBR',0,'C');
$pdf->Cell(2.5,0.75,'','LTBR',0,'C');
$pdf->Cell(5.5,0.75,'','LTBR',0,'C');
$pdf->Ln(1.0);

$pdf->SetFont('Times','B','12');
$pdf->Cell(1.0,0.5,"C.");
$pdf->Cell(3.0,0.5,"Persyaratan Administrasi");
$pdf->SetFont('Times','','12');
$pdf->Ln(0.75);
$pdf->Cell(1.25,0.75);
$pdf->Cell(1.0,0.75,'No.','LTBR',0,'C');
$pdf->Cell(6.0,0.75,'Persyaratan','LTBR',0,'C');
$pdf->Cell(2.5,0.75,'Ada / Tidak','LTBR',0,'C');
$pdf->Cell(5.5,0.75,'Keterangan','LTBR',0,'C');
$pdf->Ln(0.75);
$sqla = mysqli_query($sqlconn, "SELECT*FROM tb_syarat WHERE aktif='Y' ");
    $no=0;
    while ($row = mysqli_fetch_array($sqla))
    {
      
      $no++;
      $sqlcl =mysqli_query($sqlconn, "SELECT ada FROM tb_ceklis WHERE nopend='$nmpes' AND kdsyarat = '$row[kdsyarat]'");
      $cek = mysqli_fetch_array($sqlcl);
      if($cek['ada']=='Y'){$ada = "Ada";} else {$ada = "Tidak";}
      $pdf->Cell(1.25,0.75);
      $pdf->Cell(1.0,0.75,$no.'.','LTBR',0,'C');
      $pdf->Cell(6.0,0.75,' '.$row['nmsyarat'],'LTBR',0,'L');
      $pdf->Cell(2.5,0.75,$ada,'LTBR',0,'C');
      $pdf->Cell(5.5,0.75,'','LTBR',0,'C');
      $pdf->Ln(0.75);
    }
$pdf->Ln(0.75); 
$pdf->Cell(7.5,0.5,'Mengetahui:','',0,'C');
$pdf->Cell(1.5);
$pdf->Cell(7.5,0.5,$desa.', '.indonesian_date($tglinput),'',0,'C');
$pdf->Ln(0.5); 
$pdf->Cell(7.5,0.5,'Orang Tua/Wali,','',0,'C');
$pdf->Cell(1.5);
$pdf->Cell(7.5,0.5,'Calon Peserta Didik,','',0,'C');
$pdf->Ln(2.0); 
$pdf->Cell(7.5,0.5,strtoupper($nmwali),'',0,'C');
$pdf->Cell(1.5);
$pdf->Cell(7.5,0.5,strtoupper($nmcalsis),'',0,'C');
}
$pdf->Output(); // ditampilkan

?>