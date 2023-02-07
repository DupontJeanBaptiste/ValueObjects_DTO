<?php

namespace App\Services\Data;

use App\API\Factory\ApiFactory;
use App\DTO\ApiCallDTO\ApiCallDTOInterface\IApiDTO;
use App\DTO\DTOFactory\Factory\DtoFactory;
use App\ValueObjects\PackageDimension;
use App\ValueObjects\Transporter;
use App\ValueObjects\Weight;

class TransportSheetService
{
    public function getTransportSheet(array $formData): IApiDTO
    {
        // turn array into value objects
        $transporter = new Transporter($formData['transporter']);

        $packageDimension = new PackageDimension($formData['width'], $formData['height'], $formData['length']);

        $weight = new Weight($formData['weight']);

        // get the api response from the transporter choosen by the user 
        $apiTransporter = (new ApiFactory($transporter, $packageDimension, $weight))->create();

        // transform the api data for use there deeper into the app
        
        $transportSheet = DtoFactory::create($apiTransporter);

        return $transportSheet;
    }
}