<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 2 - Task 1 - Arithmetic</h3>
<?php
$value = 5;
echo "Value is now $value.<br>";
echo "Multiply by 6. Value is now " . ($value *= 6) . ".<br>";
echo "Add 2. Value is now " . ($value += 2) . ".<br>";
echo "Divide by 8. Value is now " . ($value /= 8) . ".<br>";
echo "Modulo by 2. Value is now " . ($value %= 2) . ".<br>";
echo "Increment value by one. Value is now " . (++$value) . ".<br>";
?>