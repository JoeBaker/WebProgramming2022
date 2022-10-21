<link rel="stylesheet" href="/terminal.css" />
<h3>Lab 4 - Tutorial 1 - Arrays</h3>
<?php
$numbers = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
foreach ($numbers as $number) {
    echo $number . " ";
}
echo "<br>";

for ($i = 0; $i < count($numbers); $i++) {
    echo $numbers[$i] . " ";
}
echo "<br><br>";

$students = ["C. Hunter" => 2, "T. Hess" => 1, "J. Begay" => 2, "C. Hendricks" => 2, "L. Alvarez" => 3];
foreach ($students as $student => $year) {
    echo "$student is in $year";
    switch ($year) {
        case 1:
            echo "st";
            break;
        case 2:
            echo "nd";
            break;
        case 3:
            echo "rd";
            break;
        default:
            echo "th";
            break;
    }
    echo" year.<br>";
}

echo "<br>Only Male Students in Year 2:<br>";
$students2 = [
    "C. Hunter"    => ["Year" => 2, "Sex" => "M"],
    "T. Hess"      => ["Year" => 1, "Sex" => "M"],
    "J. Begay"     => ["Year" => 2, "Sex" => "F"],
    "C. Hendricks" => ["Year" => 2, "Sex" => "M"], 
    "L. Alvarez"   => ["Year" => 3, "Sex" => "M"]
];
foreach ($students2 as $name => $student) {
    if ($student["Year"] == 2 && $student["Sex"] == "M") {
        echo "$name is in 2nd year.<br>";
    }
}
?>