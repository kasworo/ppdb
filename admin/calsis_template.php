<?php
	require_once '../assets/library/PHPExcel.php';
	include "../config/konfigurasi.php"; 
	include "../mergeCells.php";

$objPHPExcel = new PHPExcel();
$objPHPExcel->getProperties()->setCreator("Kasworo Wardani")	->setLastModifiedBy("Kasworo Wardani")	->setTitle("Office 2007 XLSX Test Document")	->setSubject("Office 2007 XLSX Test Document")	->setDescription("Soal Export")	->setKeywords("office 2007 openxml php")	->setCategory("Daftar Siswa");

$objPHPExcel->setActiveSheetIndex(0)
	->mergeCells('A3:A4')->mergeCells('B3:B4')->mergeCells('C3:C4')->mergeCells('D3:D4')->mergeCells('E3:E4')->mergeCells('F3:G3')->mergeCells('H3:H4')->mergeCells('I3:I4')->mergeCells('J3:P3')->mergeCells('Q3:AF3')->setCellValue('A1', 'TEMPLATE DATA CALON PESERTA DIDIK')->setCellValue('A3', 'No')->setCellValue('A5', '(1)')->setCellValue('B3', 'NPSN')->setCellValue('B5', '(2)')->setCellValue('C3', 'NISN')->setCellValue('C5', '(3)')->setCellValue('D3', 'NIK')->setCellValue('D5', '(4)')->setCellValue('E3', 'Nama Lengkap')->setCellValue('E5', '(5)')->setCellValue('F3', 'Tempat Dan Tanggal Lahir')->setCellValue('F4', 'Tempat')->setCellValue('F5', '(6)')->setCellValue('G4', 'Tanggal')->setCellValue('G5', '(7)')->setCellValue('H3', 'Gender')->setCellValue('H5', '(8)')->setCellValue('I3', 'Agama')->setCellValue('I5', '(9)')->setCellValue('J3', 'Alamat Peserta Didik')->setCellValue('J4', 'Alamat')->setCellValue('J5', '(10)')->setCellValue('K4', 'Desa')->setCellValue('K5', '(11)')->setCellValue('L4', 'Kecamatan')->setCellValue('L5', '(12)')->setCellValue('M4', 'Kabupaten/Kota')->setCellValue('M5', '(13)')->setCellValue('N4', 'Provinsi')->setCellValue('N5', '(14)')->setCellValue('O4', 'Kode Pos')->setCellValue('O5', '(15)')->setCellValue('P4', 'No. HP')->setCellValue('P5', '(16)')->setCellValue('Q3', 'Data Orang Tua/Wali')->setCellValue('Q4', 'Nama Lengkap')->setCellValue('Q5', '(17)')->setCellValue('R4', 'NIK')->setCellValue('R5', '(18)')->setCellValue('S4', 'Tempat Lahir')->setCellValue('S5', '(19)')->setCellValue('T4', 'Tanggal Lahir')->setCellValue('T5', '(20)')->setCellValue('U4', 'Agama')->setCellValue('U5', '(21)')->setCellValue('V4', 'Pendidikan')->setCellValue('V5', '(22)')->setCellValue('W4', 'Pekerjaan')->setCellValue('W5', '(23)')->setCellValue('X4', 'Penghasilan')->setCellValue('X5', '(24)')->setCellValue('Y4', 'Hubungan Keluarga')->setCellValue('Y5', '(25)')->setCellValue('Z4', 'Alamat')->setCellValue('Z5', '(26)')->setCellValue('AA4', 'Desa')->setCellValue('AA5', '(27)')->setCellValue('AB4', 'Kecamatan')->setCellValue('AB5', '(28)')->setCellValue('AC4', 'Kabupaten/Kota')->setCellValue('AC5', '(29)')->setCellValue('AD4', 'Provinsi')->setCellValue('AD5', '(30)')->setCellValue('AE4', 'Kode Pos')->setCellValue('AE5', '(31)')->setCellValue('AF4', 'No. HP')->setCellValue('AF5', '(32)');
$no=0;
$baris=5;
$sql=mysqli_query($sqlconn,"SELECT*FROM tb_calsis cs INNER JOIN tb_skul_asal sa ON sa.idskulasal=cs.idskulasal WHERE kdthpel='$_COOKIE[c_tahun]' ORDER BY cs.nopend ASC");
$cek=mysqli_num_rows($sql);
if($cek>0){
	while($cs=mysqli_fetch_array($sql))
	{
		$no++;
		$baris++;
    
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A$baris", $no)->setCellValue("B$baris",$cs['idskulasal'])->setCellValue("C$baris",$cs['nisn'])->setCellValue("D$baris",$cs['nik'])->setCellValue("E$baris",$cs['nama'])->setCellValue("F$baris", '')->setCellValue("G$baris", '')->setCellValue("H$baris", '')->setCellValue("I$baris", '')->setCellValue("J$baris", '')->setCellValue("K$baris", '')->setCellValue("L$baris", '')->setCellValue("M$baris", '')->setCellValue("N$baris", '')->setCellValue("O$baris", '')->setCellValue("P$baris", '');
		
	}
}
else {
	while($no<100)
	{
		$no++;
		$baris++;
		$objPHPExcel->setActiveSheetIndex(0)
		->setCellValue("A$baris", $no)->setCellValue("B$baris",'')->setCellValue("C$baris", '')->setCellValue("D$baris", '')->setCellValue("E$baris", '')->setCellValue("F$baris", '')->setCellValue("G$baris", '')->setCellValue("H$baris", '')->setCellValue("I$baris", '')->setCellValue("J$baris", '')->setCellValue("K$baris", '')->setCellValue("L$baris", '')->setCellValue("M$baris", '')->setCellValue("N$baris", '')->setCellValue("O$baris", '')->setCellValue("P$baris", '');
		
	}
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
$objPHPExcel->getActiveSheet()->setTitle('template_siswa');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel5)
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="template_siswa.xls"');
header('Cache-Control: max-age=0');
 
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
$objWriter->save('php://output');
exit;
?>