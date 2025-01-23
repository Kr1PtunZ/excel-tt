<?php
namespace App\Classes;

use App\Interfaces\RandomNumberGeneratorInterface;
use App\Interfaces\SpreadsheetInterface;
use PhpOffice\PhpSpreadsheet\Cell\Coordinate;
use Exception;
use Throwable;
class RandomNumbersTableGenerator
{
    private $numberGenerator;
    private $spreadsheetManager;

    public function __construct(RandomNumberGeneratorInterface $numberGenerator, SpreadsheetInterface $spreadsheetManager)
    {
        $this->numberGenerator = $numberGenerator;
        $this->spreadsheetManager = $spreadsheetManager;
    }

    public function generateTable(int $rows = 10, int $cols = 10): void
    {
        try {
            for ($row = 1; $row <= $rows; $row++) {
                for ($col = 0; $col < $cols; $col++) {
                    $randomNumber = $this->numberGenerator->generate(1, 100);
                    $cellAddress = Coordinate::stringFromColumnIndex($col + 1) . $row;
                    $this->spreadsheetManager->addValue($cellAddress, $randomNumber);
                }
            }

            foreach (range('A', 'J') as $columnID) {
                $this->spreadsheetManager->setColumnWidth($columnID, 20);
            }
        } catch (Throwable $e) {
            error_log('Ошибка при генерации таблицы: ' . $e->getMessage());
            throw new Exception('Произошла ошибка: ' . $e->getMessage());
        }
    }
}