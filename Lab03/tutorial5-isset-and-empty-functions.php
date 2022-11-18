<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 3 - Tutorial 5 - The isset() and empty() functions</h3>

<?php
function isSetAndEmpty($var) {
    echo isset($var) ? "<span class='g'>set</span>" : "<span class='r'>unset</span>";
    echo empty($var) ? " and <span class='r'>empty</span>" : " and <span class='g'>not empty</span>";
}
?>

<p>$_POST is <?php
isSetAndEmpty($_POST);
?></p>

<p>$_GET is <?php
isSetAndEmpty($_GET);
?></p>

<style>
.g {color: green;}
.r {color: red;}
</style>

<?php
$data = !empty($_POST) ? $_POST : $_GET;
echo "<p>Username is ";
isSetAndEmpty($data["username"]);
echo "</p>";
if ($data["username"]) {
    echo "Your username is: " . $data["username"] . "<br>";
}

echo "<p>Password is ";
isSetAndEmpty($data["password"]);
echo "</p>";
if ($data["password"]) {
    echo "Your password hash is: <br>";
    $hash = hash("whirlpool", $data["password"]);
    for ($i = 0; $i < 4; $i++) {
        echo substr($hash, $i * 32, 32) . "<br>";
    }
}
?>


<form style="margin-top:16px;" id="form" action="./tutorial5-isset-and-empty-functions.php">
    <label for="username">Username:</label><br>
    <input type="text" id="username" name="username" value=""><br>
    <label for="password">Password:</label><br>
    <input type="password" id="password" name="password" value=""><br><br>
    <input type="submit" value="GET">
    <button id="post">POST</button>
</form>

<script>
    document.getElementById("post").addEventListener("click", function(event) {
        event.preventDefault();
        var form = document.getElementById("form");
        form.setAttribute("method", "post");
        form.submit();
    });
</script>
