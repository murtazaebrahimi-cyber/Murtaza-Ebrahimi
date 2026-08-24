<?php

class StudentAccount
{   
    public $name;
    private $studentid;
    protected $department;

    function __construct($name, $studentid, $department)
    {   
        $this->name = $name;
        $this->studentid = $studentid;
        $this->department = $department;
    }

    function ShowInfo()
    {
        echo "Name" .$this->name. "br";
        echo "StudentId" .$this->studentid. "br";
        echo "Department" .$this->department. "br";
    }

    function GetStudentId()
    {
        return $this->studentid;
    }
}


$student1 = new StudentAccount("Ahmad", 1001, "computerScince")

class Person
{
    protected $name;
}

function __construct($name)
{
    $this->name = $name;

}

function Interdouce()
{
    echo "Name is" .$this->name.;
}


class Student extends Person
{
    function Study()
    {
        echo .$this->name." is studying";
    }
}

$student2 = new Student("sara");



class Employee
{

    public $company;
    protected $name;
    private $salary;


    function __construct($company, $name, $salary)
    {
        $this->company = $company;
        $this->name = $name;
        $this->salary = $salary;

    }

    function ShowEmployee()
    {
        echo "Company is" .$this->company. <"br">;
        echo "Name " .$this->name. <"br">;
        echo "Salary " .$this-salary. <"br">; 
    }

    function GetSalary()
    {
        return $this->salary;
    }



}

class Manager extends Employee
{
    function Manageteam()
    {
        echo .$this->name. "is mangeing the team"
    }
}

$manger1 = new Manager("Ali", "Kabul tech", 30000)
$manger1->showemployee()

?>

