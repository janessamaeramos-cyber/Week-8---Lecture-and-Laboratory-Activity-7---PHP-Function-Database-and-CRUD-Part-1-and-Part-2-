<?php

class Student
{
    public $name;
    public $email;
    public $course;

    public function __construct($name, $email, $course)
    {
        $this->name = $name;
        $this->email = $email;
        $this->course = $course;
    }

    public function displayInfo()
    {
        return "Name: " . $this->name .
               "<br>Email: " . $this->email .
               "<br>Course: " . $this->course;
    }

    public function getCourse()
    {
        return $this->course;
    }
}