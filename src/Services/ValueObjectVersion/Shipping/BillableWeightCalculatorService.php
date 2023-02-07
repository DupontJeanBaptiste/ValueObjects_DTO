<?php

namespace App\Services\ValueObjectVersion\Shipping;

use App\DTO\ApiCallDTO\ApiCallDTOInterface\IApiDTO;

class BillableWeightCalculatorService
{
    public function caclulate(
        IApiDTO $transportSheet,
    ): int {

        $dimWeight = (int) round($transportSheet->width * $transportSheet->height * $transportSheet->length / $transportSheet->dimDivisor);

        return max($transportSheet->weight, $dimWeight);
    }
}