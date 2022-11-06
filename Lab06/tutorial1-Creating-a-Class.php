<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 5 - Tutorial 1 - Creating a Class</h3>
<?php

class Student {
    public $name;
    public $email;
    public $course;
    public $university;

    public function __construct($name, $email, $course, $university) {
        $this->name = $name;
        $this->email = $email;
        $this->course = $course;
        $this->university = $university;
    }

    public function __toString() {
        return "Name: $this->name, Email: $this->email, Course: $this->course, University: $this->university";
    }
}

$students = [
    new Student("Chase Hunter", "ChaseHunter@example.com",  "Journalism", "University of Pueblo"),
    new Student("TJ Hess", "TobiasHess@test.com", "Athletic Training", "Colarado State University"),
    new Student("Jenna Begay", "JennaBegay@test.com", "Psychology", "University of Pueblo")
];

echo "Students:<br>";
foreach ($students as $student) {
    echo "$student<br>";
}

?>