<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 3 - Tutorial 4 - Sending User Inputs Via GET</h3>

<?php
if ($_GET["username"]) {
    echo "Your username is: ".$_GET["username"]."<br>";
}
if ($_GET["password"]) {
    echo "Your password hash is: <br>";
    $hash = hash("whirlpool", $_GET["password"]);
    for ($i = 0; $i < 4; $i++) {
        echo substr($hash, $i*32, 32)."<br>";
    }
}
?>

<form style="margin-top:16px;" action="./tutorial4-User-Inputs-Via-GET.php" method="get">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" value=""><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" value=""><br><br>
    <input type="submit" value="Submit">
</form>

<p class="comment">// This task is literally just task 3 but with $_GET instead of $_POST</p>