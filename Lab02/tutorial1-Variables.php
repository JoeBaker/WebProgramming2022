<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 2 - Tutorial 1 - Variables</h3>
<?php
$mi = 70;
$km = $mi * 1.6;
echo "$mi Miles is $km Kilometers<br>";
$celcius = 25;
$fahrenheit = $celcius * 9 / 5 + 32;
echo "${celcius}° Celcius is ${fahrenheit}° Fahrenheit<br>";
?>
<!-- Literally just copy pasted 1.3 from last week becaause I had already done it -->
<ul>
    <?php
    $arr = array("Paul", "Deniz", "Bob", "Nan", "Holly");
    /*
    $i = 1;
    foreach ($arr as $value) {
        echo "<li>Person $i: $value</li>";
        $i++;
    }
    */
    for ($i = 0; $i < 5; $i++) {
        ?>
        <li>Person <?php echo $i+1; ?>: <?php echo $arr[$i] ?></li>
    <?php } ?>
</ul>