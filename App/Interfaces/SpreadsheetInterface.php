<?php

namespace App\Interfaces;

interface SpreadsheetInterface
{
    public function addValue(string $cellAddress, $value): void;
    public function setColumnWidth(string $columnID, float $width): void;
}