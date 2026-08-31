<?php

// Murtaza Ebrahimi

// Task 1
class Library
{
    const MaxBooks = 3;
}

echo Library::MaxBooks;


// Task 2
class StudentCounter
{
    public static $count = 0;

    public static function AddStudent()
    {
        self::$count++;
    }
}

StudentCounter::AddStudent();
StudentCounter::AddStudent();
StudentCounter::AddStudent();

echo StudentCounter::$count;


// Task 3
abstract class Vehicle
{
    abstract public function Start();
}

class Car extends Vehicle
{
    public function Start()
    {
        echo "Car engine started";
    }
}

class Bike extends Vehicle
{
    public function Start()
    {
        echo "Bike started";
    }
}

$car = new Car();
$car->Start();

$bike = new Bike();
$bike->Start();

?>