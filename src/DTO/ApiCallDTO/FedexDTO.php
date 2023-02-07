<?php

namespace App\DTO\ApiCallDTO;

use App\DTO\ApiCallDTO\ApiCallDTOInterface\IApiDTO;

class FedexDTO extends AbstractCallApiDTO implements IApiDTO
{
    public int $id;
    public string $firstName;
    public string $name;
    public string $city;
    public bool $subscription;
    public int $width;
    public int $height;
    public int $length;
    public int $weight;
    public bool $delicate;
    public string $transporterName;
    public int $taxes;
    public int $dimDivisor;

    public function __construct(public array $callApiFedexResponse)
    {
        $this->id = $callApiFedexResponse['id'];
        $this->firstName = $callApiFedexResponse['expeditor']['firstName'];
        $this->name = $callApiFedexResponse['expeditor']['name'];
        $this->city = $callApiFedexResponse['expeditor']['city'];
        $this->subscription = $callApiFedexResponse['transportor']['isSubscribe'];
        $this->width = $callApiFedexResponse['package']['width'];
        $this->height = $callApiFedexResponse['package']['height'];
        $this->length = $callApiFedexResponse['package']['length'];
        $this->weight = $callApiFedexResponse['package']['weight'];
        $this->delicate = false;
        $this->transporterName = $callApiFedexResponse['transportor']['serviceName'];
        $this->taxes = 0;
        $this->dimDivisor = $callApiFedexResponse['transportor']['dimDivisor'];
    }
}
