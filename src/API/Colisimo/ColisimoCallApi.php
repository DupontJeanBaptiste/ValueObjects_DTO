<?php

namespace App\API\Colisimo;

use App\API\InterfaceAPI\IApiModel;
use App\ValueObjects\PackageDimension;
use App\ValueObjects\Weight;

class ColisimoCallApi implements IApiModel
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
            'order' => [
                'id' => 1,
                'shippingData' => [
                    'width' => $this->width,
                    'height' => $this->height,
                    'length' => $this->length,
                    'weight' => $this->weight,
                    'delicate' => true,
                ],
                'customerData' => [
                    'customerFirstName' => 'Doe',
                    'customerName' => 'Jhon',
                    'customerCity' => 'Strasbourg',
                    'customerSubscription' => false,
                ],
                'transporterData' => [
                    'transporterName' => 'FEDEX',
                    'transporterCity' => 'Strabourg',
                    'transporterTaxes' => 0,
                    'dimDivisor' => 139,
                ],
            ]
        ];

        return $response;
    }
}
