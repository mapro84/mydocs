<?php

namespace src\app\Demo\DIC;

use src\app\Demo\DIC\AddressInterface;

class Person
{
    private \src\app\Demo\DIC\AddressInterface $address;

    public function __construct(AddressInterface $address)
    {
        $this->address = $address;
    }

    public function getAddress(): \src\app\Demo\DIC\AddressInterface
    {
        return $this->address;
    }
}