<?php

namespace App\ValueObjects;

use App\Interfaces\ShippingValueObjectInterface;
use App\Interfaces\ValueObjectInterface;

class PackageDimension implements ValueObjectInterface, ShippingValueObjectInterface
{
    public function __construct(public readonly int $width, public readonly int $height, public readonly int $length)
    {
        match (true) {
            $width <= 0 || $width > 80 => throw new \InvalidArgumentException('Invalid package width'),
            $height <= 0 || $height > 70 => throw new \InvalidArgumentException('Invalid package height'),
            $length <= 0 || $length > 120 => throw new \InvalidArgumentException('Invalid package length'),
            default => true,
        };
    }

    // public function increaseWidth(int $width)
    // {
    //     return new self($this->width + $width, $this->height, $this->length);
    // }

    public function equalTo(ShippingValueObjectInterface $object): bool
    {
        if (!$object instanceof PackageDimension) {
            return false;
        }
        return $this->width === $object->width
            && $this->height === $object->height
            && $this->length === $object->length;
    }
}
