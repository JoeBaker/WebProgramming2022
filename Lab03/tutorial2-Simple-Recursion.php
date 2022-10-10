<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 3 - Tutorial 2 - Simple Recursion Exercise</h3>
<?php
function recursiveFactorial($number) {
    if ($number <= 2) {
        return $number;
    } else {
        return recursiveFactorial($number-1) * $number;
    }
}

for ($i = 1; $i <= 16; $i++) {
    echo "Factorial of $i is " . recursiveFactorial($i) . "<br>";
}
?>