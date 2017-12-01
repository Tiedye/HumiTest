<?php
namespace Daniel\Humi;

class Employee implements Person
{
    private $firstName;
    public function getFirstName()
    {
        return $this->firstName;
    }
    public function setFirstName(string $firstName)
    {
        if (empty($firstName)) {
            throw new \Exception("Employee First Name cannot be empty");
        }
        $this->firstName = $firstName;
    }

    private $lastName = null;
    public function getLastName()
    {
        return $this->lastName;
    }
    public function setLastName(string $lastName) {
        if (empty($lastName)) {
            throw new \Exception("Employee First Name cannot be empty");
        }
        $this->lastName = $lastName;
    }

    public function getName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }

    public function asArray()
    {
        return array('firstName' => $this->getFirstName(), 'lastName' => $this->getLastName(), 'fullName' => $this->getName());
    }

    public function fromArray($array)
    {
        $this->setFirstName($array['firstName']);
        $this->setLastName($array['lastName']);
    }

    public function asJSON()
    {
        return json_encode($this->asArray());
    }

    public function __construct(string $firstName, string $lastName)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
    }
}
