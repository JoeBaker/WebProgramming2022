<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 3 - Tutorial 3 - Sending User Inputs Via POST</h3>

<?php
if ($_POST["username"]) {
    echo "Your username is: ".$_POST["username"]."<br>";
}
if ($_POST["password"]) {
    echo "Your password hash is: <br>";
    $hash = hash("whirlpool", $_POST["password"]);
    for ($i = 0; $i < 4; $i++) {
        echo substr($hash, $i*32, 32)."<br>";
    }
}
?>

<form style="margin-top:16px;" action="./tutorial3-User-Inputs-Via-POST.php" method="post">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" value=""><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" value=""><br><br>
    <input type="submit" value="Submit">
</form>