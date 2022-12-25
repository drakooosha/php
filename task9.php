<?php

namespace task9;

class Student
{
    protected string $firstName;
    protected string $lastName;
    protected string $group;
    protected float $averageMark;

    public function __construct(string $name, string $lastName, string $group, float $averageMark)
    {
        $this->firstName = $name;
        $this->lastName = $lastName;
        $this->group = $group;
        $this->averageMark = $averageMark;
    }

    public function getScholarship()
    {
        return $this->averageMark == 5 ? '100 USD' : '80 USD';
    }
}

class Aspirant extends Student
{
    protected string $researchWork;

    public function __construct(string $name, string $lastName, string $group, float $averageMark, $researchWork)
    {
        parent::__construct($name, $lastName, $group, $averageMark);
        $this->researchWork = $researchWork;
    }

    public function getScholarship()
    {
        return $this->averageMark == 5 ? '200 USD' : '180 USD';
    }
}


$arr = [
    'Student1' => new Student('nameA', 'lastNameA', 'groupA', 1.0),
    'Student2' => new Student('nameB', 'lastNameB', 'groupB', 3.0),
    'Student3' => new Student('nameC', 'lastNameC', 'groupC', 5.0),
    'Aspirant1' => new Aspirant('nameA', 'lastNameA', 'groupA', 1.0, 'WorkA'),
    'Aspirant2' => new Aspirant('nameB', 'lastNameB', 'groupB', 3.0, 'WorkB'),
    'Aspirant3' => new Aspirant('nameC', 'lastNameC', 'groupC', 5.0, 'WorkC'),
];

foreach ($arr as $key => $value) {
    echo $value->getScholarship()."\n";
}
