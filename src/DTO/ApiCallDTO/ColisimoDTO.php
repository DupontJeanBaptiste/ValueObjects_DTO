<?php

namespace App\DTO\ApiCallDTO;

use App\DTO\ApiCallDTO\ApiCallDTOInterface\IApiDTO;

class ColisimoDTO implements IApiDTO
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

    public function __construct(public array $callApiColisimoResponse) {
        $this->id = $callApiColisimoResponse['order']['id'];
        $this->firstName = $callApiColisimoResponse['order']['customerData']['customerFirstName'];
        $this->name = $callApiColisimoResponse['order']['customerData']['customerName'];
        $this->city = $callApiColisimoResponse['order']['customerData']['customerCity'];
        $this->subscription = $callApiColisimoResponse['order']['customerData']['customerSubscription'];
        $this->width = $callApiColisimoResponse['order']['shippingData']['width'];
        $this->height = $callApiColisimoResponse['order']['shippingData']['height'];
        $this->length = $callApiColisimoResponse['order']['shippingData']['length'];
        $this->weight = $callApiColisimoResponse['order']['shippingData']['weight'];
        $this->delicate = $callApiColisimoResponse['order']['shippingData']['delicate'];
        $this->transporterName = $callApiColisimoResponse['order']['transporterData']['transporterName'];
        $this->taxes = $callApiColisimoResponse['order']['transporterData']['transporterTaxes'];
        $this->dimDivisor = $callApiColisimoResponse['order']['transporterData']['dimDivisor'];
    }
}
