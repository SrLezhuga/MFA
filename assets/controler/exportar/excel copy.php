<?php
include_once "importar.php";
include_once "exportarxls.php";

conectar();
getErrorReporting();
noCli();

/** Include PHPExcel */
require_once '../../modulo/PHPExcel/Classes/PHPExcel.php';

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("Brandon Lechuga")
    ->setLastModifiedBy("Brandon Lechuga")
    ->setTitle("Office 2007 XLSX Test Document")
    ->setSubject("Office 2007 XLSX Test Document")
    ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
    ->setKeywords("office 2007 openxml php")
    ->setCategory("Test result file");

// Add some data
$objPHPExcel->setActiveSheetIndex(0)
    ->setCellValue('A1', 'NOMBRE')
    ->setCellValue('B1', 'CORREO')
    ->setCellValue('C1', 'TELEFONO');

$i = 2;
$suscripciones = getQuery();
while ($row = $suscripciones->fetch_array(MYSQLI_ASSOC)) {
    $objPHPExcel->setActiveSheetIndex(0)
        ->setCellValue("A$i", $row['Nombre'])
        ->setCellValue("B$i", $row['Correo'])
        ->setCellValue("C$i", $row['Telefono']);
    $i++;
}


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('Suscripciones');

// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename=Suscripciones ' . date("Y-m-d", strtotime("now")) . '.xls');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
