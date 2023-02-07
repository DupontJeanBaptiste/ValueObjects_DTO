<?php

namespace App\DTO\DTOFactory\InterfaceFactory;

use App\API\InterfaceAPI\IApiModel;
use App\DTO\ApiCallDTO\ApiCallDTOInterface\IOrderShippingDTO;

interface IDtoFactory
{
    public function create(IApiModel $apiModel): IOrderShippingDTO;
}