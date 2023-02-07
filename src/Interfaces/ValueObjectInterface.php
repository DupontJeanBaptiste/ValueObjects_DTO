<?php

namespace App\Interfaces;

use App\Interfaces\ShippingValueObjectInterface;

interface ValueObjectInterface
{
    public function equalTo(ShippingValueObjectInterface $object): bool;
}