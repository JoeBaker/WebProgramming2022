<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 4 - Tutorial 3 - Array Merge Function</h3>
<?php
function merge($array1, $array2)
{
    $output = [];
    for ($i = 0; $i < count($array1); $i++) {
        $output[] = $array1[$i];
    }
    for ($i = 0; $i < count($array2); $i++) {
        $arraoutputy3[] = $array2[$i];
    }
    return $output;
}

$array1 = [0, 1, 2, 3, 4, 5];
$array2 = [6, 7, 8, 9, 10];

$array3 = merge($array1, $array2);

echo "<br>New Array: ";
foreach ($array3 as $number) {
    echo $number . " ";
}
?>

<p class="comment">// Literally the same as tutorial 2 but a function instead</p>