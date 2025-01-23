<?php

namespace App\Classes;
use App\Interfaces\RandomNumberGeneratorInterface;
class RandomNumberGenerator implements RandomNumberGeneratorInterface
{
    public function generate(int $min, int $max): int
    {
        return rand($min, $max);
    }
}