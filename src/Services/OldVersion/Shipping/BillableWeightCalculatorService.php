<?php

namespace App\Services\OldVersion\Shipping;

class BillableWeightCalculatorService
{
    public function caclulate(
        int $width,
        int $height,
        int $length,
        int $weight,
        int $dimDivisor,
    ): int {

        // TODO : can use in_array
        match(true) {
            $width <= 0 || $width >80 => throw new \InvalidArgumentException('Invalid package width'),
            $height <= 0 || $height >70 => throw new \InvalidArgumentException('Invalid package height'),
            $length <= 0 || $length >120 => throw new \InvalidArgumentException('Invalid package length'),
            $weight <= 0 || $weight >150 => throw new \InvalidArgumentException('Invalid package weight'),
            $dimDivisor <= 0 => throw new \InvalidArgumentException('Invalid package dimDivisor'),
            default => true
        };

        $dimWeight = (int) round($width * $height * $length / $dimDivisor);

        return max($weight, $dimWeight);
    }
}