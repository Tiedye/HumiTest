<?php
namespace Daniel\Humi;

class PersonFactory {
    static public function create(string $personType, ...$params)
    {
        if (count($params) == 1 && is_array($params[0])) {
            // enable people to be loaded from an array (convenient for json and sql loading)
            switch ($personType) {
                case "employee":
                    $employee = new Employee("a", "a");
                    $employee->fromArray($params[0]);
                    return $employee;
                case "manager":
                    $manager = new Manager("a", "a");
                    $manager->fromArray($params[0]);
                    return $manager;
                default:
                    throw new \Exception("There exists no personType: " . $personType);
            }
        } else {
            switch ($personType) {
                case "employee":
                    if (count($params) == 2 && is_string($params[0]) && is_string($params[1])) {
                        return new Employee($params[0], $params[1]);
                    } else {
                        throw new \Exception("An Employee takes two string arguments");
                    }
                case "manager":
                    if (count($params) == 2 && is_string($params[0]) && is_string($params[1])) {
                        return new Manager($params[0], $params[1]);
                    } else if (count($params) == 3 && is_string($params[0]) && is_string($params[1]) && is_int($params[2])) {
                        return new Manager($params[0], $params[1], $params[2]);
                    } else {
                        throw new \Exception("An Manager takes two string arguments and one optional integer argument");
                    }
                default:
                    throw new \Exception("There exists no personType: " . $personType);
            }    
        }
    }

    static public function promote(Person &$person, $personType)
    {
        switch ($personType) {
            case "employee":
                $person = new Employee($person->getFirstName(), $person->getLastName());
                break;
            case "manager":
                $person = new Manager($person->getFirstName(), $person->getLastName());
                break;
            default:
                throw new \Exception("There exists no personType: " . $personType);
        }
    }

    private function __construct()
    {

    }
}