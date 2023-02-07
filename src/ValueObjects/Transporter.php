<?php

namespace App\ValueObjects;

use App\Interfaces\FormDataValueObjectInterface;

class Transporter implements FormDataValueObjectInterface
{
    public function __construct(public readonly string $name)
    {
        match (true) {
            !preg_match('/^[A-Za-z]+$/', $name) => throw new \InvalidArgumentException('Invalid transporter name'),
            default => true,
        };
    }

    // public function increaseWidth(int $width)
    // {
    //     return new self($this->width + $width, $this->height, $this->length);
    // }

    public function equalTo(FormDataValueObjectInterface $object): bool
    {
        if (!$object instanceof Transporter) {
            return false;
        }
        return $this->name === $object->name;
    }
}