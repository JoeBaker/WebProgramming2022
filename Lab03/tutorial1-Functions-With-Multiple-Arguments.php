<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 3 - Tutorial 1 - Functions With Multiple Arguments</h3>
<?php
function welcomeStudent($name, $level="Level 5") {
    echo "Welcome $name, from $level<br>";
}
welcomeStudent("Joe");
welcomeStudent("Big Chungus", "Level 100");
?>