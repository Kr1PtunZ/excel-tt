<?php

namespace App\Interfaces;

interface RandomNumberGeneratorInterface
{
    public function generate(int $min, int $max): int;
}