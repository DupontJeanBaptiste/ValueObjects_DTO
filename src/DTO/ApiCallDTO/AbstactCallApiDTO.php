<?php

namespace App\DTO\ApiCallDTO;

abstract class AbstractCallApiDTO
{
    public function __construct(
        public int $id,
        public string $firstName,
        public string $name,
        public string $city,
        public bool $subscription,
        public int $width,
        public int $heigth,
        public int $length,
        public int $weight,
        public bool $delicate,
        public string $transporterName,
        public int $taxes,
    )
    {
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setFirstName(string $firstName)
    {
        $this->firstName = $firstName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function setName(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setCity(string $city)
    {
        $this->city = $city;
    }

    public function getCity(): string
    {
        return $this->city;
    }

    public function setIsCustomerSubscribe(bool $subscription)
    {
        $this->subscription = $subscription;
    }

    public function getIsCustomerSubscribe(): bool
    {
        return $this->subscription;
    }

    public function setWidth(int $width)
    {
        $this->width = $width;
    }

    public function getWidth(): int
    {
        return $this->width;
    }

    public function setHeigth(int $heigth)
    {
        $this->heigth = $heigth;
    }

    public function getHeigth(): int
    {
        return $this->heigth;
    }

    public function setLength(int $length)
    {
        $this->length = $length;
    }

    public function getLength(): int
    {
        return $this->length;
    }

    public function setWeight(int $weight)
    {
        $this->weight = $weight;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function setIsDelicate(bool $delicate)
    {
        $this->delicate = $delicate;
    }

    public function getIsDelicate(): bool
    {
        return $this->delicate;
    }

    public function setTransporterName(string $transporterName)
    {
        $this->transporterName = $transporterName;
    }

    public function getTransporterName(): string
    {
        return $this->transporterName;
    }

    public function setTaxes(int $taxes)
    {
        $this->taxes = $taxes;
    }

    public function getTaxes(): int
    {
        return $this->taxes;
    }
}
