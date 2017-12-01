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

    public function fromArray($array);
}
