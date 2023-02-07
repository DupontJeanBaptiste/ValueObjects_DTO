<?php

namespace App\DTO\DTOFactory\Factory;

use App\API\Fedex\FedexCallApi;
use App\API\Colisimo\ColisimoCallApi;
use App\API\InterfaceAPI\IApiModel;
use App\DTO\ApiCallDTO\ApiCallDTOInterface\IApiDTO;
use App\DTO\ApiCallDTO\ColisimoDTO;
use App\DTO\ApiCallDTO\FedexDTO;

class DtoFactory
{
    public static function create(IApiModel $apiModel): IApiDTO
    {
        if ($apiModel instanceof FedexCallApi) {
            return new FedexDTO($apiModel->getResult());
        } elseif ($apiModel instanceof ColisimoCallApi) {
            return new ColisimoDTO($apiModel->getResult());
        };
    }
}
