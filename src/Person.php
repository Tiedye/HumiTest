<?php
namespace Daniel\Humi;

interface Person
{
    public function getFirstName();
    public function setFirstName(string $firstName);

    public function getLastName();
    public function setLastName(string $lastName);

    public function getName();

    public function asJSON();

    // this allows easy loading from json and sql, as additional properties need only be mentioned once, and the seters are inherited by sub classes (see implementation)
    public function fromArray($array);
}
