<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 5 - Tutorial 3 - Creating a Class</h3>
<?php

interface iAnimal {
    public function speak();
    public function __tostring();
}

abstract class Feline implements iAnimal {
    const family = "Feline";
    public $species;

    public function speak() {
        echo "Meow";
    }

    public function __tostring() {
        return "A " . $this->species . " is a " . self::family;
    }
}

abstract class Canine implements iAnimal {
    const family = "Canine";
    public $species;

    public function speak() {
        echo "Woof";
    }

    public function __tostring() {
        return "A " . $this->species . " is a " . self::family;
    }
}

class Cat extends Feline {
    public $species = "Cat";
}

class Caracal extends Feline {
    public $species = "Caracal";
}

class Dog extends Canine {
    public $species = "Dog";
}

class Wolf extends Canine {
    public $species = "Wolf";

    public function speak() {
        echo "Awoo";
    }
}

$animals = [
    new Cat(),
    new Caracal(),
    new Dog(),
    new Wolf()
];

foreach ($animals as $animal) {
    echo $animal . " and it says ";
    $animal->speak();
    echo "<br>";
}

?>