<?php
	require_once 'assets/library/PHPExcel.php';
	include "config/konfigurasi.php"; 
	include "mergeCells.php";

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

//$var_soal = "$_REQUEST[ujian]";
// Set properties
$objPHPExcel->getProperties()->setCreator("Kasworo Wardani")
	  ->setLastModifiedBy("Kasworo Wardani")
	  ->setTitle("Office 2007 XLSX Test Document")
	  ->setSubject("Office 2007 XLSX Test Document")
	  ->setDescription("Soal Export")
	  ->setKeywords("office 2007 openxml php")
	  ->setCategory("Daftar ortu");
 
// Add some data

$objPHPExcel->setActiveSheetIndex(0)
  ->mergeCells('A3:A4')->mergeCells('B3:B4')->mergeCells('C3:C4')->mergeCells('D3:D4')->mergeCells('E3:E4')->mergeCells('F3:G3')->mergeCells('H3:H4')->mergeCells('I3:I4')->mergeCells('J3:J4')->mergeCells('K3:K4')->mergeCells('L3:L4')->mergeCells('M3:R3')->mergeCells('S3:S4')->setCellValue('A1', 'TEMPLATE DATA ORANG TUA/WALI CALON PESERTA DIDIK')
  ->setCellValue('A3', 'No')
  ->setCellValue('A5', '(1)')
  ->setCellValue('B3', 'NISN')
  ->setCellValue('B5', '(2)')
  ->setCellValue('C3', 'Nama Calon Peserta Didik')
  ->setCellValue('C5', '(3)')
  ->setCellValue('D3', 'Nama Lengkap Orang Tua/Wali') 
  ->setCellValue('D5', '(4)') 
  ->setCellValue('E3', 'NIK')
  ->setCellValue('E5', '(5)') 
  ->setCellValue('F3', 'Tempat Dan Tanggal Lahir')
  ->setCellValue('F4', 'Tempat')
  ->setCellValue('F5', '(6)')
  ->setCellValue('G4', 'Tanggal')
  ->setCellValue('G5', '(7)')
  ->setCellValue('H3', 'Agama')
  ->setCellValue('H5', '(8)')
  ->setCellValue('I3', 'Pendidikan')
  ->setCellValue('I5', '(9)')
  ->setCellValue('J3', 'Pekerjaan')
  ->setCellValue('J5', '(10)')
  ->setCellValue('K3', 'Penghasilan')
  ->setCellValue('K5', '(11)')
  ->setCellValue('L3', 'Hubungan Keluarga')
  ->setCellValue('L5', '(12)')
  ->setCellValue('M3', 'Alamat Orang Tua/Wali')
  ->setCellValue('M4', 'Alamat')
  ->setCellValue('M5', '(13)')
  ->setCellValue('N4', 'Desa')
  ->setCellValue('N5', '(14)')
  ->setCellValue('O4', 'Kecamatan')
  ->setCellValue('O5', '(15)')
  ->setCellValue('P4', 'Kabupaten/Kota')
  ->setCellValue('P5', '(16)')
  ->setCellValue('Q4', 'Provinsi')
  ->setCellValue('Q5', '(17)')
  ->setCellValue('R4', 'Kode Pos')
  ->setCellValue('R5', '(18)')
  ->setCellValue('S3', 'No. HP')
  ->setCellValue('S5', '(19)');
$no=0;
$baris=5;
while($no<100)
{
	$no++;
	$baris++;
	$objPHPExcel->setActiveSheetIndex(0)
	  ->setCellValue("A$baris", $no)->setCellValue("B$baris",'')->setCellValue("C$baris", '')->setCellValue("D$baris", '')->setCellValue("E$baris", '')->setCellValue("F$baris", '')->setCellValue("G$baris", '')->setCellValue("H$baris", '')->setCellValue("I$baris", '')->setCellValue("J$baris", '')->setCellValue("K$baris", '')->setCellValue("L$baris", '')->setCellValue("M$baris", '')->setCellValue("N$baris", '')->setCellValue("O$baris", '')->setCellValue("P$baris", '')->setCellValue("Q$baris", '')->setCellValue("R$baris", '')->setCellValue("S$baris", '');
}
$semua=$baris;
$objPHPExcel->getActiveSheet()->mergeCells("A1:".$objPHPExcel
->getActiveSheet()->getHighestColumn()."1");
$objPHPExcel->getActiveSheet()->getStyle("A6:". $objPHPExcel
->getActiveSheet()->getHighestColumn().$objPHPExcel
->getActiveSheet()->getHighestRow())->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
	
$objPHPExcel->getActiveSheet()->freezePane('A6');
$objPHPExcel->getActiveSheet()->getStyle('A3:'.$objPHPExcel
->getActiveSheet()->getHighestColumn().'5')->getAlignment()->setWrapText(true);
$objPHPExcel->setActiveSheetIndex()->getStyle('A1:'. $objPHPExcel
->getActiveSheet()->getHighestColumn().'5')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);

$center = array();
$center ['alignment']=array();
$center ['alignment']['horizontal']=PHPExcel_Style_Alignment::HORIZONTAL_CENTER;
$objPHPExcel->setActiveSheetIndex()->getStyle ( 'A3:'.$objPHPExcel->getActiveSheet()->getHighestColumn().'5' )->applyFromArray ($center);

$objPHPExcel->setActiveSheetIndex()->getStyle ("A6:A".$objPHPExcel->getActiveSheet()->getHighestRow() )->applyFromArray ($center);

$thick = array ();
$thick['borders']=array();
$thick['borders']['allborders']=array();
$thick['borders']['allborders']['style']=PHPExcel_Style_Border::BORDER_THIN;
$objPHPExcel->setActiveSheetIndex()->getStyle('A1:'. $objPHPExcel->getActiveSheet()->getHighestColumn().$objPHPExcel->getActiveSheet()->getHighestRow())->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
$objPHPExcel->setActiveSheetIndex()->getStyle ('A3:'. $objPHPExcel->getActiveSheet()->getHighestColumn().$objPHPExcel->getActiveSheet()->getHighestRow())->applyFromArray ($thick);
// Rename sheet
$objPHPExcel->getActiveSheet()->setTitle('template_ortu');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="template_ortu.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>