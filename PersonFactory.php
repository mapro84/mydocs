<?php

use src\app\Demo\DIC\Address;
use src\app\Demo\DIC\Person;

class PersonFactory
{
    private function getZipcodeFromDistrict($district)
    {
        return 75000 + $district;
    }

    public function createParigot($number, $street, $district)
    {
        return $this->createPerson($number, $street, $this->getZipcodeFromDistrict($district), 'Paris', 'France');
    }

    public function createPerson($number, $street, $zipcode, $city, $country)
    {
        $address = new Address($number, $street, $zipcode, $city, $country);

        return new Person($address);
    }
}