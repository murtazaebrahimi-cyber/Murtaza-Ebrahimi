<?php

class Student
{
    public $name;
    public $studentId;
    public $department;

    public function __construct($name, $studentId, $department)
    {
        $this->name = $name;
        $this->studentId = $studentId;
        $this->department = $department;
    }

    public function showInfo()
    {
        echo "Name: " . $this->name . "<br>";
        echo "Student ID: " . $this->studentId . "<br>";
        echo "Department: " . $this->department;
    }
}

$student = new Student("Murtaza", "12345", "IT");
$student->showInfo();

$student2 = new Student("Sara", "1002", "Information Systems");
$student2->showInfo();

?>