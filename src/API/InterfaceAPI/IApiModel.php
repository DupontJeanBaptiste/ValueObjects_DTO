<?php

namespace App\API\InterfaceAPI;

use App\DTO\ApiCallDTO\ApiCallDTOInterface\IOrderShippingDTO;

interface IApiModel
{
    public function getResult(): array;
}