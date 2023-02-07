<?php

namespace App\API\Fedex;

use App\API\InterfaceAPI\IApiModel;
use App\DTO\ApiCallDTO\ApiCallDTOInterface\IOrderShippingDTO;
use App\DTO\ApiCallDTO\FedexDTO;
use App\ValueObjects\PackageDimension;
use App\ValueObjects\Weight;

class FedexCallApi implements IApiModel
{
    private int $width;
    private int $height;
    private int $length;
    private int $weight;
    public function __construct(
        public readonly PackageDimension $packageDimension,
        public readonly Weight $weightPackage,
    ) {
        $this->width = $packageDimension->width;
        $this->length = $packageDimension->length;
        $this->height = $packageDimension->height;
        $this->weight = $weightPackage->value;
    }

    public function getResult(): array
    {
        $response = [
            'id' => 1,
            'expeditor' => [
                'firstName' => 'Doe',
                'name' => 'John',
                'city' => 'Strasbourg',
                'age' => 28,
            ],
            'package' => [
                'width' => $this->width,
                'height' => $this->height,
                'length' => $this->length,
                'weight' => $this->weight,
            ],
            'transportor' => [
                'serviceName' => 'FEDEX',
                'city' => 'Strasbourg',
                'isSubscribe' => false,
                'dimDivisor' => 800,
            ],
        ];

        return $response;
    }
}
