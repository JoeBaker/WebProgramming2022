<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 6 - Task 1 - School Classes</h3>
<?php

class School {
    private $id;
    private $name;
    private $students = [];
    private $teachers = [];

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString() {
        // name, number of students, number of teachers
        return "$this->name has ".count($this->students)." students and ".count($this->teachers)." teachers";
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function addStudent($student) {
        $this->students[] = $student;
    }

    public function addStudents($students) {
        foreach ($students as $student) {
            $this->students[] = $student;
        }
    }

    public function getStudents() {
        return $this->students;
    }

    public function addTeacher($teacher) {
        $this->teachers[] = $teacher;
    }

    public function addTeachers($teachers) {
        foreach ($teachers as $teacher) {
            $this->teachers[] = $teacher;
        }
    }

    public function getTeachers() {
        return $this->teachers;
    }
}

class Student {
    private $id;
    private $name;

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString() {
        return $this->name;
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }
}

class Teacher {
    private $id;
    private $name;
    private $subjects = [];

    public function __construct($id, $name) {
        $this->id = $id;
        $this->name = $name;
    }

    public function __toString() {
        return "$this->name has " . count($this->subjects) . " subjects";
    }

    public function getId() {
        return $this->id;
    }

    public function getName() {
        return $this->name;
    }

    public function addSubject($subject) {
        $this->subjects[] = $subject;
    }

    public function addSubjects($subjects) {
        foreach ($subjects as $subject) {
            $this->subjects[] = $subject;
        }
    }

    public function getSubjects() {
        return $this->subjects;
    }
}

class Subject {
    private $name;
    private $numberOfLectures;

    public function __construct($name, $numberOfLectures) {
        $this->name = $name;
        $this->numberOfLectures = $numberOfLectures;
    }

    public function __toString() {
        return "$this->name has $this->numberOfLectures lectures";
    }

    public function getName() {
        return $this->name;
    }

    public function getNumberOfLectures() {
        return $this->numberOfLectures;
    }

    public function setNumberOfLectures($numberOfLectures) {
        $this->numberOfLectures = $numberOfLectures;
    }
}

class SchoolTester {
    public function testSubject() {
        $subject = new Subject("Procedural Programming", 20);
        echo "Subject: $subject";
    }

    public function testTeacher() {
        $teacher = new Teacher(1, "Kev");
        $teacher->addSubject(new Subject("Procedural Programming", 20));
        $teacher->addSubject(new Subject("Object Oriented Programming", 30));
        echo "Teacher: $teacher";
        echo "<br>Subjects: ";
        foreach ($teacher->getSubjects() as $subject) {
            echo "$subject, ";
        }
    }

    public function testStudent() {
        $student = new Student(1, "Big Floppa");
        echo "Student: $student";
    }

    public function testSchool() {
        $students = [
            new Student(1, "Big Floppa"),
            new Student(2, "Big Chungus"),
            new Student(3, "Among Us Imposter")
        ];
        $teachers = [
            new Teacher(1, "Kev"),
            new Teacher(2, "Bryan")
        ];
        $class = new School(1, "Programming");
        $class->addStudents($students);
        $class->addTeachers($teachers);
        echo "Class: $class";
    }

    public function test() {
        echo "<hr />";
        self::testSubject();
        echo "<hr />";
        self::testTeacher();
        echo "<hr />";
        self::testStudent();
        echo "<hr />";
        self::testSchool();
        echo "<hr />";
    }
}

$tests = new SchoolTester();
$tests->test();

?>