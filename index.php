<?php

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use App\Classes\RandomNumberGenerator;
use App\Classes\SpreadsheetManager;
use App\Classes\RandomNumbersTableGenerator;

$filePath = 'generated_files/random_numbers.xlsx';

$spreadsheet = new Spreadsheet();

$randomNumberGenerator = new RandomNumberGenerator();

$spreadsheetManager = new SpreadsheetManager($spreadsheet);

$tableGenerator = new RandomNumbersTableGenerator($randomNumberGenerator, $spreadsheetManager);

$tableGenerator->generateTable(10, 10);

$writer = \PhpOffice\PhpSpreadsheet\IOFactory::createWriter($spreadsheet, 'Xlsx');
$writer->save($filePath);

echo "Файл успешно сохранен: <a href='$filePath'>random_numbers.xlsx</a>";
