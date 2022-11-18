<link rel="stylesheet" href="../terminal.css" />
<h3>Lab 4 - Dictionary</h3>

<?php
// If dictionary doess not exist, download one
if (!file_exists("task1.json")) {
    file_put_contents(
        "dictionary.json",
        file_get_contents("https://raw.githubusercontent.com/adambom/dictionary/master/dictionary.json")
    );
}
// Read dictionary
$file = file_get_contents('./dictionary.json', true);
$data = json_decode($file, true);
if (empty($data)) {
    echo "Error: Could not read dictionary.";
    http_response_code(500);
    exit();
}
?>

<form style="margin-top:16px;" method="post">
    <label for="word">Search for a word:</label><br>
    <input type="text" id="word" name="word" value=""><br><br>
    <input type="submit" value="Search"><br><br>
</form>

<?php
if (isset($_POST["word"])) {
    $word = $_POST["word"];
    $definition = $data[strtoupper($word)];
} else {
    exit();
}

if ($definition) {
?>
    <p>
        Word: &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $word; ?>
        <br>
        Definition: &nbsp; <?php echo $definition; ?>
    </p>
<?php } else { ?>
    <p>
        <?php echo $word; ?> was not found.
    </p>
<?php } ?>

<p class="comment"> // A basic dictionary lookup using <a href="https://github.com/adambom/dictionary">Webster</a></p>