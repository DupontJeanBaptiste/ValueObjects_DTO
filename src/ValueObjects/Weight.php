<?php

namespace App\ValueObjects;

use App\Classes\Shipping;
use App\Interfaces\ShippingValueObjectInterface;
use App\Interfaces\ValueObjectInterface;

class Weight implements ValueObjectInterface, ShippingValueObjectInterface
{
    public function __construct(public readonly int $value)
    {
        if ($value <= 0 || $value > 150) {
            throw new \InvalidArgumentException('Invalid package value');
        }
    }

    public function equalTo(ShippingValueObjectInterface $object): bool
    {
        if (!$object instanceof Weight) {
            return false;
        }
        return $this->value === $object->value;
    }
}
