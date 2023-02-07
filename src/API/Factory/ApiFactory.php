<?php

namespace App\API\Factory;

use App\API\Fedex\FedexCallApi;
use App\API\Colisimo\ColisimoCallApi;
use App\API\InterfaceAPI\IApiModel;
use App\ValueObjects\PackageDimension;
use App\ValueObjects\Transporter;
use App\ValueObjects\Weight;

class ApiFactory
{
    public function __construct(
        public readonly Transporter $transporter,
        public readonly PackageDimension $packageDimension,
        public readonly Weight $weight,
    ) {
    }

    public function create(): IApiModel
    {
        return match ($this->transporter->name) {
            'COLISIMO' => new ColisimoCallApi($this->packageDimension, $this->weight),
            'FEDEX' => new FedexCallApi($this->packageDimension, $this->weight),
            default => throw new \InvalidArgumentException('Invalid transporter name'),
        };
    }
}