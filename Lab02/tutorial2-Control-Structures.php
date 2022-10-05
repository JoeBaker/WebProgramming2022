<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 2 - Tutorial 2 - Control Structures</h3>
<?php
$a = 1;
$b = true;
if ($a == $b) {
    echo "a is equal to b<br>";
} else {
    echo "a is not equal to b<br>";
}
$or = ($a || $b) ? "true" : "false";
echo "a OR b is $or<br>";
$xor = ($a xor $b) ? "true" : "false";
echo "a XOR b is $xor<br>";
?>