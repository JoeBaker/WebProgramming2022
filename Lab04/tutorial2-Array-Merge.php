<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 4 - Tutorial 2 - Array Merge</h3>
<?php
$array1 = [0, 1, 2, 3, 4, 5];
$array2 = [6, 7, 8, 9, 10];

// $array3 = array_merge($array1, $array2);
$array3 = [];
for ($i = 0; $i < count($array1); $i++) {
    $array3[] = $array1[$i];
}
for ($i = 0; $i < count($array2); $i++) {
    $array3[] = $array2[$i];
}

echo "Array 1: ";
foreach ($array1 as $number) {
    echo $number . " ";
}
echo "<br>Array 2: ";
foreach ($array2 as $number) {
    echo $number . " ";
}
echo "<br>Array 3: ";
foreach ($array3 as $number) {
    echo $number . " ";
}
?>