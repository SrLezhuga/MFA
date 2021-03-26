<?php
include_once "importar.php";
include_once "exportarxls.php";
require '../../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use \PhpOffice\PhpSpreadsheet\RichText\RichText;
use \PhpOffice\PhpSpreadsheet\Style\Color;

$spreadsheet = new Spreadsheet();
$sheet = $spreadsheet->getActiveSheet();

//set default font
$spreadsheet->getDefaultStyle()
    ->getFont()
    ->setName('Arial')
    ->setSize(14);

//set column dimension to auto size
$spreadsheet->getActiveSheet()
    ->getColumnDimension('A')
    ->setAutoSize(true);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('B')
    ->setAutoSize(true);
$spreadsheet->getActiveSheet()
    ->getColumnDimension('C')
    ->setAutoSize(true);

$spreadsheet->setActiveSheetIndex(0)
    ->setCellValue('A1', 'NOMBRE')
    ->setCellValue('B1', 'CORREO')
    ->setCellValue('C1', 'TELEFONO');

$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getFont()->getColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_WHITE);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getBorders()->getTop()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getBorders()->getBottom()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getBorders()->getLeft()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getBorders()->getRight()->setBorderStyle(\PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$spreadsheet->getActiveSheet()->getStyle('A1:C1')
    ->getFill()->getStartColor()->setARGB(\PhpOffice\PhpSpreadsheet\Style\Color::COLOR_BLACK);

$i = 2;
$suscripciones = getQuery();
while ($row = $suscripciones->fetch_array(MYSQLI_ASSOC)) {
    $spreadsheet->setActiveSheetIndex(0)
        ->setCellValue("A$i", $row['Nombre'])
        ->setCellValue("B$i", $row['Correo'])
        ->setCellValue("C$i", $row['Telefono']);
    $i++;
}

$spreadsheet->getActiveSheet()->getStyle("C2:C$i")->getNumberFormat()
    ->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);

$spreadsheet->getActiveSheet()->setTitle('Suscripciones');

$spreadsheet->setActiveSheetIndex(0);

$name = 'Suscripciones ' . date("Y-m-d", strtotime("now")) . '.xlsx';

//set the header first, so the result will be treated as an xlsx file.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

//make it an attachment so we can define filename
header('Content-Disposition: attachment;filename="' . $name . '"');

//create IOFactory object
$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
//save into php output
$writer->save('php://output');
