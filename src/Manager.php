<?php
namespace Daniel\Humi;

class Manager extends Employee
{
    private $reportee;
    public function getReportee()
    {
        return $this->reportee;
    }
    public function setReportee(int $reportee)
    {
        $this->reportee = $reportee;
    }

    public function asArray()
    {
        $theArray = parent::asArray();
        $theArray['reportee'] = $this->getReportee();
        return $theArray;
    }

    public function fromArray($array)
    {
        parent::fromArray($array);
        $this->setReportee($array['reportee']);
    }

    public function __construct(string $firstName, string $lastName, int $reportee = 0)
    {
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setReportee($reportee);
    }
}