<?php

namespace App\API\Factory;

use App\API\InterfaceAPI\IApiModel;

interface IApiFactory
{
    public function create(): IApiModel;
}