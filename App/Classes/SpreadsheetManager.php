<?php

namespace App\Classes;
use App\Interfaces\SpreadsheetInterface;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Alignment;

class SpreadsheetManager implements SpreadsheetInterface
{
    private $sheet;

    public function __construct($spreadsheet)
    {
        $this->sheet = $spreadsheet->getActiveSheet();
    }

    public function addValue(string $cellAddress, $value): void
    {
        $this->sheet->setCellValue($cellAddress, $value);
        // Применяем стиль и форматирование
        $style = $this->sheet->getStyle($cellAddress);
        $style->getBorders()->getAllBorders()->setBorderStyle(Border::BORDER_THIN);
        $style->getAlignment()->setHorizontal(Alignment::HORIZONTAL_CENTER);
        $style->getAlignment()->setVertical(Alignment::VERTICAL_CENTER);
    }

    public function setColumnWidth(string $columnID, float $width): void
    {
        $this->sheet->getColumnDimension($columnID)->setWidth($width);
    }
}